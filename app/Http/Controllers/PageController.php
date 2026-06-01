<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomePage()
    {
        $subjects = collect();

        if (auth()->check()) {
            $user = auth()->user();

            $subjects = Subject::whereHas('themes', function ($q) use ($user) {
                $q->where('class_number', $user->class_number)
                    ->where('class_letter', $user->class_letter);
            })->take(4)->get();
        }

        return view('pages.home', compact('subjects'));
    }

    public function showRegisterPage(){
        return view('auth.register');
    }

    public function showLoginPage(){
        return view('auth.login');
    }

    public function showDashboardPage()
    {
        $user = auth()->user();

        if ($user->isTeacher()) {
            $subjectIds = $user->subjects()->pluck('id');
            $themeIds = Theme::whereIn('subject_id', $subjectIds)->pluck('id');

            $stats = [
                'subjects'  => $subjectIds->count(),
                'tests'     => Test::whereHas('theme', fn($q) => $q->whereIn('subject_id', $subjectIds))->count(),
                'themes'    => $themeIds->count(),
                'lessons'   => Lesson::whereIn('theme_id', $themeIds)->count(),
                'questions' => Question::whereHas('test.theme', fn($q) => $q->whereIn('subject_id', $subjectIds))->count(),
            ];
        } else {
            $stats = [
                'subjects'  => Subject::count(),
                'tests'     => Test::count(),
                'users'     => User::count(),
                'themes'    => Theme::count(),
                'lessons'   => Lesson::count(),
                'questions' => Question::count(),
            ];
        }

        return view('pages.admin.dashboard', compact('stats'));
    }
}
