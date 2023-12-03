<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolePermissionController;

Route::prefix('admin')->group(function () {
    Route::get('/roles-and-permissions', [RolePermissionController::class, 'index']);
    Route::post('/roles/{role}/permissions', [RolePermissionController::class, 'store']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::post('/permissions', [PermissionController::class, 'store']);
});