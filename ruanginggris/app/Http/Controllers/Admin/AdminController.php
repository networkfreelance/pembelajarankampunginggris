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

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // mengambil data dari table pegawai
       $admin = DB::table('users')
       ->where('level','admin')
       ->get();
       // mengirim data pegawai ke view index
       return view('admin.admin',['admin' => $admin]);
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
   //  	return view('admin.tambah_admin');
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
   //  	$tujuan_upload = 'admin';
   //  	$file->move($tujuan_upload,$nama_file);
   //    // insert data ke table pegawai
   //    DB::table('admin')->insert([
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
         	return redirect('/adminadmin');
         }
   //
   //   public function edit($id)
   //    {
   //    	// mengambil data pegawai berdasarkan id yang dipilih
   //    	$admin = DB::table('admin')->where('id_admin',$id)->get();
   //    	// passing data pegawai yang didapat ke view edit.blade.php
   //    	return view('admin.edit_admin',['admin' => $admin]);
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
   //      	$tujuan_upload = 'admin';
   //      	$file->move($tujuan_upload,$nama_file);
   //      	// update data pegawai
   //      	DB::table('admin')->where('id_admin',$request->id)->update([
   //          'id_user' => $id_user_login,
   //          'judul' => $request->judul,
   //          // 'tanggal_publikasi' => $tanggal,
   //          'konten' => $request->konten,
   //          'foto' => $nama_file,
   //      	]);
   //      }else {
   //        DB::table('admin')->where('id_admin',$request->id)->update([
   //          'id_user' => $id_user_login,
   //          'judul' => $request->judul,
   //          // 'tanggal_publikasi' => $tanggal,
   //          'konten' => $request->konten,
   //        ]);
   //      }
   //    	// alihkan halaman ke halaman pegawai
   //    	return redirect('/adminadmin');
   //    }
}
