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

class PaketController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // mengambil data dari table pegawai
       $paket = DB::table('users')
       ->groupBy('nama_paket')
       ->get();

       // mengirim data pegawai ke view index
       return view('admin.paket',['paket' => $paket]);
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

   public function tambah()
    {
    	// memanggil view tambah
      $paket = DB::table('users')
      ->groupBy('nama_paket')
      ->get();

    	return view('admin.tambah_paket',['paket' => $paket]);
    }
   public function tambah_aksi(Request $request)
    {

      $id_user_login=Auth::user()->id;
      DB::table('paket')->insert([
        'nama_paket' => $request->nama_paket,
        'buku' => $request->buku,
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect()->back();
    }
        public function hapus_aksi($id)
         {
           // menghapus data pegawai berdasarkan id yang dipilih
         	DB::table('users')->where('id',$id)->delete();
         	// alihkan halaman ke halaman pegawai
         	return redirect('/adminpaket');
         }

  public function edit_paket($id){
    $materi = DB::table('paket')
    ->where('id_paket',$id)
    ->limit(1)
    ->get();

    return view('admin.edit_paket',compact('materi'));
  }

  public function aksi_update_paket(){

  }

}
