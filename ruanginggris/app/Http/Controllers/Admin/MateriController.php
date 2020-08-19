<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Exports\BulkExport;
use App\Imports\BulkImport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // mengambil data dari table pegawai
       $paket = DB::table('paket')
       ->get();

       $materi = DB::table('materi')
       ->get();

       // mengirim data pegawai ke view index
       return view('admin.materi',['materi' => $materi, 'paket' => $paket]);
    }

    public function lihat_materi($id_paket)
    {
       // mengambil data dari table pegawai
       $paket = DB::table('paket')
       ->get();

       $materi = DB::table('materi')
       ->where('id_paket',$id_paket)
       ->get();

       // mengirim data pegawai ke view index
       return view('admin.lihat_materi',['materi' => $materi, 'paket' => $paket]);
    }

    public function import()
    {
        Excel::import(new BulkImport,request()->file('file'));

        return back();
    }

    public function export()
    {
        return Excel::download(new BulkExport, 'bulkData.xlsx');
    }

   // public function tambah()
   //  {
   //  	// memanggil view tambah
   //  	return view('admin.tambah_materi');
   //  }
   // public function tambah_aksi(Request $request)
   //  {
   //
   //    $id_user_login=Auth::user()->id;
   //    $tanggal=date('Y-m-d');
   //    $this->validate($request, [
   //      'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
   //    ]);
   //    // menyimpan data file yang diupload ke variabel $file
   //  	$file = $request->file('file');
   //
   //  	$nama_file = time()."_".$file->getClientOriginalName();
   //
   //        	// isi dengan nama folder tempat kemana file diupload
   //  	$tujuan_upload = 'materi';
   //  	$file->move($tujuan_upload,$nama_file);
   //    // insert data ke table pegawai
   //    DB::table('materi')->insert([
   //      'id_user' => $id_user_login,
   //      'judul' => $request->judul,
   //      'tanggal_publikasi' => $tanggal,
   //      'konten' => $request->konten,
   //      'foto' => $nama_file,
   //    ]);
   //    // alihkan halaman ke halaman pegawai
   //    return redirect()->back();
   //  }
        public function hapus_aksi($id)
         {
           // menghapus data pegawai berdasarkan id yang dipilih
         	DB::table('users')->where('id',$id)->delete();
         	// alihkan halaman ke halaman pegawai
         	return redirect('/adminmateri');
         }
   //
   //   public function edit($id)
   //    {
   //    	// mengambil data pegawai berdasarkan id yang dipilih
   //    	$materi = DB::table('materi')->where('id_materi',$id)->get();
   //    	// passing data pegawai yang didapat ke view edit.blade.php
   //    	return view('admin.edit_materi',['materi' => $materi]);
   //
   //    }
   //    public function update_aksi(Request $request)
   //    {
   //
   //      $id_user_login=Auth::user()->id;
   //      if($request->file('file')!=NULL){
   //
   //        // menyimpan data file yang diupload ke variabel $file
   //      	$file = $request->file('file');
   //
   //      	$nama_file = time()."_".$file->getClientOriginalName();
   //
   //            	// isi dengan nama folder tempat kemana file diupload
   //      	$tujuan_upload = 'materi';
   //      	$file->move($tujuan_upload,$nama_file);
   //      	// update data pegawai
   //      	DB::table('materi')->where('id_materi',$request->id)->update([
   //          'id_user' => $id_user_login,
   //          'judul' => $request->judul,
   //          // 'tanggal_publikasi' => $tanggal,
   //          'konten' => $request->konten,
   //          'foto' => $nama_file,
   //      	]);
   //      }else {
   //        DB::table('materi')->where('id_materi',$request->id)->update([
   //          'id_user' => $id_user_login,
   //          'judul' => $request->judul,
   //          // 'tanggal_publikasi' => $tanggal,
   //          'konten' => $request->konten,
   //        ]);
   //      }
   //    	// alihkan halaman ke halaman pegawai
   //    	return redirect('/adminmateri');
   //    }
}
