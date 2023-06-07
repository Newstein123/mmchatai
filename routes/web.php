<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ChatController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CustomerController;

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

// Admin Middleware 

Route::prefix('admin')->middleware('role:super-admin|admin|editor')->group(function () {

    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Admin User 

    Route::get('/user', [UserController::class, 'index'])->name('userIndex');
    Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('/user/store', [UserController::class, 'store'])->name('userStore');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('userView');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('userDelete');

    // Customers 

    Route::prefix('customer')->group(function() {
        Route::get('/', [CustomerController::class, 'index'])->name('customerIndex');
        Route::get('/create', [CustomerController::class, 'create'])->name('customerCreate');
        Route::post('/store', [CustomerController::class, 'store'])->name('customerStore');
        Route::get('/{id}', [CustomerController::class, 'show'])->name('customerView');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customerEdit');
        Route::put('/edit/{id}', [CustomerController::class, 'update'])->name('customerUpdate');
        Route::post('/delete', [CustomerController::class, 'delete'])->name('customerDelete');
    });

    Route::prefix('setting')->group(function() {

        // Permissions 
        Route::get('/permission', [PermissionController::class, 'get_all_roles'])->name('permissionIndex');
        Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permissionEdit');
        Route::post('/permission/give', [PermissionController::class, 'grant_permission'])->name('grantPermission');

        // General Setting 

        Route::get('/general', [GeneralSettingController::class, 'index'])->name('generalIndex');
        Route::get('/general/edit/{id}', [GeneralSettingController::class, 'edit'])->name('generalEdit');
        Route::put('/general/edit/{id}', [GeneralSettingController::class, 'update'])->name('generalUpdate');

         // Account 

         Route::get('/account/{id}', [AccountController::class , 'show'])->name('accountShow');
         Route::get('/account/edit/{id}', [AccountController::class , 'edit'])->name('accountEdit');
         Route::put('/account/edit/{id}', [AccountController::class , 'update'])->name('accountUpdate');

         // change State 
        Route::post('/changeUserState', [UserController::class, 'change_state'])->name('changeUserState');
    });

});
