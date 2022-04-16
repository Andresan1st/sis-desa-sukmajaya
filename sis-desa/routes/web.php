<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masdatajabatanController;
use App\Http\Controllers\MasdatapegawaiController;
use App\Http\Controllers\MasdatamasyarakatController;
use App\Http\Controllers\MasstrukturoorController;
use App\Http\Controllers\suratmasukController;
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
    return view('layout.layout');
});
//ANDRE
Route::controller(masdatajabatanController::class)->group(function(){
    Route::get('/mas_data_jabatan','index')->name('mas_data_jabatan');;
    Route::get('/mas_data_jabatan/create','create')->name('mas_data_jabatan_create');
    Route::get('/mas_data_jabatan/apijabatan','apijabatan');
    Route::post('/mas_data_jabatan/store','store');
    Route::post('/mas_data_jabatan/update/{id}','update');
    Route::get('/mas_data_jabatan/edit/{id}','edit');
    Route::get('/mas_data_jabatan/show/{id}','show');
    Route::get('/mas_data_jabatan/delete/{id}','destroy');
});

Route::controller(MasdatapegawaiController::class)->group(function(){
    Route::get('/mas_data_pegawai','index')->name('mas_data_pegawai');;
    Route::get('/mas_data_pegawai/create','create')->name('mas_data_pegawai_create');
    Route::get('/mas_data_pegawai/apipegawai','apipegawai');
    Route::post('/mas_data_pegawai/store','store');
    Route::post('/mas_data_pegawai/update/{id}','update');
    Route::get('/mas_data_pegawai/edit/{id}','edit');
    Route::get('/mas_data_pegawai/show/{id}','show');
    Route::get('/mas_data_pegawai/delete/{id}','destroy');
});

Route::controller(MasdatamasyarakatController::class)->group(function(){
    Route::get('/mas_data_masyarakat','index')->name('mas_data_masyarakat');;
    Route::get('/mas_data_masyarakat/create','create')->name('mas_data_masyarakat_create');
    Route::get('/mas_data_masyarakat/apimasyarakat','apimasyarakat');
    Route::post('/mas_data_masyarakat/store','store');
    Route::post('/mas_data_masyarakat/update/{id}','update');
    Route::get('/mas_data_masyarakat/edit/{id}','edit');
    Route::get('/mas_data_masyarakat/show/{id}','show');
    Route::get('/mas_data_masyarakat/delete/{id}','destroy');
});


Route::controller(MasstrukturoorController::class)->group(function(){
    Route::get('/mas_data_organisasi','index')->name('mas_data_organisasi');;
    Route::get('/mas_data_organisasi/create','create')->name('mas_data_organisasi_create');
    Route::get('/mas_data_organisasi/apiorganisasi','apiorganisasi');
    Route::post('/mas_data_organisasi/store','store');
    Route::post('/mas_data_organisasi/update/{id}','update');
    Route::get('/mas_data_organisasi/edit/{id}','edit');
    Route::get('/mas_data_organisasi/show/{id}','show');
    Route::get('/mas_data_organisasi/delete/{id}','destroy');
});

//ANDRE

Route::controller(suratmasukController::class)->group(function(){
    Route::get('/surat_masuk','index')->name('page.surat_masuk');
    Route::post('/surat_masuk_store','store')->name('store.surat_masuk');
    Route::get('/surat_masuk_table','table')->name('table.surat_masuk');
    Route::post('/surat_masuk_delete','remove')->name('delete.surat_masuk');
    Route::post('/surat_masuk_download','download')->name('download.surat_masuk');
    Route::post('/surat_masuk_download2','download2')->name('download2.surat_masuk');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
