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
                ->name('user.profile');

            Route::get('/todo-list', [\App\Http\Controllers\UserListController::class, 'index'])
                ->name('user.todo-list');

            Route::post('/todo-list', [\App\Http\Controllers\UserListController::class, 'store'])
                ->name('user.todo-list.store');

            Route::put('/todo-list/{userList}', [\App\Http\Controllers\UserListController::class, 'update'])
                ->name('user.todo-list.update');

            Route::delete('/todo-list/{userList}', [\App\Http\Controllers\UserListController::class, 'destroy'])
                ->name('user.todo-list.destroy');
        });
    });
});
