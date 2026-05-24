<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

    Route::get('/', [PageController::class, 'showHomePage'])->name('home');
    Route::get('/subjects', [PageController::class, 'showSubjectsPage'])->name('subjects');
    Route::get('/themes', [PageController::class, 'showThemesPage'])->name('themes');
    Route::get('/profile', [PageController::class, 'showProfilePage'])->name('profile');
    Route::get('/lesson', [PageController::class, 'showLessonPage'])->name('lesson');
    Route::get('/test', [PageController::class, 'showTestsPage'])->name('test');


    Route::get('/register', [PageController::class, 'showRegisterPage'])->name('register');
    Route::get('/login', [PageController::class, 'showLoginPage'])->name('login');
