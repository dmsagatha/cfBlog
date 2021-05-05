<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('usuarios', UserController::class)
  ->only(['index', 'edit', 'update'])
  ->parameters(['usuarios' => 'user'])
  ->names('admin.users');
Route::resource('categorias', CategoryController::class)
  ->parameters(['categorias' => 'category'])
  ->names('admin.categories');
Route::resource('etiquetas', TagController::class)
  ->parameters(['etiquetas' => 'tag'])
  ->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');