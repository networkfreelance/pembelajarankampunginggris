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

      //$id_user_login=Auth::user()->id;
      DB::table('paket')->insert([
        'nama_paket' => $request->nama_paket,
        'buku' => $request->buku,
      ]);
      // alihkan halaman ke halaman pegawai
      return redirect('/adminmateri');
    }
        public function hapus_aksi($id)
         {
           // menghapus data pegawai berdasarkan id yang dipilih
         	DB::table('users')->where('id',$id)->delete();
         	// alihkan halaman ke halaman pegawai
         	return redirect('/adminpaket');
         }

  public function edit_paket($id){
    $paket = DB::table('paket')
    ->where('id_paket',$id)
    ->limit(1)
    ->get();

     $grubpaket = DB::table('users')
    ->groupBy('nama_paket')
    ->get();

    return view('admin.edit_paket',compact('paket','grubpaket'));
  }

  public function aksi_update_paket(Request $request){

    $id_paket = $request->input('id_paket');
    $nama_paket = $request->input('nama_paket');
    $buku = $request->input('buku');

  DB::table('paket')
      ->where('id_paket',$id_paket)
      ->update([
         'nama_paket' => $nama_paket,
         'buku' => $buku,
       ]);

      return redirect('/adminmateri');
  }

   public function hapus_paket_aksi($id_paket)
  {
    DB::table('paket')->where('id_paket',$id_paket)->delete();
    return redirect()->back();
  }

}
