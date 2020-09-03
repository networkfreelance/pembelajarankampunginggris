<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
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
       $users = DB::table('users')
       ->where('id',$id_user_login)
       ->get();
       // mengirim data pegawai ke view index

       $paket_materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       ->get();

       $paket_user = DB::table("users")
         // ->join('paket', 'paket.id_user', '=', 'users.id')
         ->where('users.id',$id_user_login)
         ->get();

         $total_paket = DB::table("users")
           // ->join('paket', 'paket.id_user', '=', 'users.id')

           ->where('users.id',$id_user_login)

           ->get();

       // $total_order = DB::table('produk')
       // ->join('keranjang', 'keranjang.id_produk', '=', 'produk.id_produk')
       // ->join('pembelian', 'pembelian.no_transaksi', '=', 'keranjang.no_transaksi')
       // ->get()
       // ->sum("produk.harga * keranjang.jumlah");

       return view('peserta.profil',['users' => $users, 'paket_materi' =>$paket_materi, 'paket_user' =>$paket_user, 'total_paket' =>$total_paket]);
    }

      public function update_aksi(Request $request)
      {


          DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password_asli),
            'password_asli' => $request->password_asli,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
          ]);

      	// alihkan halaman ke halaman pegawai
      	return redirect('/pesertaprofil');
      }
}
