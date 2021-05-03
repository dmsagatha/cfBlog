<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categorias', CategoryController::class)
        ->parameters(['categorias' => 'category'])
        ->names('admin.categories');