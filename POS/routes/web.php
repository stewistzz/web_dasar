<?php

use Illuminate\Support\Facades\Route;
// page controller
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// halaman utama/home
Route::get('/', [PageController::class, 'home'])->name('home');


// route untuk halaman category
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [PageController::class, 'category'])->name('category.food');
    Route::get('/beauty-health', [PageController::class, 'category'])->name('category.beauty');
    Route::get('/home-care', [PageController::class, 'category'])->name('category.home');
    Route::get('/baby-kid', [PageController::class, 'category'])->name('category.baby');
});

// halaman user
Route::get('/user/{name?}/id/{id?}', function ($name = 'John', $id = 1) {
    return 'Nama saya ' . $name . 'dengan id ' . $id;
});

// halaman transaksi
Route::get('/transaksi', [PageController::class, 'transaksi']);