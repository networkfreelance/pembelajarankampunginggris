<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/admindashboard','Admin\DashboardController@index')->name('admindashboard');
Route::get('/adminpeserta','Admin\PesertaController@index')->name('adminpeserta');
Route::post('/adminpeserta/import','Admin\PesertaController@import')->name('adminpesertaimport');
Route::get('/adminpeserta/edit/{id}','Admin\PesertaController@edit')->name('adminpesertaedit');
Route::post('/adminpeserta/update_aksi','Admin\PesertaController@update_aksi')->name('adminpesertaupdate');
Route::get('/adminpeserta/hapus_aksi/{id}','Admin\PesertaController@hapus_aksi')->name('adminpesertahapus');

Route::post('/adminpeserta/cetak_pdf','Admin\PesertaController@cetak_pdf')->name('adminpesertacetakpdf');
Route::get('/adminpeserta/cetak_pdf2/{id}','Admin\PesertaController@cetak_pdf2')->name('adminpesertacetakpdf');

Route::get('/adminpaket','Admin\PaketController@index')->name('adminpaket');
Route::get('/adminpaket/tambah','Admin\PaketController@tambah');
Route::post('/adminpaket/tambah_aksi','Admin\PaketController@tambah_aksi');
Route::get('/adminmateri','Admin\MateriController@index')->name('adminmateri');
Route::get('/adminmateri/lihat_materi/{id_paket}','Admin\MateriController@lihat_materi')->name('adminlihatmateri');

Route::get('/adminku','Admin\AdminController@index')->name('admin');
Route::get('/admin/tambah','Admin\AdminController@tambah')->name('admin');
Route::post('/admin/tambah_aksi','Admin\AdminController@tambah_aksi');
Route::get('/admin/edit/{id}','Admin\AdminController@edit');
Route::post('/admin/update_aksi','Admin\AdminController@update_aksi');
Route::post('/admin/import','Admin\AdminController@import')->name('adminimport');
Route::get('/admin/hapus_aksi/{id}','Admin\AdminController@hapus_aksi')->name('adminhapus');

// -----------------------------garap ane irhas----------------------------
Route::get('/admin_materi_tambah/{id}','Admin\MateriController@tambah_materi_view');
Route::get('/admin_materi_edit/{id}/{id_paket}','Admin\MateriController@edit_materi_view');
Route::post('/admin_materi_aksi_edit','Admin\MateriController@aksi_edit_materi');
Route::post('/admin_aksi_materi_tambah','Admin\MateriController@aksi_tambah_materi');
Route::get('/hapus_aksi/{id}/{video}','Admin\MateriController@hapus_aksi');

Route::get('/hapus_aksi/{id}','Admin\PaketController@hapus_paket_aksi');
Route::get('/edit_paket/{id}','Admin\PaketController@edit_paket');
Route::post('/adminpaket/update_aksi','Admin\PaketController@aksi_update_paket');



Route::get('/pesertadashboard','Peserta\DashboardController@index')->name('pesertadashboard');
Route::get('/pesertaprofil','Peserta\ProfilController@index');
// Route::get('/memberprofil/tambah','Member\AdminProfilController@tambah');
// Route::post('/memberprofil/tambah_aksi','Member\AdminProfilController@tambah_aksi');
// Route::get('/memberprofil/hapus_aksi/{id}','Member\AdminProfilController@hapus_aksi');
// Route::get('/memberprofil/edit/{id}','Member\AdminProfilController@edit');
Route::post('/pesertaprofil/update_aksi','Peserta\ProfilController@update_aksi');

Route::get('/pesertakelas','Peserta\KelasController@index');
Route::get('/lihat_materi/{id_paket}','Peserta\KelasController@lihat_materi');
Route::get('/preview_materi/{id_paket}','Peserta\KelasController@preview_materi');
// Route::get('/memberprofil/tambah','Member\AdminProfilController@tambah');
// Route::post('/memberprofil/tambah_aksi','Member\AdminProfilController@tambah_aksi');
// Route::get('/memberprofil/hapus_aksi/{id}','Member\AdminProfilController@hapus_aksi');
// Route::get('/memberprofil/edit/{id}','Member\AdminProfilController@edit');
// Route::post('/pesertakelas/update_aksi','Peserta\AdminKelasController@update_aksi');

Route::get('export', 'ImportExportController@export')->name('export');
Route::get('importExportView', 'ImportExportController@importExportView');
Route::post('import', 'ImportExportController@import')->name('import');


// Route::get('/home_user', 'Userku@index');
// Route::get('/loginku', 'Userku@login');
// Route::post('/loginPost', 'Userku@loginPost');
// Route::get('/registerku', 'Userku@register');
// Route::post('/registerPost', 'Userku@registerPost');
// Route::get('/logoutku', 'Userku@logout');
