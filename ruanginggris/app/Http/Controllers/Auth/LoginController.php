<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
          return $this->redirectTo = '/pesertadashboard';
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
      $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

      //echo 1;
      $count = DB::table('users')->where('username', $request->username)->orWhere('email', $request->username) ->count();

      if($count>0){
      $data = DB::table('users')->where('username', $request->username)->orWhere('email', $request->username)->first();
      $status_login=$data->status_login;
      $start_login=$data->start_login;
      $expired_login=$data->expired_login;

            // if($status_login=="nologin"){
              $pinjam            = date("Y-m-d");
              $tujuh_hari        = mktime(0,0,0,date("n"),date("j")+90,date("Y"));
              $kembali           = date("Y-m-d", $tujuh_hari);

                if($start_login<$kembali){

                    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
                    if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
                    {
                        $id_login=Auth::user()->id;
                        $tanggal=date("Y-m-d");
                        DB::table('users')->where('id',$id_login)->update([
                          'status_login' => 'login',
                          'expired_login' => $tanggal,
                        ]);

                        $level=Auth::user()->level;
                        if($level=="admin"){
                          return redirect('/admindashboard');
                          // return redirect()->route('/admindashboard');

                        }else if($level=="peserta"){
                          return redirect('pesertadashboard');
                           // return redirect()->route('/pesertadashboard');
                        }
                    }else{
                        return redirect()->route('login')->with('error','username Email-Address dan Password tidak cocok.');
                    }
              }else{
                return redirect()->route('login')->with('error','Login sudah expired.');
              }

          // }else{
          //         $tanggal= date("Y-m-d");
          //         if($expired_login<$tanggal){
          //           $data = DB::table('users')->where('username', $request->username)->orWhere('email', $request->username)->first();
          //           $status_login=$data->status_login;
          //           $id_login=$data->id;
          //           DB::table('users')->where('id',$id_login)->update([
          //             'status_login' => 'nologin',
          //             'expired_login' => $tanggal,
          //           ]);
          //
          //         }
          //     return redirect()->route('login')->with('error','Maff login sudah digunakan di device lain.');
          // }
    }else{
      return redirect()->route('login')->with('error','username Email-Address dan Password tidak cocok.');
    }

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
