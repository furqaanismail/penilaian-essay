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
    Route::get('create_soal/{id}', 'DosenSoalController@create');
    Route::post('add_ujian/{id}', 'DosenSoalController@store');
    Route::get('edit_soal/{id}', 'DosenSoalController@show');
    Route::put('update_soal/{id}', 'DosenSoalController@update');


    //materi
    Route::get('materi', 'DosenMateriController@index');
    Route::get('create_materi', 'DosenMateriController@create');
    Route::post('add_materi', 'DosenMateriController@store');
    Route::get('detail_materi/{id}', 'DosenMateriController@detail_materi');
    Route::put('update_materi/{id}', 'DosenMateriController@update');
    Route::get('edit_materi/{id}', 'DosenMateriController@show');
    Route::delete('delete_materi/{id}', 'DosenMateriController@destroy');

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






