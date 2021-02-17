<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LemaryController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin page
Route::middleware('auth')->group(function() {
	Route::resource('categories', CategoryController::class);
	Route::resource('books', BookController::class);
	Route::resource('authors', AuthorController::class);
	Route::resource('lemaries', LemaryController::class);
	Route::resource('penerbits', PenerbitController::class);
	Route::resource('tahuns', TahunController::class);
	Route::resource('tags', TagController::class);
	Route::post('/logout', [AuthController::class, 'logout']);
});


// user page
Route::get('/', [TamuController::class, 'index']);
Route::post('/cari', [TamuController::class, 'cari']);
Route::get('/detail/{id}', [TamuController::class, 'detail']);
Route::get('/terbaru', [TamuController::class, 'terbaru']);
Route::get('/kategori/{id}', [TamuController::class, 'kategori']);
Route::get('/tahun', [TamuController::class, 'tahun']);
Route::get('/tahun/{id}', [TamuController::class, 'tahunDetail']);
Route::get('/penulis', [TamuController::class, 'penulis']);
Route::get('/penulis/{id}', [TamuController::class, 'penulisDetail']);

// login page
Route::middleware('guest')->group(function() {
	Route::get('/login', [AuthController::class, 'index'])->name('login');
	Route::post('/login', [AuthController::class, 'prosesLogin']);
});
