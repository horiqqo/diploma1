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

        $results = TestResult::with(['test.theme.subject'])->where('user_id', $user->id)->paginate(10);

        $averageScore = 0;

        if ($results->count()) {
            $grades = [];

            foreach ($results as $result) {

                if ($result->score >= 90) {
                    $grades[] = 5;
                }
                elseif ($result->score >= 75) {
                    $grades[] = 4;
                }
                elseif ($result->score >= 50) {
                    $grades[] = 3;
                }
                else {
                    $grades[] = 2;
                }
            }

            $averageScore = count($grades)
                ? round(array_sum($grades) / count($grades), 2)
                : 0;
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
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
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
