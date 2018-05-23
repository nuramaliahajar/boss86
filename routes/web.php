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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/semester', 'SemesterController@index')->name('semester.index');

Route::get('/mahasiswa', 'MahasiswaController@index')->name('mahasiswa.index');
Route::get('/mahasiswa/add', 'MahasiswaController@add')->name('mahasiswa.add');
Route::post('/mahasiswa', 'MahasiswaController@store')->name('mahasiswa.store');
Route::get('/mahasiswa/{nim}', 'MahasiswaController@edit')->name('mahasiswa.edit');
Route::put('/mahasiswa/{nim}', 'MahasiswaController@update')->name('mahasiswa.update');

Route::get('/jurusan', 'JurusanController@index')->name('jurusan.index');