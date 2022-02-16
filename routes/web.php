<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('post.login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/profile', [HomeController::class, 'getProfile'])->middleware('auth')->name('profile.index');
Route::post('/profile', [HomeController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

Route::resource('groups', GroupController::class)->middleware('auth');
Route::resource('guests', GuestController::class)->middleware('auth');

Route::get('/guest', [GuestController::class, 'detail'])->name('guests.detail');

Route::get('/checkin', [GuestController::class, 'checkin'])->name('guests.checkin');
Route::get('/checkout', [GuestController::class, 'checkout'])->name('guests.checkout');