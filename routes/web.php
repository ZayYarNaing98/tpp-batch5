<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Static Route
Route::get('/blogs', function(){
    return "Hello, This is Blog Page!";
});

// Dynamic Route
Route::get('/blogs/{id}', function($id){
    return "Hello, This is Blog Detail - $id";
});

// Nmaing Route
Route::get('/dashboard', function(){
    return "Welcome form TPP Program";
})->name('dashboard.tpp');

Route::get('/welcome-tpp', function(){
    return redirect()->route('dashboard.tpp');
});

// Group Route
Route::prefix('/tpp')->group(function(){
    Route::get('/admin', function(){
        return "This is TPP Admin.";
    })->name('tpp.admin');

    Route::get('/user', function(){
        return "This is TPP User.";
    });

    Route::get('/student', function(){
        return redirect()->route('tpp.admin');
    });
});

// Route::get('/categories', function(){
//     return view('categories.index');
// });

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
