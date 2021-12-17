<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Tours\ToursController;
use App\Http\Controllers\Api\Users\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group( ['middleware'=>['api.key'] ], function () {

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    });

});

Route::group( ['middleware'=>['auth:sanctum'] ], function () {

    Route::resources(['users' => UsersController::class]);
    Route::resources(['tours' => ToursController::class]);
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

});