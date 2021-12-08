<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\LoginController;
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

//halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); 

Route::post('/register', [LoginController::class, 'store']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//halaman kategori
Route::resource('/categories', CategoryController::class)->middleware('auth');

//halaman sepeda
Route::resource('/bikes', BikeController::class)->middleware('auth'); 

//halaman rental
Route::resource('/rents', RentController::class)->middleware('auth'); 
