<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Введите email',
            'email.email'    => 'Введите корректный email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Ссылка для сброса пароля отправлена на вашу почту')
            : back()->withErrors(['email' => 'Пользователь с таким email не найден']);
    }
}
