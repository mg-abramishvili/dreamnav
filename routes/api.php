<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ADMIN CONFIGS
Route::get('admin/config', [App\Http\Controllers\Admin\ConfigController::class, 'index']);
Route::put('admin/config-update', [App\Http\Controllers\Admin\ConfigController::class, 'update']);

// ADMIN PAGES
Route::get('admin/pages', [App\Http\Controllers\Admin\PageController::class, 'index']);
Route::post('admin/pages', [App\Http\Controllers\Admin\PageController::class, 'store']);
Route::get('admin/page/{id}', [App\Http\Controllers\Admin\PageController::class, 'page']);
Route::put('admin/page/{id}/update', [App\Http\Controllers\Admin\PageController::class, 'update']);
Route::delete('admin/page/{id}/delete', [App\Http\Controllers\Admin\PageController::class, 'delete']);

// ADMIN BLOCKS
Route::post('admin/blocks', [App\Http\Controllers\Admin\BlockController::class, 'store']);
Route::put('admin/block/{id}/update', [App\Http\Controllers\Admin\BlockController::class, 'update']);

// ADMIN KIOSKS
Route::get('admin/kiosks', [App\Http\Controllers\Admin\KioskController::class, 'index']);
Route::post('admin/kiosks', [App\Http\Controllers\Admin\KioskController::class, 'store']);
Route::get('admin/kiosk/{id}', [App\Http\Controllers\Admin\KioskController::class, 'kiosk']);
Route::put('admin/kiosk/{id}/update', [App\Http\Controllers\Admin\KioskController::class, 'update']);
Route::delete('admin/kiosk/{id}/delete', [App\Http\Controllers\Admin\KioskController::class, 'delete']);

// ADMIN SCHEMES
Route::get('admin/schemes', [App\Http\Controllers\Admin\SchemeController::class, 'index']);
Route::post('admin/schemes', [App\Http\Controllers\Admin\SchemeController::class, 'store']);
Route::get('admin/scheme/{id}', [App\Http\Controllers\Admin\SchemeController::class, 'scheme']);
Route::put('admin/scheme/{id}/update', [App\Http\Controllers\Admin\SchemeController::class, 'update']);
Route::delete('admin/scheme/{id}/delete', [App\Http\Controllers\Admin\SchemeController::class, 'delete']);

// ADMIN POINTS
Route::get('admin/points', [App\Http\Controllers\Admin\PointController::class, 'index']);
Route::post('admin/points', [App\Http\Controllers\Admin\PointController::class, 'store']);
Route::get('admin/point/{id}', [App\Http\Controllers\Admin\PointController::class, 'point']);
Route::put('admin/point/{id}/update', [App\Http\Controllers\Admin\PointController::class, 'update']);
Route::delete('admin/point/{id}/delete', [App\Http\Controllers\Admin\PointController::class, 'delete']);

// ADMIN BANNERS
Route::get('admin/banners', [App\Http\Controllers\Admin\BannerController::class, 'index']);
Route::post('admin/banners', [App\Http\Controllers\Admin\BannerController::class, 'store']);
Route::get('admin/banner/{id}', [App\Http\Controllers\Admin\BannerController::class, 'banner']);
Route::put('admin/banner/{id}/update', [App\Http\Controllers\Admin\BannerController::class, 'update']);
Route::delete('admin/banner/{id}/delete', [App\Http\Controllers\Admin\BannerController::class, 'delete']);

// ADMIN FILE UPLOAD
Route::post('admin/file/upload', [App\Http\Controllers\Admin\FileController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
