<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Userku extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('loginku')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('user');
        }
    }

    public function login(){
        return view('loginku');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;
        $tanggal=date('Y-m-d');

        $data = DB::table('users')
        ->where('email', $email)
        ->where('start_login','<', $tanggal)
        ->where('expired_login','>', $tanggal)
        ->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id',$data->id);
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('level',$data->level);
                Session::put('login',TRUE);
                return redirect('home_user');
            }
            else{
                return redirect('loginku')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('loginku')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('loginku')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('registerku');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new ModelUser();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('loginku')->with('alert-success','Kamu berhasil Register');
    }
}
