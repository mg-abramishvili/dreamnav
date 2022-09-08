<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ADMIN PAGES
Route::get('admin/pages', [App\Http\Controllers\Admin\PageController::class, 'index']);
Route::post('admin/pages', [App\Http\Controllers\Admin\PageController::class, 'store']);
Route::get('admin/page/{id}', [App\Http\Controllers\Admin\PageController::class, 'page']);
Route::put('admin/page/{id}/update', [App\Http\Controllers\Admin\PageController::class, 'update']);
Route::delete('admin/page/{id}/delete', [App\Http\Controllers\Admin\PageController::class, 'delete']);

// ADMIN BLOCKS
Route::post('admin/blocks', [App\Http\Controllers\Admin\BlockController::class, 'store']);
Route::put('admin/block/{id}/update', [App\Http\Controllers\Admin\BlockController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
