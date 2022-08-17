<?php

use Illuminate\Support\Facades\Route;

Route::prefix("kiosk")->group(function() {
    Route::get('{any}', function () {
        return view('front');
    })->where('any', '.*');
});

Route::prefix("admin")->group(function() {
    Route::get('{any}', function () {
        return view('admin');
    })->where('any', '.*');
});