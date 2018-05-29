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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/semester', 'SemesterController@index')->name('semester.index');

    Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/mahasiswa/add', 'MahasiswaController@add')->name('mahasiswa.add');
    Route::post('/mahasiswa', 'MahasiswaController@store')->name('mahasiswa.store');
    Route::get('/mahasiswa/{nim}', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::put('/mahasiswa/{nim}', 'MahasiswaController@update')->name('mahasiswa.update');

    Route::get('/dosen', 'DosenController@index')->name('dosen.index');
    Route::get('/dosen/add', 'DosenController@add')->name('dosen.add');
    Route::post('/dosen', 'DosenController@store')->name('dosen.store');
    Route::get('/dosen/{nim}', 'DosenController@edit')->name('dosen.edit');
    Route::put('/dosen/{nim}', 'DosenController@update')->name('dosen.update');

    Route::get('/jurusan', 'JurusanController@index')->name('jurusan.index');
    Route::get('/kelas', 'KelasController@index')->name('kelas.index');

    Route::get('/matkul', 'MataKuliahController@index')->name('matkul.index');
    Route::get('/matkul/{kode_mk}', 'MataKuliahController@edit')->name('matkul.edit');
    Route::put('/matkul/{kode_mk}', 'MataKuliahController@update')->name('matkul.update');

    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/add', 'UserController@add')->name('user.add');
    Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'UserController@update')->name('user.update');
    Route::post('/user', 'UserController@store')->name('user.store');

    Route::get('/transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::get('/transaksi/add', 'TransaksiController@add')->name('transaksi.add');
    Route::post('/transaksi', 'TransaksiController@store')->name('transaksi.store');
    Route::get('/transaksi/{barcode}', 'TransaksiController@showBarcode')->name('transaksi.show');

    Route::get('/absensi', 'AbsensiController@index')->name('absensi.index');
    Route::get('/absensi/add', 'AbsensiController@tambah')->name('absensi.add');
    Route::get('/absensi', 'AbsensiController@store')->name('absensi.store');
});