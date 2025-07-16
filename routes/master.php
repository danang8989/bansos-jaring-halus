<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Kepdes\DashboardController;
use App\Http\Controllers\Kepdes\JenisBantuanController;
use App\Http\Controllers\Kepdes\PendudukController;
use App\Http\Controllers\Kepdes\BantuanController;
use App\Http\Controllers\Kepdes\DaftarPenyaluranController;
use App\Http\Controllers\Kepdes\RekapBantuanController;

Route::middleware('auth')->namespace('Kepdes')->name('kepdes.')->prefix('/kepdes')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('penduduk', [PendudukController::class, 'index'])->name('penduduk');
    Route::get('jenis_bantuan', [JenisBantuanController::class, 'index'])->name('jenis_bantuan');

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