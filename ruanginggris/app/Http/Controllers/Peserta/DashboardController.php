<?php

namespace App\Http\Controllers\Peserta;

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
      $this->middleware('auth');
    }

    public function index()
    {

      $id_user_login=Auth::user()->id;


        $jumlah_materi = DB::table('materi')
        ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
        // ->join('users', 'paket.id_user', '=', 'users.id')
        // ->where('users.id',$id_user_login)
        ->get();

        $jumlah_paket = DB::table("users")
        // ->join('paket', 'paket.id_user', '=', 'users.id')
        // ->where('users.id',$id_user_login)
        ->get();

          // echo  $id_user_login=Session::get('id');
          // $status_login = DB::table("users")
          // ->where('id',$id_user_login)
          // // ->where('status_login','login')
          // ->first();
          //
          // echo $status_login->status_login;
          //   if($status_login->status_login==""){
          //       $tanggal=date('Y-m-d');
          //       $pinjam            = date("Y-m-d");
          //       $tujuh_hari        = mktime(0,0,0,date("n"),date("j")+90,date("Y"));
          //       $kembali      = date("Y-m-d", $tujuh_hari);
          //
          //       DB::table('users')->where('id',$id_user_login)->update([
          //         'start_login' => $tanggal,
          //         'expired_login' => $kembali,
          //         'status_login' => 'login',
          //       ]);
          //   }

      return view('peserta.dashboard',['jumlah_materi' => $jumlah_materi,'jumlah_paket' =>$jumlah_paket]);


    }
}
