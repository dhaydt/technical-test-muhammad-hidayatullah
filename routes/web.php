<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// USER
Route::get('/home/user', [UserController::class, 'index'])->name('user');
Route::get('/home/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/home/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/home/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/home/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/home/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Category
Route::get('/home/category', [UserController::class, 'category'])->name('category');
Route::get('/home/cat/create', [CategoryController::class, 'create'])->name('cat.create');
Route::post('/home/cat/store', [CategoryController::class, 'store'])->name('cat.store');
Route::get('/home/cat/edit/{id}', [CategoryController::class, 'edit'])->name('cat.edit');
Route::put('/home/cat/update/{id}', [CategoryController::class, 'update'])->name('cat.update');
Route::get('/home/cat/destroy/{id}', [CategoryController::class, 'destroy'])->name('cat.destroy');

// Product
Route::get('/home/product', [UserController::class, 'product'])->name('product');
Route::get('/home/prod/create', [ProductController::class, 'create'])->name('prod.create');
Route::post('/home/prod/store', [ProductController::class, 'store'])->name('prod.store');
Route::get('/home/prod/edit/{id}', [ProductController::class, 'edit'])->name('prod.edit');
Route::put('/home/prod/update/{id}', [ProductController::class, 'update'])->name('prod.update');
Route::get('/home/prod/destroy/{id}', [ProductController::class, 'destroy'])->name('prod.destroy');

// Transaction
Route::get('/home/transaction', [UserController::class, 'transaction'])->name('transaction');
// Route::get('/home/transaction', [TransactionController::class, 'update'])->name('transaction.edit');
// Route::get('/home/transaction', [TransactionController::class, 'destroy'])->name('transaction.destroy');

// History
Route::get('/home/history', [UserController::class, 'history'])->name('history');
// Route::get('/home/history', [HistoryController::class, 'update'])->name('history.edit');
// Route::get('/home/history', [HistoryController::class, 'destroy'])->name('history.destroy');
