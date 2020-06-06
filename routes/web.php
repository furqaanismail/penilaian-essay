<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'MainController@index');


Route::prefix('admin')->group(function () {
    //admin
    Route::get('/', 'AdminController@index');
    Route::get('auth', 'AdminController@auth');
    Route::get('register', 'AdminController@register');
    Route::post('proses_login', 'AdminController@proses_login');
    Route::get('logout', 'AdminController@logout');
    Route::get('profile', 'AdminController@profile');

    //dosen
    Route::get('dosen', 'AdminDosenController@index');
    Route::get('edit_dosen/{id}', 'AdminDosenController@show');
    Route::put('update_dosen/{id}', 'AdminDosenController@update');
    Route::get('delete_dosen/{id}', 'AdminDosenController@destroy');

    //mahasiswa
    Route::get('mahasiswa', 'AdminMahasiswaController@index');
    Route::get('edit_mahasiswa/{id}', 'AdminMahasiswaController@show');
    Route::put('update_mahasiswa/{id}', 'AdminMahasiswaController@update');
    Route::get('delete_mahasiswa/{id}', 'AdminMahasiswaController@destroy');

    //materi
    Route::get('materi', 'AdminMateriController@index');
    Route::get('edit_materi/{id}', 'AdminMateriController@show');
    Route::put('update_materi/{id}', 'AdminMateriController@update');
    Route::get('delete_materi/{id}', 'AdminMateriController@destroy');

    //soal
    Route::get('soal', 'AdminSoalController@index');
    Route::get('edit_soal/{id}', 'AdminSoalController@show');
    Route::put('update_soal/{id}', 'AdminSoalController@update');
    Route::get('delete_soal/{id}', 'AdminSoalController@destroy');
});

Route::prefix('dosen')->group(function () {
    //dosen
    Route::get('/', 'DosenController@index');
    Route::get('auth', 'DosenController@auth');
    Route::post('proses_login', 'DosenController@proses_login');
    Route::get('logout', 'DosenController@logout');
    Route::get('register', 'DosenController@register');
    Route::post('proses_register', 'DosenController@proses_register');
    Route::get('profile', 'DosenController@profile');

    //soal
    Route::get('soal', 'DosenSoalController@index');
    Route::get('create_soal', 'DosenSoalController@create');
    Route::post('add_ujian', 'DosenSoalController@store');

    //materi
    Route::get('materi', 'DosenMateriController@index');
    Route::get('create_materi', 'DosenMateriController@create');
    Route::post('add_materi', 'DosenMateriController@store');

    //periksa nilai
    Route::get('periksa', 'DosenPeriksaController@index');
    Route::get('nilai/{id}', 'DosenPeriksaController@nilai');
    Route::get('delete_nilai/{id}', 'DosenPeriksaController@destroy');

});


Route::prefix('mahasiswa')->group(function () {
    //mahasiswa
    Route::get('auth', 'MahasiswaController@index');
    Route::get('logout', 'MahasiswaController@logout');
    Route::post('login', 'MahasiswaController@login');
    Route::get('register', 'MahasiswaController@register');
    Route::post('proses_register', 'MahasiswaController@proses_register');
    Route::get('profile', 'MahasiswaController@profile');

    Route::get('materi', 'MahasiswaController@materi');
    Route::get('detail_materi/{id}', 'MahasiswaController@detail_materi');
    Route::get('ujian', 'MahasiswaController@ujian');
    Route::get('detail_ujian/{id}', 'MahasiswaController@detail_ujian');
    Route::get('soal/{id}', 'MahasiswaController@soal');
    Route::post('add_jawaban', 'MahasiswaController@store');
    Route::get('hasil_ujian/{id}', 'MahasiswaController@hasil');
});






