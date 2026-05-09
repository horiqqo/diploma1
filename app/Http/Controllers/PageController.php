<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomePage(){
        return view('pages.home');
    }

    public function showLessonsPage(){
        return view('pages.lessons');
    }

    public function showSubjectsPage(){
        return view('pages.subjects');
    }

    public function showTestsPage(){
        return view('pages.tests');
    }

    public function showProfilePage(){
        return view('pages.profile');
    }
}
