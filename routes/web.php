<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController;

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class,'checkout'])->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // ROUTE YANG DIPROTEKSI
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

        Route::resource('events', EventAdminController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('partners', PartnerController::class);

    });

});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');