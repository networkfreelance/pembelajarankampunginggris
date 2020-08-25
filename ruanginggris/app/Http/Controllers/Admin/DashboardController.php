<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
      if(!Session::get('login')){
          return redirect('loginku')->with('alert','Kamu harus login dulu');
      }
      else{
          return view('user');
      }
    }

    public function index()
    {
          $id_user_login=Session::get('id');


          $jumlah_materi = DB::table('materi')
          // ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
          // ->join('users', 'paket.id_user', '=', 'users.id')
          // ->where('users.id',$id_user_login)
          ->get();

          $jumlah_paket = DB::table("paket")
            // ->join('paket', 'paket.id_user', '=', 'users.id')
            // ->where('users.id',$id_user_login)
          ->get();



          return view('admin.dashboard',['jumlah_materi' => $jumlah_materi,'jumlah_paket' =>$jumlah_paket]);


    }
}
