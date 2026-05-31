<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function showLessonsListPage(Request $request)
    {
        $query = Lesson::with('theme.subject');

        if ($request->filled('subject_id')) {
            $query->whereHas('theme', fn($q) => $q->where('subject_id', $request->subject_id));
        }

        if ($request->filled('theme_id')) {
            $query->where('theme_id', $request->theme_id);
        }

        if ($request->filled('sort')) {
            $query->orderBy('title', $request->sort);
        }

        $lessons = $query->paginate(15)->withQueryString();
        $subjects = Subject::all();
        $themes = $request->filled('subject_id')
            ? Theme::where('subject_id', $request->subject_id)->get()
            : collect();

        return view('pages.admin.lesson-list', compact('lessons', 'subjects', 'themes'));
    }


    public function showLessonPage(Theme $theme)
    {
        $lesson = Lesson::where('theme_id', $theme->id)->first();

        return view('pages.lesson', compact('lesson'));
    }

    public function create(Request $request)
    {
        $subjects = Subject::all();

        $themes = collect();
        $selectedSubject = null;

        if ($request->filled('subject_id')) {
            $selectedSubject = Subject::find($request->subject_id);
            $themes = $selectedSubject->themes;
        }

        return view('pages.admin.form.lesson-create', compact(
            'subjects',
            'themes',
            'selectedSubject'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'video' => 'nullable|string',
        ]);

        Lesson::create([
            'theme_id' => $request->theme_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'video' => $request->video,
        ]);

        return redirect()->route('admin-lessons')
            ->with('success', 'Урок успешно создан');
    }

    public function edit(Lesson $lesson)
    {
        $subjects = Subject::all();
        $selectedSubject = $lesson->theme->subject;
        $themes = $selectedSubject->themes;
        return view('pages.admin.form.lesson-edit', compact('lesson', 'subjects', 'themes', 'selectedSubject'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'image'    => 'nullable|image|max:2048',
            'video'    => 'nullable|string',
        ]);

        $imagePath = $lesson->image;

        if ($request->hasFile('image')) {
            if ($lesson->image) {
                Storage::disk('public')->delete($lesson->image);
            }
            $imagePath = $request->file('image')->store('lessons', 'public');
        }

        $lesson->update([
            'theme_id' => $request->theme_id,
            'title'    => $request->title,
            'content'  => $request->content,
            'image'    => $imagePath,
            'video'    => $request->video,
        ]);

        return redirect()->route('admin-lessons')->with('success', 'Урок обновлён');
    }

    public function destroy(Lesson $lesson)
    {
        if ($lesson->image) {
            Storage::disk('public')->delete($lesson->image);
        }
        $lesson->delete();
        return redirect()->route('admin-lessons')->with('success', 'Урок удалён');
    }
}

