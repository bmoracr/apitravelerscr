<?php
#Setting namespaces required

use App\Http\Controllers\Api\Apps\AppsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Tours\CategoryController;
use App\Http\Controllers\Api\Tours\ToursController;
use App\Http\Controllers\Api\Travelerscr\TicketsController;
use App\Http\Controllers\Api\Users\UsersController;
use Illuminate\Support\Facades\Route;


#Middleware to set Api Key Bearer validation
Route::group( ['middleware'=>['api.key'] ], function () {

    #Settings prefix auth to the endpoint
    Route::prefix('auth')->group(function () {
        
        #Auth register new user end point
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        #Auth login user end point
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    });

});

#Middleware to set authorization Bearer validation
Route::group( ['middleware'=>['auth:sanctum'] ], function () {

    #Apps end point
    Route::resources(['apps' => TicketsController::class]);
    #Apps end point
    Route::resources(['apps' => AppsController::class]);
    #Users end point
    Route::resources(['users' => UsersController::class]);
    #Tours end point
    Route::resources(['tours' => ToursController::class]);
    #Categories end point
    Route::resources(['categories'=> CategoryController::class]);

    #Auth logout user end point
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

});


    

    

    
    