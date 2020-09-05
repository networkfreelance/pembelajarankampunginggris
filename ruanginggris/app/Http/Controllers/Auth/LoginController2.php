<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use DB;
use App\LastSession;
use App\Models\Menu_roles;
use App\Models\Roles;
use Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $timeout    = 120;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
    }
    public function username()
	{
		return 'username';
	}
    protected function credentials(Request $request)
	{
		return $request->only($this->username(), 'password');
    }
    public function showLoginForm()
	{
		$data['page'] = array('title' => "Login");

		return view('auth.login', $data);
	}
    protected function attemptLogin(Request $request)
    {
        // dd($request);
        if ($request->isMethod('get')) {
			return redirect('login');
		}

		$validation = $this->validate_input($request);

		if ($validation->fails()) {
			return redirect('login')->withErrors($validation)->withInput();
		}
		
		$username = trim($request->username);
		$password = trim($request->password);
		$auth_guard =  Auth::guard('vp');
		
		$auth_attempt = $auth_guard->attempt(['username' => $username, 'password' => $password]);
        // dd($auth_guard->user());
        if ($auth_attempt) {
			$auth_user = $auth_guard->user();
            $user = DB::table("v_login as login")
            ->where("login.id", "=", $auth_user->id)
			->first();
			// dd($user);
			
			if ($user!= null) {
				$data_user = [];
				$data_user['userid']      = $user->id;
				$data_user['name']        = $user->name;
				$data_user['username']        = $user->username;
				$data_user['email']             = $user->email;
				$data_user['remember_token']            = $user->remember_token;

				$user_roles = array(
					"id_role" => $user->role_id,
					"nama_role" => $user->role_name
				);

				$data_user_role["role_pengguna"][] = $user_roles;

				$menu_roles = new Menu_roles();
				$menu_roles = $menu_roles->getListUserMenuRoles($user->role_id);
				
				$data_menus = array();
				$data_sub_menu = array();
				foreach ($menu_roles as $menu_role) {
					$data_menus['menu'][$menu_role->id]['menu'][] = $menu_role;

					unset($data_menus['children']);

					$sub_menu_roles = new Menu_roles();
					$sub_menu_roles = $sub_menu_roles->getListUserSubMenuRoles($user->role_id, $menu_role->id);

					foreach ($sub_menu_roles as $children) {
						$data_menus['menu'][$menu_role->id]['submenu'][] = $children;
					}
				}

				$priviliges = new Menu_roles();
				$priviliges = $priviliges->getListUserPriviliges($user->role_id);
				
				$data_privilige = array();
				foreach ($priviliges as $privilige) {
					$data_privilige['access'][] = $privilige;
				}
                $last_session = DB::table("last_session")->where("user_id",$user->id)->latest()->first();
                // dd($last_session);
                
                if (!isset($last_session)) {
                    DB::table('last_session')->insert(
                        ['user_id' => $user->id, 'session' => session::getId()]	
                    );
                } else {
                    LastSession::where('user_id', $user->id)->update(['session' => session::getId()]);
                }
                $lasession = DB::table("last_session")->where("user_id",$user->id)->latest()->first();

                $data_user = array_merge($data_user, $data_menus, $data_sub_menu, $data_privilige, $data_user_role,array('session'=>$lasession->session));
				if ($data_user) {
                   

                    // dd($data_user);

                    session::put('user_app', $data_user);
                    
					// $last_session = LastSession::find($user->id);
					

					return redirect('home');
				}
			} else {
                // dd('eror');
				return redirect('login')->withErrors('Username Belum Diatur')->withInput();
			}
		} else {
            // dd('eror');
			return redirect('login')->withErrors('Username atau Password Salah')->withInput();
		}
    }
    private function validate_input($request, $id = null)
	{

		return Validator::make(
			$request->all(),
			[
				'username' => 'required',
				'password' => 'required',
			]
		);
    }
    protected function authenticated(Request $request, $user)
	{
		$data= session::get('user_app');
        // dd($user);
		Session::put([
			'userData' => [
				'name'     => $data['name'],
				'username' => $data['username'],
			],
		]);
	}

	protected function sendFailedLoginResponse(Request $request)
	{
		throw ValidationException::withMessages([
			$this->username() => ['Username/Password anda salah!'],
		]);
	}
    public function logout()
	{
		session_start();

		$user = session::get('user_app');

		// if (!is_null($user)) {
		// 	$last_session = LastSession::where('user_id', $user['penggunaid'])->update(['session' => '']);
		// }

		Session::flush();

		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach ($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name  = trim($parts[0]);
				setcookie($name, '', time() - 1000);
				setcookie($name, '', time() - 1000, '/');
			}
		}

		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(
				session_name(),
				'',
				time() - 42000,
				$params["path"],
				$params["domain"],
				$params["secure"],
				$params["httponly"]
			);
		}

		session_destroy();

		return redirect('/login');
	}
}
