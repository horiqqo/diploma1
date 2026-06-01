<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function showThemesListPage(Request $request)
    {
        $user = auth()->user();
        $query = Theme::with('subject')->whereHas('subject');

        if ($user->isTeacher()) {
            $subjectIds = $user->subjects()->pluck('id');
            $query->whereIn('subject_id', $subjectIds);
        } elseif ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('class_number')) {
            $query->where('class_number', $request->class_number);
        }
        if ($request->filled('sort')) {
            $query->orderBy('title', $request->sort);
        }

        $themes = $query->paginate(15)->withQueryString();
        $subjects = $user->isTeacher() ? $user->subjects : Subject::all();

        return view('pages.admin.themes-list', compact('themes', 'subjects'));
    }

    public function showStudentThemesPage(Subject $subject)
    {
        $themes = $subject->themes()
            ->where('class_number', auth()->user()->class_number)
            ->where('class_letter', auth()->user()->class_letter)
            ->with(['lessons', 'tests', 'tests.testResults' => function ($query) {
                $query->where('user_id', auth()->id());
                }
            ])->get();

        return view('pages.themes', compact(
            'subject',
            'themes'
        ));
    }

    public function create()
    {
        $user = auth()->user();
        $subjects = $user->isTeacher() ? $user->subjects : Subject::all();

        return view('pages.admin.form.theme-create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id'   => 'required|integer|exists:subjects,id',
            'title'        => 'required|string|min:2|max:255',
            'description'  => 'nullable|string|max:2000',
            'class_number' => 'required|integer|min:1|max:11',
            'class_letter' => 'required|string|size:1|alpha',
        ], [
            'subject_id.required'   => 'Выберите предмет',
            'subject_id.exists'     => 'Выбранный предмет не найден',
            'title.required'        => 'Название темы обязательно',
            'title.min'             => 'Название должно содержать минимум 2 символа',
            'title.max'             => 'Название не должно превышать 255 символов',
            'description.max'       => 'Описание не должно превышать 2000 символов',
            'class_number.required' => 'Номер класса обязателен',
            'class_number.integer'  => 'Номер класса должен быть числом',
            'class_number.min'      => 'Номер класса не может быть меньше 1',
            'class_number.max'      => 'Номер класса не может быть больше 11',
            'class_letter.required' => 'Буква класса обязательна',
            'class_letter.size'     => 'Буква класса должна быть одним символом',
            'class_letter.alpha'    => 'Буква класса должна быть буквой',
        ]);

        Theme::create([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'description' => $request->description,
            'class_number' => $request->class_number,
            'class_letter' => $request->class_letter,
        ]);

        return redirect()->route('admin-themes')
            ->with('success', 'Тема успешно создана');
    }



    public function edit(Theme $theme)
    {
        $this->authorizeTheme($theme);

        $user = auth()->user();
        $subjects = $user->isTeacher() ? $user->subjects : Subject::all();

        return view('pages.admin.form.theme-edit', compact('theme', 'subjects'));
    }

    public function update(Request $request, Theme $theme)
    {

        $this->authorizeTheme($theme);
        $request->validate([
            'subject_id'   => 'required|integer|exists:subjects,id',
            'title'        => 'required|string|min:2|max:255',
            'description'  => 'nullable|string|max:2000',
            'class_number' => 'required|integer|min:1|max:11',
            'class_letter' => 'required|string|size:1|alpha',
        ], [
            'subject_id.required'   => 'Выберите предмет',
            'subject_id.exists'     => 'Выбранный предмет не найден',
            'title.required'        => 'Название темы обязательно',
            'title.min'             => 'Название должно содержать минимум 2 символа',
            'title.max'             => 'Название не должно превышать 255 символов',
            'description.max'       => 'Описание не должно превышать 2000 символов',
            'class_number.required' => 'Номер класса обязателен',
            'class_number.integer'  => 'Номер класса должен быть числом',
            'class_number.min'      => 'Номер класса не может быть меньше 1',
            'class_number.max'      => 'Номер класса не может быть больше 11',
            'class_letter.required' => 'Буква класса обязательна',
            'class_letter.size'     => 'Буква класса должна быть одним символом',
            'class_letter.alpha'    => 'Буква класса должна быть буквой',
        ]);

        $theme->update($request->only([
            'subject_id', 'title', 'description', 'class_number', 'class_letter'
        ]));

        return redirect()->route('admin-themes')->with('success', 'Тема обновлена');
    }

    public function destroy(Theme $theme)
    {
        $this->authorizeTheme($theme);
        $theme->delete();
        return redirect()->route('admin-themes')->with('success', 'Тема удалена');
    }


    private function authorizeTheme(Theme $theme): void
    {
        $user = auth()->user();
        if ($user->isTeacher() && !$user->subjects()->where('id', $theme->subject_id)->exists()) {
            abort(403);
        }
    }
}
