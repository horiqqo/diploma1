<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function showSubjectsListPage(Request $request)
    {
        $user = auth()->user();
        $query = Subject::with('teacher');

        if ($user->isTeacher()) {
            $query->where('teacher_id', $user->id);
        } elseif ($request->filled('teacher_id')) {
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

        if (auth()->check()) {
            $user = auth()->user();
            $query->whereHas('themes', function ($q) use ($user) {
                $q->where('class_number', $user->class_number)
                    ->where('class_letter', $user->class_letter);
            });
        }


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
        $user = auth()->user();
        $teachers = $user->isTeacher()
            ? collect([$user])
            : User::whereHas('role', fn($q) => $q->where('title', 'teacher'))->get();

        return view('pages.admin.form.subject-create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id'  => 'required|integer|exists:users,id',
            'title'       => 'required|string|min:2|max:255',
            'description' => 'nullable|string|max:2000',
        ], [
            'teacher_id.required' => 'Выберите учителя',
            'teacher_id.exists'   => 'Выбранный учитель не найден',
            'title.required'      => 'Название предмета обязательно',
            'title.min'           => 'Название должно содержать минимум 2 символа',
            'title.max'           => 'Название не должно превышать 255 символов',
            'description.max'     => 'Описание не должно превышать 2000 символов',
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
        $this->authorizeSubject($subject);

        $user = auth()->user();
        $teachers = $user->isTeacher()
            ? collect([$user])
            : User::whereHas('role', fn($q) => $q->where('title', 'teacher'))->get();

        return view('pages.admin.form.subject-edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->authorizeSubject($subject);

        $request->validate([
            'teacher_id'  => 'required|integer|exists:users,id',
            'title'       => 'required|string|min:2|max:255',
            'description' => 'nullable|string|max:2000',
        ], [
            'teacher_id.required' => 'Выберите учителя',
            'teacher_id.exists'   => 'Выбранный учитель не найден',
            'title.required'      => 'Название предмета обязательно',
            'title.min'           => 'Название должно содержать минимум 2 символа',
            'title.max'           => 'Название не должно превышать 255 символов',
            'description.max'     => 'Описание не должно превышать 2000 символов',
        ]);

        $subject->update($request->only(['teacher_id', 'title', 'description']));

        return redirect()->route('admin-subjects')->with('success', 'Предмет обновлён');
    }

    public function destroy(Subject $subject)
    {
        $this->authorizeSubject($subject);
        $subject->delete();
        return redirect()->route('admin-subjects')->with('success', 'Предмет удалён');
    }



    private function authorizeSubject(Subject $subject): void
    {
        $user = auth()->user();
        if ($user->isTeacher() && $subject->teacher_id !== $user->id) {
            abort(403);
        }
    }
}
