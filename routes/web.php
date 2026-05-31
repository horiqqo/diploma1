<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [PageController::class, 'showRegisterPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [PageController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    // Только для студентов
    Route::middleware('role:student')->group(function () {
        Route::get('/subjects', [SubjectController::class, 'showStudentSubjectsPage'])->name('subjects');
        Route::get('/subjects/{subject}/themes', [ThemeController::class, 'showStudentThemesPage'])->name('themes');
        Route::get('/lesson/{theme}', [LessonController::class, 'showLessonPage'])->name('lesson');
        Route::get('/profile', [ProfileController::class, 'showProfilePage'])->name('profile');
        Route::get('/', [PageController::class, 'showHomePage'])->name('home');



        Route::get('/tests/{test}', [TestController::class, 'show'])->name('test');


        Route::post('/tests/{test}/submit', [TestController::class, 'submit'])->name('test.submit');

        Route::get('/test/{test}/results', [TestController::class, 'results'])->name('test-results');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    });

    // Только для админа и учителя
    Route::middleware('role:admin,teacher')->group(function () {

        Route::get('/dashboard', [PageController::class, 'showDashboardPage'])->name('dashboard');
        Route::get('/admin/subjects', [SubjectController::class, 'showSubjectsListPage'])->name('admin-subjects');
        Route::get('/admin/themes', [ThemeController::class, 'showThemesListPage'])->name('admin-themes');
        Route::get('/admin/lessons', [LessonController::class, 'showLessonsListPage'])->name('admin-lessons');
        Route::get('/admin/tests', [TestController::class, 'showTestsListPage'])->name('admin-tests');
        Route::get('/admin/tests/{test}/questions', [QuestionController::class, 'showQuestionsListPage'])->name('admin-questions');
        Route::get('/admin/questions/{question}/answers', [AnswerController::class, 'showAnswersListPage'])->name('admin-answers');

        Route::get('/admin/subjects/create', [SubjectController::class, 'create'])->name('admin-subjects-create');
        Route::post('/admin/subjects/create', [SubjectController::class, 'store'])->name('subjects.store');

        Route::get('/admin/themes/create', [ThemeController::class, 'create'])->name('admin-themes-create');
        Route::post('/admin/themes/create', [ThemeController::class, 'store'])->name('themes.store');
        Route::get('/admin/lessons/create', [LessonController::class, 'create'])->name('admin-lessons-create');
        Route::post('/admin/lessons/create', [LessonController::class, 'store'])->name('lessons.store');

        Route::get('/admin/tests/create', [TestController::class, 'create'])->name('admin-tests-create');
        Route::post('/admin/tests/create', [TestController::class, 'store'])->name('tests.store');

        Route::get('/admin/tests/{test}/questions/create', [QuestionController::class, 'create'])->name('admin-questions-create');
        Route::post('/admin/tests/{test}/questions/create', [QuestionController::class, 'store'])->name('questions.store');

        Route::get('/admin/questions/{question}/answers/create', [AnswerController::class, 'create'])->name('admin-answers-create');
        Route::post('/admin/questions/{question}/answers/create', [AnswerController::class, 'store'])->name('answers.store');


        Route::get('/admin/themes/{theme}/edit', [ThemeController::class, 'edit'])->name('admin-themes-edit');
        Route::put('/admin/themes/{theme}', [ThemeController::class, 'update'])->name('admin-themes-update');
        Route::delete('/admin/themes/{theme}', [ThemeController::class, 'destroy'])->name('admin-themes-delete');

        Route::get('/admin/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('admin-lessons-edit');
        Route::put('/admin/lessons/{lesson}', [LessonController::class, 'update'])->name('admin-lessons-update');
        Route::delete('/admin/lessons/{lesson}', [LessonController::class, 'destroy'])->name('admin-lessons-delete');

        Route::get('/admin/tests/{test}/edit', [TestController::class, 'edit'])->name('admin-tests-edit');
        Route::put('/admin/tests/{test}', [TestController::class, 'update'])->name('admin-tests-update');
        Route::delete('/admin/tests/{test}', [TestController::class, 'destroy'])->name('admin-tests-delete');

        Route::get('/admin/questions/{question}/edit', [QuestionController::class, 'edit'])->name('admin-questions-edit');
        Route::put('/admin/questions/{question}', [QuestionController::class, 'update'])->name('admin-questions-update');
        Route::delete('/admin/questions/{question}', [QuestionController::class, 'destroy'])->name('admin-questions-delete');

        Route::get('/admin/answers/{answer}/edit', [AnswerController::class, 'edit'])->name('admin-answers-edit');
        Route::put('/admin/answers/{answer}', [AnswerController::class, 'update'])->name('admin-answers-update');
        Route::delete('/admin/answers/{answer}', [AnswerController::class, 'destroy'])->name('admin-answers-delete');

        Route::get('/admin/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('admin-subjects-edit');
        Route::put('/admin/subjects/{subject}', [SubjectController::class, 'update'])->name('admin-subjects-update');
        Route::delete('/admin/subjects/{subject}', [SubjectController::class, 'destroy'])->name('admin-subjects-delete');

    });

    // Только для админа
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/users', [UserController::class, 'showAdminUsersListPage'])->name('admin-users');

        Route::patch('/admin/users/{user}/role', [UserController::class, 'updateRole'])->name('admin-users-role-update');
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin-users-edit');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin-users-update');

        Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('admin-profile-edit');
        Route::put('/admin/profile/update', [ProfileController::class, 'update'])->name('admin-profile-update');

    });
});
