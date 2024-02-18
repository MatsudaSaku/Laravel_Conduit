<?php

use App\Http\Controllers\ConduitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',  [ConduitController::class, 'home'])->name('home');

Route::get('/register',  [ConduitController::class, 'register'])->name('register');

Route::get('/login',  [ConduitController::class, 'login'])->name('login');

Route::post('/login',  [ConduitController::class, 'login_auth'])->name('login_auth');

Route::get('/setting',  [ConduitController::class, 'setting'])->name('setting');

Route::get('/editor/{id}',  [ConduitController::class, 'article_editor'])->name('article_editor');

Route::post('/update_editor/{id}',  [ConduitController::class, 'update_editor'])->name('update_editor');

Route::post('/create',  [ConduitController::class, 'article_create'])->name('create');

Route::post('/register', [ConduitController::class, 'register_create'])->name('register_create');

Route::get('/create',  [ConduitController::class, 'create']);

Route::get('/editor/article-slug-here',  [ConduitController::class, 'editor/article'])->name('editor/article');

Route::get('/article/{headline}',  [ConduitController::class, 'article_headline'])->name('article_headline');

Route::get('/profile/:username',  [ConduitController::class, 'username'])->name('username');

Route::get('/favorites',  [ConduitController::class, 'favorites'])->name('favorites');

Route::get('/delete/{id}', [ConduitController::class, 'delete'])->name('delete');

Route::post('/logout',  [ConduitController::class, 'logout'])->name('logout');