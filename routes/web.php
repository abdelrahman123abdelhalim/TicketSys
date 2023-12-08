<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;

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

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/index', [TicketController::class, 'index'])->name('admin.tickets.index');
        Route::get('/filter', [TicketController::class,'filter'])->name('tickets.filter');
        Route::get('/add', [TicketController::class,'add'])->name('add.NewTicket');
        Route::post('/store', [TicketController::class,'store'])->name('store.NewTicket');
        Route::get('/view/{id}', [TicketController::class,'view'])->name('ticket.view');
        Route::get('/edit/{id}', [TicketController::class,'edit'])->name('ticket.edit');
        Route::post('/update/{id}', [TicketController::class,'update'])->name('ticket.update');
    });
    
    Route::post('logout', [RegisterController::class, 'logout'])->name('admin.logout');

});


Route::middleware('guest')->group(function () {
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register_form');
        Route::post('register', [RegisterController::class, 'register'])->name('register');

        Route::get('login', [RegisterController::class, 'showLoginForm'])->name('login_form');
        Route::post('login', [RegisterController::class, 'login'])->name('login');
});