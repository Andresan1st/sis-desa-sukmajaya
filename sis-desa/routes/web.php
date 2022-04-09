<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masdatajabatanController;
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

Route::controller(masdatajabatanController::class)->group(function(){
    Route::get('/mas_data_jabatan','index')->name('mas_data_jabatan_index');;
    Route::get('/mas_data_jabatan/create','create')->name('mas_data_jabatan_create');
    Route::get('/mas_data_jabatan/apijabatan','apijabatan');
    Route::post('/mas_data_jabatan/store','store');
    Route::get('/mas_data_jabatan/edit/{id}','edit');
});