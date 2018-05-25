<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/transaksi/barcode/{barcode}', 'TransaksiController@selectBarcode')->name('transaksi.selectBarcode');

Route::get('/semester', 'SemesterController@getData')->name('semester.get');
Route::post('/semester', 'SemesterController@store')->name('semester.store');
Route::get('/semester/{id}', 'SemesterController@edit')->name('semester.edit');
Route::post('/semester/update', 'SemesterController@update')->name('semester.update');
Route::delete('/semester/{id}', 'SemesterController@delete')->name('semester.delete');

Route::get('/jurusan', 'JurusanController@getData')->name('jurusan.get');
Route::post('/jurusan', 'JurusanController@store')->name('jurusan.store');
Route::get('/jurusan/{k_jursan}', 'JurusanController@edit')->name('jurusan.edit');
Route::post('/jurusan/update', 'JurusanController@update')->name('jurusan.update');
Route::delete('/jurusan/{k_jursan}', 'JurusanController@delete')->name('jurusan.delete');

Route::get('/matkul', 'MataKuliahController@getData')->name('matkul.get');
Route::post('/matkul', 'MataKuliahController@store')->name('matkul.store');
Route::delete('/matkul/{k_jursan}', 'MataKuliahController@delete')->name('matkul.delete');
Route::get('/matkul/dosen', 'MataKuliahController@getDosen')->name('matkul.dosen');

Route::get('/kelas', 'KelasController@getData')->name('kelas.get');
Route::post('/kelas', 'KelasController@store')->name('kelas.store');
Route::get('/kelas/{k_jursan}', 'KelasController@edit')->name('kelas.edit');
Route::post('/kelas/update', 'KelasController@update')->name('kelas.update');
Route::delete('/kelas/{k_jursan}', 'KelasController@delete')->name('kelas.delete');

Route::get('/mahasiswa', 'MahasiswaController@getData')->name('mahasiswa.get');
Route::get('/mahasiswa/{nim}', 'MahasiswaController@detail')->name('mahasiswa.detail');
Route::delete('/mahasiswa/{nim}', 'MahasiswaController@destroy')->name('mahasiswa.destroy');

Route::get('/dosen', 'DosenController@getData')->name('dosen.get');
Route::get('/dosen/{nim}', 'DosenController@detail')->name('dosen.detail');
Route::delete('/dosen/{nim}', 'DosenController@destroy')->name('dosen.destroy');

Route::get('/user', 'UserController@getData')->name('user.get');
Route::get('/user/mahasiswa', 'UserController@getMahasiswa')->name('user.get_mhs');
Route::get('/user/mahasiswa/{email}', 'UserController@selectMhs')->name('user.select');
Route::get('/user/dosen', 'UserController@dosen')->name('user.dosen');
Route::get('/user/dosen/{email}', 'UserController@selectDosen')->name('user.select_dosen');
Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');