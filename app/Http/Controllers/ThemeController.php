<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function showThemesListPage(Request $request)
    {
        $query = Theme::with('subject');

        if ($request->filled('subject_id')) {
            $query->where('subject_id', $request->subject_id);
        }

        if ($request->filled('class_number')) {
            $query->where('class_number', $request->class_number);
        }

        if ($request->filled('sort')) {
            $query->orderBy('title', $request->sort);
        }

        $themes = $query->paginate(15)->withQueryString();
        $subjects = Subject::all();

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
        $subjects = Subject::all();

        return view('pages.admin.form.theme-create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class_number' => 'required|integer',
            'class_letter' => 'required|string|max:10',
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
        $subjects = Subject::all();
        return view('pages.admin.form.theme-edit', compact('theme', 'subjects'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'subject_id'   => 'required|exists:subjects,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'class_number' => 'required|integer|min:1|max:11',
            'class_letter' => 'required|string|max:2',
        ]);

        $theme->update($request->only([
            'subject_id', 'title', 'description', 'class_number', 'class_letter'
        ]));

        return redirect()->route('admin-themes')->with('success', 'Тема обновлена');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('admin-themes')->with('success', 'Тема удалена');
    }
}
