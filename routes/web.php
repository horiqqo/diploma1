<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [PageController::class, 'showHomePage'])->name('home');
    Route::get('/subjects', [PageController::class, 'showSubjectsPage'])->name('subjects');
    Route::get('/themes', [PageController::class, 'showThemesPage'])->name('themes');
    Route::get('/profile', [PageController::class, 'showProfilePage'])->name('profile');
    Route::get('/lesson', [PageController::class, 'showLessonPage'])->name('lesson');
    Route::get('/test', [PageController::class, 'showTestsPage'])->name('test');
    Route::get('/test-results', [PageController::class, 'showTestResultsPage'])->name('test-results');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'showDashboardPage'])->name('dashboard');
    Route::get('/admin-subjects', [PageController::class, 'showAdminSubjectsPage'])->name('admin-subjects');
    Route::get('/admin-users', [PageController::class, 'showAdminUsersListPage'])->name('admin-users');
});
