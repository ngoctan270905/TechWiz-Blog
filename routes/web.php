<?php

use App\Events\UserLoggedIn;
use App\Notifications\WelcomeUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Google\GoogleController;
use Illuminate\Notifications\DatabaseNotification;

use App\Http\Controllers\Admin\AdminDashboardController;

// ----------------------------------------------------------------------------------


# Route Người Dùng Không Cần Xác Thực (Guest)
Route::get('/', [HomeController::class, 'index'])->name('home');

# Route Nhóm Yêu Cầu Cần Xác Thực (Authentication)
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

 Route::post('/notifications/read', [NotificationController::class, 'markAllAsRead'])
        ->name('notifications.markRead');

# Google OAuth Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// ----------------------------------------------------------------------------------



# ROUTE NHÓM ADMIN (Cần xác thực và kiểm tra role)
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'checkrole:admin'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');
    });


// ----------------------------------------------------------------------------------



## ROUTE FALLBACK
Route::fallback(function () {
    abort(404);
});

// ----------------------------------------------------------------------------------


require __DIR__ . '/auth.php';
