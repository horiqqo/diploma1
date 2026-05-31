<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAdminUsersListPage(Request $request)
    {
        $query = User::with('role');

        if ($request->filled('role_id')) {
            $query->where('role_id', $request->role_id);
        }

        if ($request->filled('class_number')) {
            $query->where('class_number', $request->class_number);
        }

        if ($request->filled('sort')) {
            $query->orderBy('name', $request->sort);
        }

        $users = $query->paginate(15)->withQueryString();
        $roles = Role::all();

        return view('pages.admin.users-list', compact('users', 'roles'));
    }


    public function updateRole(Request $request, User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Нельзя изменить свою роль');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->update([
            'role_id' => $request->role_id
        ]);

        return back()->with('success', 'Роль пользователя обновлена');
    }



    public function edit(User $user)
    {
        $roles = Role::all();

        return view('pages.admin.form.user-edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
            'class_number' => 'nullable|integer|min:1|max:11',
            'class_letter' => 'nullable|string|max:2',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'class_number' => $request->class_number,
            'class_letter' => $request->class_letter,
        ]);

        return redirect()
            ->route('admin-users')
            ->with('success', 'Пользователь обновлён');
    }
}



