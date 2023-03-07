<?php

use App\Http\Controllers\ChangeProfileController;
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

Auth::routes();

// Starting Point
Route::get('/', function () {return view('welcome');})->name('index');

Route::get('/about', function () {return view('pages.frontend.about');})->name('about');
Route::get('/room', function () {return view('pages.frontend.room');})->name('room');
Route::get('/mass-trust', function () {return view('pages.frontend.masstrust');})->name('masstrust');
Route::get('/kosaalai', function () {return view('pages.frontend.kosaalai');})->name('kosaalai');
Route::get('/contact', function () {return view('pages.frontend.contact');})->name('contact');

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Home - Prevent Back Browser Button - After Logout
Route::middleware(['prevent-back-history'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Change Password - Index
    Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/password_change', [ChangeProfileController::class, 'index_password'])->name('settings');

    // Change Password - Store
    Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/password_update', [ChangeProfileController::class, 'update_password'])->name('change.password');

    // Profile - Index
    Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/profile_change', [ChangeProfileController::class, 'index_profile'])->name('profile');

    // PROFILE - STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/profile_update', [ChangeProfileController::class, 'update_profile'])->name('change.profile');
});
