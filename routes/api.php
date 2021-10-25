<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])
        ->name('auth.logout');

    Route::group(['middleware' => 'auth:api'], function ($router) {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [\App\Http\Controllers\UserProfileController::class, 'index'])
                ->name('auth.user.profile');

            Route::get('/todo-list', [\App\Http\Controllers\UserListController::class, 'index']);
        });
    });
});
