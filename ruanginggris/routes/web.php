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

Route::get('/admindashboard','Admin\AdminDashboardController@index')->name('admindashboard');
Route::get('/pesertadashboard','Peserta\AdminDashboardController@index')->name('pesertadashboard');


Route::get('/pesertaprofil','Peserta\AdminProfilController@index');
// Route::get('/memberprofil/tambah','Member\AdminProfilController@tambah');
// Route::post('/memberprofil/tambah_aksi','Member\AdminProfilController@tambah_aksi');
// Route::get('/memberprofil/hapus_aksi/{id}','Member\AdminProfilController@hapus_aksi');
// Route::get('/memberprofil/edit/{id}','Member\AdminProfilController@edit');
Route::post('/pesertaprofil/update_aksi','Peserta\AdminProfilController@update_aksi');

Route::get('/pesertakelas','Peserta\AdminKelasController@index');
Route::get('/lihat_materi/{id_paket}','Peserta\AdminKelasController@lihat_materi');
Route::get('/preview_materi/{id_paket}','Peserta\AdminKelasController@preview_materi');
// Route::get('/memberprofil/tambah','Member\AdminProfilController@tambah');
// Route::post('/memberprofil/tambah_aksi','Member\AdminProfilController@tambah_aksi');
// Route::get('/memberprofil/hapus_aksi/{id}','Member\AdminProfilController@hapus_aksi');
// Route::get('/memberprofil/edit/{id}','Member\AdminProfilController@edit');
// Route::post('/pesertakelas/update_aksi','Peserta\AdminKelasController@update_aksi');


Route::get('/peserta', 'PesertaController@index');
Route::get('/peserta/export_excel', 'PesertaController@export_excel');
Route::post('/peserta/import_excel', 'PesertaController@import_excel');
