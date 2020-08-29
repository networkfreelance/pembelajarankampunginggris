<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
       // mengambil data dari table pegawai
       $id_user_login=Auth::user()->id;
       $paket = DB::table('paket')
       // ->where('id_user',$id_user_login)
       ->get();

       // $materi = DB::table('materi')
       // ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       // // ->join('users', 'paket.id_user', '=', 'users.id')
       // // ->where('users.id',$id_user_login)
       // ->get();

       $user = DB::table('users')
       ->where('id',$id_user_login)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.kelas',['paket' => $paket, 'user' => $user]);
    }

    public function lihat_materi($id_paket)
    {
       // mengambil data dari table pegawai
       $id_user_login=Auth::user()->id;

       $user = DB::table('users')
       ->where('id',$id_user_login)
       ->get();

       $paket = DB::table('paket')
       // ->where('id_user',$id_user_login)
       ->get();

       $materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       // ->join('users', 'paket.id_user', '=', 'users.id')
       // ->where('users.id', $id_user_login)
       ->where('materi.id_paket', '=', $id_paket)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.kelas',['paket' => $paket, 'materi' => $materi, 'user' => $user]);
    }

    public function preview_materi($id_materi)
    {
       // mengambil data dari table pegawai
       $id_user_login=Auth::user()->id;
       $paket = DB::table('paket')
       // ->where('id_user',$id_user_login)
       ->get();

       $materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       // ->join('users', 'paket.id_user', '=', 'users.id')
       // ->where('users.id', $id_user_login)
       ->where('materi.id_materi', '=', $id_materi)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.preview_materi',['paket' => $paket, 'materi' => $materi]);
    }
}
