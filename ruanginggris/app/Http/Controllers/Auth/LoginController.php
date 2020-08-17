<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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
      $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
      if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
      {

          $level=Auth::user()->level;
          if($level=="admin"){
            return redirect('/admindashboard');
            // return redirect()->route('/admindashboard');

          }else if($level=="peserta"){
            return redirect('pesertadashboard');
             // return redirect()->route('/pesertadashboard');
          }
      }else{
          return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
      }
    }


}
