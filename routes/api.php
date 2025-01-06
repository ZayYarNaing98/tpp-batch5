<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function(){
    Route::post('/login', [AuthController::class, 'login']);
});
