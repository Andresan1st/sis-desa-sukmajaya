<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masdatajabatanController;
use App\Http\Controllers\MasdatapegawaiController;
use App\Http\Controllers\MasdatamasyarakatController;
use App\Http\Controllers\MasstrukturoorController;
use App\Http\Controllers\suratmasukController;
use App\Http\Controllers\suratkeluarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserroleController;
use App\Http\Controllers\RepsuratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MasdanabantuanController;
use App\Http\Controllers\MaskeuangandesaController;
use App\Http\Controllers\MasabsensiController;
use App\Http\Controllers\ReportController;
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
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[LoginController::class,'index'])->name('loginform');
Auth::routes();

Route::group(['middleware'=> ['auth','cekrole:admin,kepala desa,wakil ketua,sekertaris,staff1,staff2']],function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/home','home')->name('home');
        Route::get('/dashboard','index')->name('dashboard_statistic');
        Route::get('/dashboard/getdatadashboard','getdata');
        Route::get('/dashboard/statistikpenduduk','getpenduduk');
        Route::get('/dashboard/statistiksuara','getsuara');
        Route::get('/dashboard/statistikdanabantuan','getdanabantuan');
        Route::get('/dashboard/listpegawaioor','getdataorganisasi');
    });

    Route::get('logout',[LoginController::class,'logout'])->name('logoutform');
    //ANDRE

    Route::controller(UserroleController::class)->group(function(){
        Route::get('/mas_data_userrole','index')->name('mas_data_userrole');;
        Route::get('/mas_data_userrole/create','create')->name('mas_data_userrole_create');
        Route::get('/mas_data_userrole/apiuserrole','apiuserrole');
        Route::post('/mas_data_userrole/store','store');
        Route::post('/mas_data_userrole/update/{id}','update');
        Route::get('/mas_data_userrole/edit/{id}','edit');
        Route::get('/mas_data_userrole/show/{id}','show');
        Route::get('/mas_data_userrole/delete/{id}','destroy');
    });

    Route::controller(masdatajabatanController::class)->group(function(){
        Route::get('/mas_data_jabatan','index')->name('mas_data_jabatan');
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


    Route::controller(MasdanabantuanController::class)->group(function(){
        Route::get('/mas_data_bantuan','index')->name('mas_data_bantuan');;
        Route::get('/mas_data_bantuan/create','create')->name('mas_data_bantuan_create');
        Route::get('/mas_data_bantuan/apibantuan','apibantuan');
        Route::post('/mas_data_bantuan/store','store');
        Route::post('/mas_data_bantuan/update/{id}','update');
        Route::get('/mas_data_bantuan/edit/{id}','edit');
        Route::get('/mas_data_bantuan/show/{id}','show');
        Route::get('/mas_data_bantuan/delete/{id}','destroy');
    });


    Route::controller(MaskeuangandesaController::class)->group(function(){
        Route::get('/mas_data_keuangan','index')->name('mas_data_keuangan');;
        Route::get('/mas_data_keuangan/create','create')->name('mas_data_keuangan_create');
        Route::get('/mas_data_keuangan/apikeuangan','apikeuangan');
        Route::post('/mas_data_keuangan/store','store');
        Route::post('/mas_data_keuangan/update/{id}','update');
        Route::get('/mas_data_keuangan/edit/{id}','edit');
        Route::get('/mas_data_keuangan/show/{id}','show');
        Route::get('/mas_data_keuangan/delete/{id}','destroy');
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


    Route::controller(RepsuratController::class)->group(function(){
        Route::get('/rep_surat','index');
        // Route::get('/mas_data_userrole/create','create')->name('mas_data_userrole_create');
        Route::post('/rep_surat/apisurat','apisearch');
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

    Route::controller(suratkeluarController::class)->group(function(){
        Route::get('/surat_keluar','index')->name('page.surat_keluar');
        Route::get('/surat_keluar/{id}','buat_surat');
        Route::post('/surat_keluar_store','store')->name('store.surat_keluar');
        Route::get('/surat_keluar/{jenis_surat_keluar_id}/{format_surat_keluar_id}','buat_surat2');
        Route::post('/surat_keluar_dell','dell_surat_keluar')->name('dell.surat_keluar');
        // Jenis
        Route::get('/jenis_surat_keluar','jenis_surat')->name('page.jenis_surat');
        Route::post('/jenis_surat_keluar_store','store_jenis_surat')->name('store.jenis_surat');
        Route::post('/jenis_surat_keluar_dell','dell_jenis_surat')->name('dell.jenis_surat');
        // Format
        Route::get('/format_surat_keluar','format_surat')->name('page.format_surat');
        Route::post('/format_surat_keluar_store','store_format_surat')->name('store.format_surat');
        Route::post('/format_surat_keluar_dell','dell_format_surat')->name('dell.format_surat');
        Route::post('/section_format_surat_keluar_store','store_struktur_surat')->name('store.struktur_surat');
        Route::post('/section_format_surat_keluar_dell','dell_struktur_surat')->name('dell.struktur_surat');
        // Database
        Route::get('/data_surat_keluar','database')->name('database.surat_keluar');
        // Preview
        Route::get('/preview_surat_keluar/{id}/{format_surat_id}','preview')->name('preview.surat_keluar');
        // Cetak
        Route::get('/cetak_surat_keluar/{id}','cetak');
        // Cek masyarakat terdaftar yang akan mengurus surat
        Route::get('/cek_nik','cek_nik')->name('cek_nik');
        Route::get('/get_data_masyarakat/{id_masyarakat}','get_data');
    });


    Route::controller(MasabsensiController::class)->group(function(){
        Route::get('/mas_data_absensi','index')->name('mas_data_absensi');
        Route::get('/mas_data_absensi/Qrcode','qrcodescan');
        Route::get('/mas_data_absensi/store/{id}','store');
        Route::get('/mas_data_absensi/list_absensi','list_absensi');
        Route::get('/mas_data_absensi/report_bulanan', 'report_bulanan');
        Route::get('/mas_data_absensi/report_bulanan/{month}', 'report_bulanan_data');
    });

    Route::controller(ReportController::class)->group(function(){
        Route::get('/report_data_absensi/{month}', 'report_absensi');
    });

    Route::controller(ColorController::class)->group(function(){
        Route::post('/submit_color','submit_color')->name('submit.color');
    }); 

    Route::controller(AbsensiController::class)->group(function(){
        Route::get('/scan_absensi','scan_absensi')->name('scan.absensi');
    });
});
