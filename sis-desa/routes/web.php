<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/surat-masuk',[SuratMasukController::class,'surat_masuk_page'])->name('surat_masuk');
Route::post('/surat-masuk-store',[SuratMasukController::class,'store_surat_masuk'])->name('surat_masuk.store');