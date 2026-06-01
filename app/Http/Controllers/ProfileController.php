<?php

namespace App\Http\Controllers;

use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfilePage()
    {
        $user = Auth::user();

        $results = TestResult::with(['test.theme.subject'])
            ->where('user_id', $user->id)
            ->whereHas('test.theme.subject')
            ->paginate(10);

        $allScores = TestResult::where('user_id', $user->id)
            ->whereHas('test.theme.subject')
            ->pluck('score');

        $averageScore = 0;

        if ($allScores->isNotEmpty()) {
            $grades = $allScores->map(function ($score) {
                if ($score >= 90) return 5;
                if ($score >= 75) return 4;
                if ($score >= 50) return 3;
                return 2;
            });

            $averageScore = round($grades->average(), 2);
        }

        return view('pages.profile', compact(
            'user',
            'results',
            'averageScore'
        ));
    }



    public function edit()
    {
        $user = auth()->user();

        return view('pages.form.user-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'                  => 'required|string|min:2|max:255',
            'email'                 => 'required|email|max:255|unique:users,email,' . $user->id,
            'password'              => 'nullable|string|min:6|max:255|confirmed',
            'password_confirmation' => 'nullable|string',
        ], [
            'name.required'      => 'Имя обязательно для заполнения',
            'name.min'           => 'Имя должно содержать минимум 2 символа',
            'name.max'           => 'Имя не должно превышать 255 символов',
            'email.required'     => 'Email обязателен для заполнения',
            'email.email'        => 'Введите корректный email',
            'email.unique'       => 'Пользователь с таким email уже существует',
            'password.min'       => 'Пароль должен содержать минимум 6 символов',
            'password.max'       => 'Пароль не должен превышать 255 символов',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('profile')
            ->with('success', 'Профиль обновлён');
    }
}
