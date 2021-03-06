<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketMessageController;

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

Route::get('/', function () {
    return Inertia::render('App', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['guest']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tickets', [TicketsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('tickets');

Route::post('/tickets', [TicketsController::class, 'store'])
    ->middleware(['auth'])
    ->name('tickets.store');

Route::put('/tickets/{ticket}', [TicketsController::class, 'update'])
    ->middleware(['auth'])
    ->name('tickets.update');

Route::get('/users', [UsersController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('users');

Route::get('/users/edit/{user_id}', [UsersController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('users.edit');

Route::post('/users', [UsersController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('users.store');

Route::get('/chat/{ticketThread}', [ChatController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('chat');

Route::post('/chat', [ChatController::class, 'store'])
    ->middleware(['auth'])
    ->name('chat.store');

Route::get('/messages/{attachment}', [TicketMessageController::class, 'download'])
    ->middleware(['auth'])
    ->name('messages.download');

Route::get('/profile', function () {
    return Inertia::render('Profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/Settings', function () {
    return Inertia::render('Settings');
})->middleware(['auth', 'verified'])->name('settings');

require __DIR__.'/auth.php';
