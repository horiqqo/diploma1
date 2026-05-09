<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

    Route::get('/', [PageController::class, 'showHomePage'])->name('home');
    Route::get('/lessons', [PageController::class, 'showLessonsPage'])->name('lessons');
    Route::get('/subjects', [PageController::class, 'showSubjectsPage'])->name('subjects');
    Route::get('/tests', [PageController::class, 'showTestsPage'])->name('tests');
    Route::get('/profile', [PageController::class, 'showProfilePage'])->name('profile');

