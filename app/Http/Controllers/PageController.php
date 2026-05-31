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
    public function showHomePage(){
        return view('pages.home');
    }

   public function showTestResultsPage(){
        return view('pages.test-results');
   }

    public function showRegisterPage(){
        return view('auth.register');
    }

    public function showLoginPage(){
        return view('auth.login');
    }

    public function showDashboardPage(){

        $stats = [
            'subjects' => Subject::count(),
            'tests' => Test::count(),
            'users' => User::count(),
            'themes' => Theme::count(),
            'lessons' => Lesson::count(),
            'questions' => Question::count(),
        ];

        return view('pages.admin.dashboard', compact('stats'));
    }
}
