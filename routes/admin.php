<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('usuarios', UserController::class)
  ->only(['index', 'edit', 'update'])
  ->parameters(['usuarios' => 'user'])
  ->names('admin.users');
Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');
Route::resource('categorias', CategoryController::class)
  ->except('show')
  ->parameters(['categorias' => 'category'])
  ->names('admin.categories');
Route::resource('etiquetas', TagController::class)
  ->except('show')
  ->parameters(['etiquetas' => 'tag'])
  ->names('admin.tags');
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');