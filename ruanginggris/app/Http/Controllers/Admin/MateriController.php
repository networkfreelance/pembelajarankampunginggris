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

use Validator;

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

  public function hapus_aksi($id)
  {
    DB::table('materi')->where('id_materi',$id)->delete();
    return redirect()->back();
  }

  public function tambah_materi_view($id){
     $materi = DB::table('materi')
    ->where('id_paket',$id)
    ->limit(1)
    ->get();
    return view('admin.tambah_materi',compact('materi'));
  }

  public function aksi_tambah_materi(Request $request){
    $todayDate = date("Y-m-d H:i:s");
    $materi = $request->input('materi');
    $konten = $request->input('konten');

    $rules = array(
      'file'  => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:2000000|required'
    );

    $error = Validator::make($request->all(), $rules);

    if($error->fails())
    {
      return response()->json(['errors' => $error->errors()->all()]);
    }

    $image = $request->file('file');

    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('video'), $new_name);

    $output = array(
      'success' => 'Image uploaded successfully',
      // 'image'  => '<img src="/pembelajarankampunginggris/ruanginggris/public/images/'.$new_name.'" class="img-thumbnail" />'
    );

     DB::table('materi')->insert([
        'id_paket' => $request->id,
        'nama_materi' => $request->materi,
        'konten' => $request->konten,
        'video' => $new_name,
        'tanggal_publikasi' => $todayDate,
      ]);

     return response()->json($output);
  }
}
