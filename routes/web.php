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

Route::get('/setting',  [ConduitController::class, 'setting'])->name('setting');

Route::get('/editor',  [ConduitController::class, 'editor'])->name('editor');

Route::get('/editor/article-slug-here',  [ConduitController::class, 'editor/article'])->name('editor/article');

Route::get('/article/{headline}',  [ConduitController::class, 'article_headline'])->name('article_headline');

Route::get('/profile/:username',  [ConduitController::class, 'username'])->name('username');

Route::get('/favorites',  [ConduitController::class, 'favorites'])->name('favorites');