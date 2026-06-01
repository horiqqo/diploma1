<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6|max:255',
        ], [
            'email.required'    => 'Email обязателен для заполнения',
            'email.email'       => 'Введите корректный email',
            'email.max'         => 'Email не должен превышать 255 символов',
            'password.required' => 'Пароль обязателен для заполнения',
            'password.min'      => 'Пароль должен содержать минимум 6 символов',
            'password.max'      => 'Пароль не должен превышать 255 символов',
        ]);



        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль',
        ])->withInput();
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|min:2|max:255',
            'email'        => 'required|email|max:255|unique:users,email',
            'password'     => 'required|string|min:6|max:255|confirmed',
            'birthday'     => 'nullable|date|before:today',
            'class_number' => 'nullable|integer|min:1|max:11',
            'class_letter' => 'nullable|string|size:1|alpha',
            'agree'        => 'accepted',
        ], [
            'name.required'      => 'Имя обязательно для заполнения',
            'name.min'           => 'Имя должно содержать минимум 2 символа',
            'name.max'           => 'Имя не должно превышать 255 символов',
            'email.required'     => 'Email обязателен для заполнения',
            'email.email'        => 'Введите корректный email',
            'email.max'          => 'Email не должен превышать 255 символов',
            'email.unique'       => 'Пользователь с таким email уже существует',
            'password.required'  => 'Пароль обязателен для заполнения',
            'password.min'       => 'Пароль должен содержать минимум 6 символов',
            'password.max'       => 'Пароль не должен превышать 255 символов',
            'password.confirmed' => 'Пароли не совпадают',
            'birthday.date'      => 'Введите корректную дату рождения',
            'birthday.before'    => 'Дата рождения должна быть раньше сегодняшнего дня',
            'class_number.integer' => 'Номер класса должен быть числом',
            'class_number.min'   => 'Номер класса не может быть меньше 1',
            'class_number.max'   => 'Номер класса не может быть больше 11',
            'class_letter.size'  => 'Буква класса должна быть одним символом',
            'class_letter.alpha' => 'Буква класса должна быть буквой',
            'agree.accepted'     => 'Необходимо принять условия соглашения',
        ]);

        $studentRole = Role::where('title', 'student')->first();
        $validated['role_id'] = $studentRole?->id;

        $user = User::create($validated);

        Auth::login($user, true);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
