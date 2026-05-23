<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomePage(){
        return view('pages.home');
    }

    public function showThemesPage(){
        return view('pages.themes');
    }

    public function showSubjectsPage(){
        return view('pages.subjects');
    }

    public function showProfilePage(){
        return view('pages.profile');
    }

    public function showRegisterPage(){
        return view('auth.register');
    }

    public function showLoginPage(){
        return view('auth.login');
    }
}
