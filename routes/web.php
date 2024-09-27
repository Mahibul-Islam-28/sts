<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;

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

// =========================================================
// ==================== Customer Panel =====================
// =========================================================

Route::get('/login', [LoginController::class, 'login'])->name('customerLogin');
Route::post('/login', [LoginController::class, 'logData']);


Route::middleware(['customerLogin'])->group(function () {

    Route::get('/', [CustomerController::class, 'index'])->name('index');

    // Ticket
    Route::get('/ticket/open', [CustomerController::class, 'open'])->name('openTicket');
    Route::post('/ticket/open', [CustomerController::class, 'store']);

    Route::get('/logout', [LoginController::class, 'logout'])->name('customerLogout');
});



// =====================================================
// =================== Admin Panel =====================
// =====================================================

Route::group(['prefix' => 'adminPanel'], function () {

    Route::get('/login', [AdminLoginController::class, 'login'])->name('adminLogin');
    Route::post('/login', [AdminLoginController::class, 'logData']);

    Route::middleware(['adminLogin'])->group(function () {

        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/{id}/respond', [AdminController::class, 'respond'])->name('addRespond');
        Route::post('/{id}/respond', [AdminController::class, 'update']);

        // Ajax
        Route::get('/closeTicket', [AdminController::class, 'closeTicket'])->name('closeTicket');

        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('adminLogout');
    });
});
