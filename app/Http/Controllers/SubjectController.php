<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function showSubjectsListPage(Request $request)
    {
        $query = Subject::with('teacher');

        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->filled('search')) {
            $query->where('title', 'ilike', '%' . $request->search . '%');
        }

        if ($request->filled('sort')) {
            $query->orderBy('title', $request->sort);
        }

        $subjects = $query->paginate(15)->withQueryString();
        $teachers = User::whereHas('role', fn($q) => $q->where('title', 'teacher'))->get();

        return view('pages.admin.admin-subjects', compact('subjects', 'teachers'));
    }

    public function showStudentSubjectsPage(Request $request)
    {
        $query = Subject::with('teacher');

        if ($request->filled('search')) {
            $query->where('title', 'ilike', '%' . $request->search . '%');
        }

        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->filled('sort')) {
            $query->orderBy('title', $request->sort);
        }

        $subjects = $query->paginate(15)->withQueryString();
        $teachers = User::whereHas('role', fn($q) => $q->where('title', 'teacher'))->get();

        return view('pages.subjects', compact('subjects', 'teachers'));
    }




    public function create()
    {
        $teachers = User::whereHas('role', function ($q) {
            $q->where('title', 'teacher');
        })->get();

        return view('pages.admin.form.subject-create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Subject::create([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin-subjects')
            ->with('success', 'Предмет успешно создан');
    }


    public function edit(Subject $subject)
    {
        $teachers = User::whereHas('role', function ($q) {
            $q->where('title', 'teacher');
        })->get();

        return view('pages.admin.form.subject-edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'teacher_id'  => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update($request->only(['teacher_id', 'title', 'description']));

        return redirect()->route('admin-subjects')->with('success', 'Предмет обновлён');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin-subjects')->with('success', 'Предмет удалён');
    }
}
