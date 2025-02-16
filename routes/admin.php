<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DusunController;
use App\Http\Controllers\Admin\JenisBantuanController;
use App\Http\Controllers\Admin\PendudukController;

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
});