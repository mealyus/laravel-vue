<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisteredUserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::group(['middleware' => 'api'], function () {
    require __DIR__.'/auth.php';
});

Route::group(['middleware' => ['api', 'auth:api']], function () {
    Route::get('/user/{id?}', [RegisteredUserController::class, 'getUser']);
    Route::patch('/user/{id}', [RegisteredUserController::class, 'updateUser']);
    Route::delete('/user/{id}', [RegisteredUserController::class, 'deleteUser']);
    Route::get('/users/count', [RegisteredUserController::class, 'getUsersCount']);
    Route::get('/users', [RegisteredUserController::class, 'getUsers']);
});
