<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminKelasController extends Controller
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
       ->where('id_user',$id_user_login)
       ->get();

       $materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       ->join('users', 'paket.id_user', '=', 'users.id')
       ->where('users.id',$id_user_login)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.kelas',['paket' => $paket, 'materi' => $materi]);
    }

    public function lihat_materi($id_paket)
    {
       // mengambil data dari table pegawai
       $id_user_login=Auth::user()->id;
       $paket = DB::table('paket')
       ->where('id_user',$id_user_login)
       ->get();

       $materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       ->join('users', 'paket.id_user', '=', 'users.id')
       ->where('users.id', $id_user_login)
       ->where('materi.id_paket', '=', $id_paket)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.kelas',['paket' => $paket, 'materi' => $materi]);
    }

    public function preview_materi($id_materi)
    {
       // mengambil data dari table pegawai
       $id_user_login=Auth::user()->id;
       $paket = DB::table('paket')
       ->where('id_user',$id_user_login)
       ->get();

       $materi = DB::table('materi')
       ->join('paket', 'paket.id_paket', '=', 'materi.id_paket')
       ->join('users', 'paket.id_user', '=', 'users.id')
       ->where('users.id', $id_user_login)
       ->where('materi.id_materi', '=', $id_materi)
       ->get();


       // mengirim data pegawai ke view index
       return view('peserta.preview_materi',['paket' => $paket, 'materi' => $materi]);
    }

   // public function tambah()
   //  {
   //  	// memanggil view tambah
   //    $id_user_login=Auth::user()->id;
   //    $daftar_toko = DB::table('daftar_toko')
   //    ->where('id_user',$id_user_login)
   //    ->get();
   //
   //    $kategori = DB::table('kategori_produk')
   //    // ->where('id_user',$id_user_login)
   //    ->get();
   //
   //  	return view('member.tambah_produk',['daftar_toko' => $daftar_toko, 'kategori' => $kategori]);
   //  }
   // public function tambah_aksi(Request $request)
   //  {
   //    $id_user_login=Auth::user()->id;
   //    // $this->validate($request, [
   //    //   'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
   //    // ]);
   //    // menyimpan data file yang diupload ke variabel $file
   //
   //    // insert data ke table pegawai
   //    $tanggal_pembuatan=date("Y-m-d");
   //    DB::table('produk')->insert([
   //      'id_user' => $id_user_login,
   //      'id_toko' => $request->id_toko,
   //      'id_kategori' => $request->id_kategori,
   //      'barcode' => $request->barcode,
   //      'nama_produk' => $request->nama_produk,
   //      'deskripsi' => $request->deskripsi,
   //      'merk' => $request->merk,
   //      'satuan' => $request->satuan,
   //      // 'foto' => $nama_file,
   //      'stok' => $request->stok,
   //      'harga' => $request->harga,
   //      'diskon' => $request->diskon,
   //      'tanggal_pembuatan' => $tanggal_pembuatan,
   //      'eksternal_link' => $request->eksternal_link,
   //    ]);
   //
   //    $id_produk=DB::getPdo()->lastInsertId();
   //
   //    foreach($request->file('file') as $file)
   //    {
   //            	$nama_file = time()."_".$file->getClientOriginalName();
   //                  	// isi dengan nama folder tempat kemana file diupload
   //            	$tujuan_upload = 'produk';
   //            	$file->move($tujuan_upload,$nama_file);
   //
   //              DB::table('foto_produk')->insert([
   //                'id_produk' => $id_produk,
   //                'multi_foto' => $nama_file,
   //              ]);
   //    }
   //    // alihkan halaman ke halaman pegawai
   //    return redirect()->back();
   //  }
   //  public function hapus_aksi($id)
   //   {
   //     // menghapus data pegawai berdasarkan id yang dipilih
   //   	DB::table('produk')->where('id_produk',$id)->delete();
   //   	// alihkan halaman ke halaman pegawai
   //   	return redirect('/memberproduk');
   //   }
   //
   //   public function edit($id)
   //    {
   //    	// mengambil data pegawai berdasarkan id yang dipilih
   //    	$produk = DB::table('produk')->where('id_produk',$id)->get();
   //      $foto_produk = DB::table('foto_produk')->where('id_produk',$id)->get();
   //    	// passing data pegawai yang didapat ke view edit.blade.php
   //      $id_user_login=Auth::user()->id;
   //      $daftar_toko = DB::table('daftar_toko')
   //      ->where('id_user',$id_user_login)
   //      ->get();
   //
   //      $kategori = DB::table('kategori_produk')
   //      //->where('id_user',$id_user_login)
   //      ->get();
   //
   //    	return view('member.edit_produk',['produk' => $produk, 'foto_produk' => $foto_produk, 'daftar_toko' => $daftar_toko, 'kategori' => $kategori]);
   //
   //    }
   //    public function update_aksi(Request $request)
   //    {
   //      $id_user_login=Auth::user()->id;
   //      // if($request->file('file')!=NULL){
   //      //     // menyimpan data file yang diupload ke variabel $file
   //      //     $file = $request->file('file');
   //      //     $nama_file = time()."_".$file->getClientOriginalName();
   //      //         	// isi dengan nama folder tempat kemana file diupload
   //      //   	$tujuan_upload = 'produk';
   //      //   	$file->move($tujuan_upload,$nama_file);
   //      //   	// update data pegawai
   //      //   	DB::table('produk')->where('id_produk',$request->id)->update([
   //      //       'id_user' => $id_user_login,
   //      //       'id_toko' => $request->id_toko,
   //      //       'id_kategori' => $request->id_kategori,
   //      //       'barcode' => $request->barcode,
   //      //       'nama_produk' => $request->nama_produk,
   //      //       'deskripsi' => $request->deskripsi,
   //      //       'merk' => $request->merk,
   //      //       'satuan' => $request->satuan,
   //      //       'foto' => $nama_file,
   //      //       'stok' => $request->stok,
   //      //       'harga' => $request->harga,
   //      //       'diskon' => $request->diskon,
   //      //       'eksternal_link' => $request->eksternal_link,
   //      //   	]);
   //      // }else {
   //        $tanggal_update=date("Y-m-d");
   //        DB::table('produk')->where('id_produk',$request->id)->update([
   //          'id_user' => $id_user_login,
   //          'id_toko' => $request->id_toko,
   //          'id_kategori' => $request->id_kategori,
   //          'barcode' => $request->barcode,
   //          'nama_produk' => $request->nama_produk,
   //          'deskripsi' => $request->deskripsi,
   //          'merk' => $request->merk,
   //          'satuan' => $request->satuan,
   //          'stok' => $request->stok,
   //          'harga' => $request->harga,
   //          'diskon' => $request->diskon,
   //          'tanggal_update' => $tanggal_update,
   //          'eksternal_link' => $request->eksternal_link,
   //        ]);
   //
   //        // $id_produk=DB::getPdo()->lastInsertId();
   //        //DB::table('foto_produk')->where('id_produk',$request->id)->delete();
   //
   //        foreach($request->file('file') as $file)
   //        {
   //
   //                	$nama_file = time()."_".$file->getClientOriginalName();
   //                      	// isi dengan nama folder tempat kemana file diupload
   //                	$tujuan_upload = 'produk';
   //                	$file->move($tujuan_upload,$nama_file);
   //
   //                  DB::table('foto_produk')->insert([
   //                    'id_produk' => $request->id,
   //                    'multi_foto' => $nama_file,
   //                  ]);
   //        }
   //
   //      // }
   //    	// alihkan halaman ke halaman pegawai
   //    	return redirect('/memberproduk');
   //    }
   //
   //    public function delete_foto_produk($id){
   //      DB::table('foto_produk')
   //      ->where('id',$id)->delete();
   //      return redirect()->back();
   //    }
}
