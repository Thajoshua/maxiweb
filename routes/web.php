<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// user dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->name('user.dashboard')
    ->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/deposite', function () {
        return view('user.deposite');
    });
    Route::post('/withdraw', [RegisteredUserController::class, 'withdraw'])->name('withdraw');
    Route::get('/withdraw', function () {
        return view('user.withdraw');
    });
    Route::get('/deposite', function () {
        return view('user.deposite');
    });
    Route::get('/transactionhistory', function () {
        return view('user.transactionhistory');
    });
});

// Admin
Route::get('/admin/login', [AdminUserController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminUserController::class, 'login']);
// Admin dashboard route (only accessible by admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/user', [AdminUserController::class, 'users_view'])->name('admin.users');
    Route::get('/generatePin', [AdminUserController::class, 'generatePin'])->name('admin.generate.pin');
    Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::put('/admin/users/{user}/update', [AdminUserController::class, 'update'])->name('admin.users.update');

    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__ . '/auth.php';
