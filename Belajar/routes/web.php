<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     echo"Hello World";
// });


// 1. Basic route
// Call controller
Route::get('/', [
    // panggil class HomeController
    HomeController::class,
    // panggil nama function
    'dashboard'
])->name('dashboard');

// route untuk login, logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
// action post untuk login
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// routes untuk /user
// Call controller
Route::get('/user', [HomeController::class, 'index'])->name('index');

// crud
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');

// update data
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');


// Delete data
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');


