<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GrafikBantuanController;

Route::middleware('api')->namespace('Api')->group(function(){
    Route::get('grafik_bantuan_sosial', [GrafikBantuanController::class, 'index']);
});
