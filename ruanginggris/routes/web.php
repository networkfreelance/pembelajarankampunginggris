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

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/admindashboard','Admin\DashboardController@index')->name('admindashboard');
Route::get('/adminpeserta','Admin\PesertaController@index')->name('adminpeserta');
Route::post('/adminpeserta/import','Admin\PesertaController@import')->name('adminpesertaimport');
Route::post('/adminpeserta/hapus_aksi/{id}','Admin\PesertaController@hapus_aksi')->name('adminpesertahapus');

Route::get('/admin','Admin\AdminController@index')->name('admin');
Route::post('/admin/import','Admin\AdminController@import')->name('adminimport');
Route::post('/admin/hapus_aksi/{id}','Admin\AdminController@hapus_aksi')->name('adminhapus');



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
