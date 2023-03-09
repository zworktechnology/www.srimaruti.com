<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ChangeProfileController;
use App\Http\Controllers\RoomController;
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

    // BRANCH CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/branch', [BranchController::class, 'index'])->name('branch.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/branch/create', [BranchController::class, 'create'])->name('branch.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/branch/store', [BranchController::class, 'store'])->name('branch.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/branch/edit/{id}', [BranchController::class, 'edit'])->name('branch.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/branch/update/{id}', [BranchController::class, 'update'])->name('branch.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/branch/delete/{id}', [BranchController::class, 'delete'])->name('branch.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/branch/destroy/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');
    });

    // ROOM CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/room', [RoomController::class, 'index'])->name('room.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/room/create', [RoomController::class, 'create'])->name('room.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/room/store', [RoomController::class, 'store'])->name('room.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/room/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/room/destroy/{id}', [RoomController::class, 'destroy'])->name('room.destroy');
    });

    // BOOKING CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking', [BookingController::class, 'index'])->name('booking.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/create', [BookingController::class, 'create'])->name('booking.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/booking/store', [BookingController::class, 'store'])->name('booking.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/update/{id}', [BookingController::class, 'update'])->name('booking.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/booking/destroy/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    });
});
