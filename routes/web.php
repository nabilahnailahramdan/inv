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

Route::get('/', function (){
    return view('welcome');
});

Route::group([
    'prefix'=> config('invensa.prefix') 
],function () {
    Route::get('login','LoginPetugasController@formLogin')->name('petugas.login');
    Route::post('login','LoginPetugasController@login');

    Route::middleware(['auth:petugas'])->group(function () {
        Route::post('logout','LoginPetugasController@logout')->name('petugas.logout');
        Route::view('/', 'dashboard') ->name('petugas.dashboard');
        Route::get('profile', 'PetugasProfileController@index')->name('petugas.profile');
        Route::put('profile', 'PetugasProfileController@update');

        Route::middleware(['can:level, "admin"'])->group(function () {
            Route::resource('petugas','PetugasController');
            Route::resource('pegawai', 'PegawaiController');
            Route::resource('jenis', 'JenisController');
            Route::resource('ruang', 'RuangController');
        });
        
    });
    
});

