<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

Route::post('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::resource('/users', UserController::class);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
