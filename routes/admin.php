<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DusunController;
use App\Http\Controllers\Admin\JenisBantuanController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\KonsumsiController;
use App\Http\Controllers\Admin\PekerjaanController;
use App\Http\Controllers\Admin\BantuanController;
use App\Http\Controllers\Admin\DaftarPenyaluranController;
use App\Http\Controllers\Admin\RekapBantuanController;

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('/admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('penduduk', [PendudukController::class, 'index'])->name('penduduk');
    Route::get('penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
    Route::post('penduduk', [PendudukController::class, 'insert'])->name('penduduk.insert');
    Route::get('penduduk/{penduduk}', [PendudukController::class, 'edit'])->name('penduduk.edit');
    Route::put('penduduk', [PendudukController::class, 'update'])->name('penduduk.update');
    Route::delete('penduduk', [PendudukController::class, 'delete'])->name('penduduk.delete');

    Route::get('jenis_bantuan', [JenisBantuanController::class, 'index'])->name('jenis_bantuan');
    Route::get('jenis_bantuan/create', [JenisBantuanController::class, 'create'])->name('jenis_bantuan.create');
    Route::post('jenis_bantuan', [JenisBantuanController::class, 'insert'])->name('jenis_bantuan.insert');
    Route::get('jenis_bantuan/{jenis_bantuan}', [JenisBantuanController::class, 'edit'])->name('jenis_bantuan.edit');
    Route::put('jenis_bantuan', [JenisBantuanController::class, 'update'])->name('jenis_bantuan.update');
    Route::delete('jenis_bantuan', [JenisBantuanController::class, 'delete'])->name('jenis_bantuan.delete');

    Route::get('dusun', [DusunController::class, 'index'])->name('dusun');
    Route::get('dusun/create', [DusunController::class, 'create'])->name('dusun.create');
    Route::post('dusun', [DusunController::class, 'insert'])->name('dusun.insert');
    Route::get('dusun/{dusun}', [DusunController::class, 'edit'])->name('dusun.edit');
    Route::put('dusun', [DusunController::class, 'update'])->name('dusun.update');
    Route::delete('dusun', [DusunController::class, 'delete'])->name('dusun.delete');

    Route::get('konsumsi', [KonsumsiController::class, 'index'])->name('konsumsi');
    Route::get('konsumsi/create', [KonsumsiController::class, 'create'])->name('konsumsi.create');
    Route::post('konsumsi', [KonsumsiController::class, 'insert'])->name('konsumsi.insert');
    Route::get('konsumsi/{konsumsi}', [KonsumsiController::class, 'edit'])->name('konsumsi.edit');
    Route::put('konsumsi', [KonsumsiController::class, 'update'])->name('konsumsi.update');
    Route::delete('konsumsi', [KonsumsiController::class, 'delete'])->name('konsumsi.delete');

    Route::get('pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan');
    Route::get('pekerjaan/create', [PekerjaanController::class, 'create'])->name('pekerjaan.create');
    Route::post('pekerjaan', [PekerjaanController::class, 'insert'])->name('pekerjaan.insert');
    Route::get('pekerjaan/{pekerjaan}', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
    Route::put('pekerjaan', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
    Route::delete('pekerjaan', [PekerjaanController::class, 'delete'])->name('pekerjaan.delete');

    Route::get('bantuan', [BantuanController::class, 'index'])->name('bantuan');
    Route::get('bantuan/create', [BantuanController::class, 'create'])->name('bantuan.create');
    Route::post('bantuan', [BantuanController::class, 'insert'])->name('bantuan.insert');
    Route::get('bantuan/{bantuan}', [BantuanController::class, 'edit'])->name('bantuan.edit');
    Route::put('bantuan', [BantuanController::class, 'update'])->name('bantuan.update');
    Route::delete('bantuan', [BantuanController::class, 'delete'])->name('bantuan.delete');

    Route::get('daftar_penyaluran', [DaftarPenyaluranController::class, 'index'])->name('daftar_penyaluran');
    Route::get('daftar_penyaluran/{bantuan}', [DaftarPenyaluranController::class, 'edit'])->name('daftar_penyaluran.edit');
    Route::put('daftar_penyaluran', [DaftarPenyaluranController::class, 'update'])->name('daftar_penyaluran.update');
    Route::delete('daftar_penyaluran', [DaftarPenyaluranController::class, 'delete'])->name('daftar_penyaluran.delete');

    Route::get('rekap_bantuan', [RekapBantuanController::class, 'index'])->name('rekap_bantuan');
    Route::post('rekap_bantuan/download', [RekapBantuanController::class, 'download'])->name('rekap_bantuan.download');
});