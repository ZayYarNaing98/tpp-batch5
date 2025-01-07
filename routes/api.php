<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('/auth/register', [AuthController::class, 'register']);

    Route::apiResource('/categories', CategoryController::class);
});
