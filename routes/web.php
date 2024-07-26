<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Display the registration form (GET request)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.form');

// Handle registration form submission (POST request)
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Display the login form (GET request)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.form');

// Handle login form submission (POST request)
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Driver routes
Route::prefix('driver')->middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/dashboard', function () {
        return view('driver.dashboard');
    })->name('driver.dashboard');
});

// Additional role-based routes can be added similarly

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
