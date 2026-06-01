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
            'role_id' => 'required|integer|exists:roles,id',
        ], [
            'role_id.required' => 'Выберите роль',
            'role_id.exists'   => 'Выбранная роль не найдена',
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
            'name'         => 'required|string|min:2|max:255',
            'email'        => 'required|email|max:255|unique:users,email,' . $user->id,
            'role_id'      => 'required|integer|exists:roles,id',
            'class_number' => 'nullable|integer|min:1|max:11',
            'class_letter' => 'nullable|string|size:1|alpha',
        ], [
            'name.required'        => 'Имя обязательно для заполнения',
            'name.min'             => 'Имя должно содержать минимум 2 символа',
            'name.max'             => 'Имя не должно превышать 255 символов',
            'email.required'       => 'Email обязателен для заполнения',
            'email.email'          => 'Введите корректный email',
            'email.unique'         => 'Пользователь с таким email уже существует',
            'role_id.required'     => 'Выберите роль',
            'role_id.exists'       => 'Выбранная роль не найдена',
            'class_number.integer' => 'Номер класса должен быть числом',
            'class_number.min'     => 'Номер класса не может быть меньше 1',
            'class_number.max'     => 'Номер класса не может быть больше 11',
            'class_letter.size'    => 'Буква класса должна быть одним символом',
            'class_letter.alpha'   => 'Буква класса должна быть буквой',
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




    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Нельзя удалить самого себя');
        }

        $user->delete();

        return redirect()->route('admin-users')->with('success', 'Пользователь удалён');
    }
}



