<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ChatController;
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

// Auth 

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Chat 
Route::get('/ai_response', [ChatController::class, 'aiResponse'])->name('aiResponse');
Route::get('chat/{id}', [ChatController::class, 'chat_detail'])->name('chatDetail');
Route::post('/chat/update/{id}', [ChatController::class, 'chat_name_update'])->name('chatNameUpdate');
Route::post('/chat/delete/{id}', [ChatController::class, 'chat_delete'])->name('chatDelete');
Route::post('/chat/clear', [ChatController::class, 'clear_all']);

// Socialite Login 

Route::get('login/{website}', [AuthController::class, 'redirectToProvider'])->name('websitelogin');
Route::get('login/{website}/callback', [AuthController::class, 'handleProviderCallback']);

// Backend 

// Custom Login Route
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('adminLogin');
Route::post('admin/login', [LoginController::class, 'login']);

// Custom Register Route
Route::get('admin/register', [RegisterController::class, 'showRegistrationForm'])->name('adminRegister');
Route::post('admin/register', [RegisterController::class, 'register']);
