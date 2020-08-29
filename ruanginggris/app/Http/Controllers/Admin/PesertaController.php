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

class PesertaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // mengambil data dari table pegawai
       $peserta = DB::table('users')
       ->where('level','peserta')
       ->get();
       // mengirim data pegawai ke view index
       return view('admin.peserta',['peserta' => $peserta]);
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

    public function cetak_pdf(Request $request)
    {
      $tanggal_mulai=$request->tanggal_mulai;
      $tanggal_akhir=$request->tanggal_akhir;

      $peserta = DB::table('users')
      ->where('created_at','>',$tanggal_mulai)
      ->where('created_at','<',$tanggal_akhir)
      ->get();

    	$pdf = PDF::loadview('admin.cetak_peserta_pdf',['peserta'=>$peserta]);
    	return $pdf->download('cetak_peserta_pdf');
    }

    public function cetak_pdf2($id)
    {

      $peserta = DB::table('users')
      ->where('id',$id)
      ->get();

      $pdf = PDF::loadview('admin.cetak_peserta_pdf',['peserta'=>$peserta]);
      return $pdf->download('cetak_peserta_pdf');
    }

    public function hapus_aksi($id)
    {
           // menghapus data pegawai berdasarkan id yang dipilih
          DB::table('users')->where('id',$id)->delete();
          // alihkan halaman ke halaman pegawai
          return redirect('/adminpeserta');
    }

    public function edit($id)
    {
      	// mengambil data pegawai berdasarkan id yang dipilih
      	$admin = DB::table('users')->where('id',$id)->get();
      	// passing data pegawai yang didapat ke view edit.blade.php
      	return view('admin.edit_peserta',['admin' => $admin]);

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
        	$tujuan_upload = 'foto_peserta';
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
      	return redirect('/adminpeserta');
    }

}
