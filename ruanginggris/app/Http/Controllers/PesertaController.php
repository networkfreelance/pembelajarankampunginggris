<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;

use App\Exports\PesertaExport;
use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
	public function index()
	{
		$peserta = User::all();
		return view('peserta',['peserta'=>$peserta]);
	}

	public function export_excel()
	{
		return Excel::download(new pesertaExport, 'peserta.xlsx');
	}

	public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_peserta di dalam folder public
		$file->move('file_peserta',$nama_file);

		// import data
		Excel::import(new pesertaImport, public_path('/file_peserta/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data peserta Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/peserta');
	}
}
