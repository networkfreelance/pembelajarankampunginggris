<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
     protected function redirectTo(){
       $level=Auth::user()->level;
       if($level=="admin"){
         //return redirect('/admindashboard');
         return $this->redirectTo = '/admindashboard';
       }else if($level=="peserta"){
         //return redirect('/admindashboard');
          return $this->redirectTo = '/pesertakelas';
       }

     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

      $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']]))
        {
            $singleUserToken = Str::random(16);
            session(['singleUserToken' => $singleUserToken]);

            $user = Auth::user();
            $user->singleUserToken = $singleUserToken;
            $user->update();

            $level=Auth::user()->level;
            if($level=="admin"){
              return redirect('/admindashboard');
              // return redirect()->route('/admindashboard');
            }else if($level=="peserta"){
              return redirect('pesertakelas');
               // return redirect()->route('/pesertadashboard');
            }

        }

        $error = 'Benutzername oder Passwort unbekannt!';
        return redirect()->back()->withErrors($error);

    }

    public function logout(Request $request)
    {
        $id_login=Auth::user()->id;
        DB::table('users')->where('id',$id_login)->update([
          'status_login' => 'nologin',
        ]);

        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }

}
