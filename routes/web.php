<?php

use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blogs-by-category/{id}', [CategoryController::class,'blogsByCategory'])->name('blogsByCategory');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blog', [BlogController::class,'index'])->name('blog');
    Route::post('/blog/store', [BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class,'edit'])->name('blog.edit');
    Route::post('/blog/update', [BlogController::class,'update'])->name('blog.update');
    Route::get('/blog/delete/{blog_id}', [BlogController::class,'delete'])->name('blog.delete');

    Route::get('/category', [CategoryController::class,'index'])->name('category');
    Route::post('/category/store', [CategoryController::class,'store'])->name('category.store');
    

});
