<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

   // public function tambah()
   //  {
   //  	// memanggil view tambah
   //  	return view('member.tambah_profil');
   //  }

   // public function tambah_aksi(Request $request)
   //  {
   //    $this->validate($request, [
   //      'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
   //    ]);
   //    // menyimpan data file yang diupload ke variabel $file
   //  	$file = $request->file('file');
   //
   //  	$nama_file = time()."_".$file->getClientOriginalName();
   //
   //        	// isi dengan nama folder tempat kemana file diupload
   //  	$tujuan_upload = 'users';
   //  	$file->move($tujuan_upload,$nama_file);
   //    // insert data ke table pegawai
   //    DB::table('users')->insert([
   //      'id_toko' => "1",
   //      'barcode' => $request->barcode,
   //      'nama_users' => $request->nama_users,
   //      'deskripsi' => $request->deskripsi,
   //      'merk' => $request->merk,
   //      'satuan' => $request->satuan,
   //      'foto' => $nama_file,
   //      'stok' => $request->stok,
   //      'harga' => $request->harga,
   //      'diskon' => $request->diskon,
   //      'eksternal_link' => $request->eksternal_link,
   //    ]);
   //    // alihkan halaman ke halaman pegawai
   //    return redirect()->back();
   //  }

    // public function hapus_aksi($id)
    //  {
    //    // menghapus data pegawai berdasarkan id yang dipilih
    //  	DB::table('users')->where('id_users',$id)->delete();
    //  	// alihkan halaman ke halaman pegawai
    //  	return redirect('/memberprofil');
    //  }

     // public function edit($id)
     //  {
     //  	// mengambil data pegawai berdasarkan id yang dipilih
     //  	$users = DB::table('users')->where('id_users',$id)->get();
     //  	// passing data pegawai yang didapat ke view edit.blade.php
     //  	return view('member.edit_profil',['users' => $users]);
     //
     //  }
      public function update_aksi(Request $request)
      {


          DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
          ]);

      	// alihkan halaman ke halaman pegawai
      	return redirect('/pesertaprofil');
      }
}
