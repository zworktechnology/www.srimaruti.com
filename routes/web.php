<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ChangeProfileController;
use App\Http\Controllers\CloseAccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NamelistController;
use App\Http\Controllers\OpenAccountController;
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
Route::get('/room/samyapuram', function () {return view('pages.frontend.room-samyapuram');})->name('room.samyapuram');
Route::get('/room/gunaseelam', function () {return view('pages.frontend.room-gunaseelam');})->name('room.gunaseelam');
Route::get('/room/srirangam', function () {return view('pages.frontend.room-srirangam');})->name('room.srirangam');
Route::get('/mass-trust', function () {return view('pages.frontend.masstrust');})->name('masstrust');
Route::get('/kosaalai', function () {return view('pages.frontend.kosaalai');})->name('kosaalai');
Route::get('/contact', function () {return view('pages.frontend.contact');})->name('contact');
Route::get('/feedback', function () {return view('pages.frontend.feedback');})->name('feedback');
Route::get('/privacy-and-policy', function () {return view('pages.frontend.privacy_and_policy');})->name('privacy.policy');

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
        // VIEW
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/branch/view/{id}', [BranchController::class, 'view'])->name('branch.view');
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
        // INDEX ALL
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking', [BookingController::class, 'index'])->name('booking.index');
        // INDEX TODAY
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/today', [BookingController::class, 'today'])->name('booking.today');
        // INDEX UPCOMING
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/upcoming', [BookingController::class, 'upcoming'])->name('booking.upcoming');
        // INDEX MISSING OUT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/missingout', [BookingController::class, 'missingout'])->name('booking.missingout');
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
        // PAY BALACE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/pay_balance/{id}', [BookingController::class, 'pay_balance'])->name('booking.pay_balance');
        // CHECK OUT
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/checkout/{id}', [BookingController::class, 'checkout'])->name('booking.checkout');
        // PRICING
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/pricing/{id}', [BookingController::class, 'pricing'])->name('booking.pricing');
        // VIEW
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/view/{id}', [BookingController::class, 'view'])->name('booking.view');
        // DATE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/datefilter', [BookingController::class, 'datefilter'])->name('booking.datefilter');
        // AUTO COMPLETE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/booking/autocomplete', [BookingController::class, 'autocomplete'])->name('booking.autocomplete');
        // EXTEND
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/booking/extend/{id}', [BookingController::class, 'extend'])->name('booking.extend');
        // DAILY CHECKOUT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/booking/dailycheckout', [BookingController::class, 'dailycheckout'])->name('booking.dailycheckout');
    });

    // NAME LIST CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/namelist', [NamelistController::class, 'index'])->name('namelist.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/namelist/create', [NamelistController::class, 'create'])->name('namelist.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/namelist/store', [NamelistController::class, 'store'])->name('namelist.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/namelist/edit/{id}', [NamelistController::class, 'edit'])->name('namelist.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/namelist/update/{id}', [NamelistController::class, 'update'])->name('namelist.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/namelist/delete/{id}', [NamelistController::class, 'delete'])->name('namelist.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/namelist/destroy/{id}', [NamelistController::class, 'destroy'])->name('namelist.destroy');
    });

    // INCOME CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/income', [IncomeController::class, 'index'])->name('income.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/income/create', [IncomeController::class, 'create'])->name('income.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/income/store', [IncomeController::class, 'store'])->name('income.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/income/update/{id}', [IncomeController::class, 'update'])->name('income.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/income/delete/{id}', [IncomeController::class, 'delete'])->name('income.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/income/destroy/{id}', [IncomeController::class, 'destroy'])->name('income.destroy');
        // DATE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/income/datefilter', [IncomeController::class, 'datefilter'])->name('income.datefilter');
    });

    // EXPENSE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expense', [ExpenseController::class, 'index'])->name('expense.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/expense/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/expense/destroy/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
        // DATE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/expense/datefilter', [ExpenseController::class, 'datefilter'])->name('expense.datefilter');
    });

    // OPEN ACCOUNT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/openaccount', [OpenAccountController::class, 'index'])->name('openaccount.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/openaccount/create', [OpenAccountController::class, 'create'])->name('openaccount.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/openaccount/store', [OpenAccountController::class, 'store'])->name('openaccount.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/openaccount/edit/{id}', [OpenAccountController::class, 'edit'])->name('openaccount.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/openaccount/update/{id}', [OpenAccountController::class, 'update'])->name('openaccount.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/openaccount/delete/{id}', [OpenAccountController::class, 'delete'])->name('openaccount.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/openaccount/destroy/{id}', [OpenAccountController::class, 'destroy'])->name('openaccount.destroy');
    });

    // CLOSE ACCOUNT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/closeaccount', [CloseAccountController::class, 'index'])->name('closeaccount.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/closeaccount/create', [CloseAccountController::class, 'create'])->name('closeaccount.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zwork-admin/closeaccount/store', [CloseAccountController::class, 'store'])->name('closeaccount.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/closeaccount/edit/{id}', [CloseAccountController::class, 'edit'])->name('closeaccount.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/closeaccount/update/{id}', [CloseAccountController::class, 'update'])->name('closeaccount.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/closeaccount/delete/{id}', [CloseAccountController::class, 'delete'])->name('closeaccount.delete');
        // DESTROY
        Route::middleware(['auth:sanctum', 'verified'])->delete('/zwork-admin/closeaccount/destroy/{id}', [CloseAccountController::class, 'destroy'])->name('closeaccount.destroy');
    });

    // CONTACT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/contact', [ContactController::class, 'index'])->name('contact.index');
        // ACTIVE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zwork-admin/contact/reach_out/{id}', [ContactController::class, 'reachout'])->name('contact.reach_out');
    });

    // FEEDBACK CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zwork-admin/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    });
});

Route::get('getBranchwiseRoom/{id}', [RoomController::class, 'getBranchwiseRoom']);
Route::get('getPriceforRooms/{id}', [RoomController::class, 'getPriceforRooms']);
Route::get('/getoldCustomers/{phone_no}', [BookingController::class, 'getoldCustomers']);

Route::put('/dashboard_datefilter', [App\Http\Controllers\HomeController::class, 'dashboard_datefilter'])->name('homepage.data.filter');

// CONTACT CONTROLLER // STORE
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
// FEEDBACK CONTROLLER // STORE
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
// BOOKING // BILL VIEW TO MESSAGE
Route::get('/booking/{id}/invoice/detail', [BookingController::class, 'bookingbillview'])->name('booking.bookingbillview');
