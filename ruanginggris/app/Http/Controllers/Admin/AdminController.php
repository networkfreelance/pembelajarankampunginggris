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
use PDF;
use Illuminate\Support\Facades\Hash;

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

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new BulkImport, $file); //IMPORT FILE
            //return redirect()->back()->with(['success' => 'Upload success']);
        }

        return back();
    }

    public function export()
    {
        return Excel::download(new BulkExport, 'bulkData.xlsx');
    }

    public function tambah()
    {
    	// memanggil view tambah
    	return view('admin.tambah_admin');
    }

    public function tambah_aksi(Request $request)
    {

      $id_user_login=Auth::user()->id;

      $tanggal=date('Y-m-d');

      $this->validate($request, [
        'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
      ]);
      // menyimpan data file yang diupload ke variabel $file
    	$file = $request->file('file');

    	$nama_file = time()."_".$file->getClientOriginalName();

          	// isi dengan nama folder tempat kemana file diupload
    	$tujuan_upload = 'foto_admin';
    	$file->move($tujuan_upload,$nama_file);
      // insert data ke table pegawai
      DB::table('users')->insert([
        'nama' => $request->nama,
        'username' => $request->username,
        'email' => $request->email,
        'email_verified_at' => $tanggal,
        'password' => Hash::make($request->password),
        'password_asli' => $request->password,
        'alamat' => $request->alamat,
        'kota' => $request->kota,
        'telp' => $request->telp,
        'foto' => $nama_file,
        'created_at' => $tanggal,
        'updated_at' => $tanggal,
        'level' => 'admin',
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect()->back();
    }
    public function hapus_aksi($id)
    {
           // menghapus data pegawai berdasarkan id yang dipilih
         	DB::table('users')->where('id',$id)->delete();
         	// alihkan halaman ke halaman pegawai
         	return redirect('/adminku');
    }

    public function edit($id)
    {
      	// mengambil data pegawai berdasarkan id yang dipilih
      	$admin = DB::table('users')->where('id',$id)->get();
      	// passing data pegawai yang didapat ke view edit.blade.php
      	return view('admin.edit_admin',['admin' => $admin]);

    }
    public function update_aksi(Request $request)
    {

        $id_user_login=Auth::user()->id;
        $tanggal=date('Y-m-d');
        if($request->file('file')!=NULL){

          // menyimpan data file yang diupload ke variabel $file
        	$file = $request->file('file');

        	$nama_file = time()."_".$file->getClientOriginalName();

              	// isi dengan nama folder tempat kemana file diupload
        	$tujuan_upload = 'foto_admin';
        	$file->move($tujuan_upload,$nama_file);
        	// update data pegawai
          DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => $tanggal,
            'password' => Hash::make($request->password),
            'password_asli' => $request->password,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'foto' => $nama_file,
            'updated_at' => $tanggal,
          ]);
        }else {
          DB::table('users')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => $tanggal,
            'password' => Hash::make($request->password),
            'password_asli' => $request->password,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'updated_at' => $tanggal,
          ]);
        }
      	// alihkan halaman ke halaman pegawai
      	return redirect('/adminku');
    }
}
