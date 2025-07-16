<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        if (auth()->user()->user_level == "admin") {
            return redirect('/admin');
        }else{
            return redirect('/master');
        }
    }
    return redirect('/login');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/master.php';
