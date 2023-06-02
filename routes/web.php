<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\HomeController;
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


// Frontend 

Route::get('/', [HomeController::class, 'index'])->name('home');    

// Backend 

// Custom Login Route
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('adminLogin');
Route::post('admin/login', [LoginController::class, 'login']);

// Custom Register Route
Route::get('admin/register', [RegisterController::class, 'showRegistrationForm'])->name('adminRegister');
Route::post('admin/register', [RegisterController::class, 'register']);
