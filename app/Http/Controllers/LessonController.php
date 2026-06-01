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

        $user = auth()->user();
        if ($user->isTeacher()) {
            $subjectIds = $user->subjects()->pluck('id');
            $query->whereHas('theme', fn($q) => $q->whereIn('subject_id', $subjectIds));
        }

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
        $user = auth()->user();
        $subjects = $user->isTeacher() ? $user->subjects : Subject::all();

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
            'theme_id' => 'required|integer|exists:themes,id',
            'title'    => 'required|string|min:2|max:255',
            'content'  => 'required|string|min:10',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'    => 'nullable|url|max:500',
        ], [
            'theme_id.required' => 'Выберите тему',
            'theme_id.exists'   => 'Выбранная тема не найдена',
            'title.required'    => 'Название урока обязательно',
            'title.min'         => 'Название должно содержать минимум 2 символа',
            'title.max'         => 'Название не должно превышать 255 символов',
            'content.required'  => 'Содержимое урока обязательно',
            'content.min'       => 'Содержимое должно содержать минимум 10 символов',
            'image.image'       => 'Файл должен быть изображением',
            'image.mimes'       => 'Допустимые форматы: JPG, PNG, WEBP',
            'image.max'         => 'Размер изображения не должен превышать 2 МБ',
            'video.url'         => 'Введите корректную ссылку на видео',
            'video.max'         => 'Ссылка не должна превышать 500 символов',
        ]);

        Lesson::create([
            'theme_id' => $request->theme_id,
            'title'    => $request->title,
            'content'  => $request->content,
            'image'    => $request->hasFile('image')
                ? $request->file('image')->store('lessons', 'public')
                : null,
            'video'    => $request->video,
        ]);

        return redirect()->route('admin-lessons')
            ->with('success', 'Урок успешно создан');
    }

    public function edit(Lesson $lesson)
    {
        $this->authorizeLesson($lesson);
        $user = auth()->user();
        $subjects = $user->isTeacher() ? $user->subjects : Subject::all();
        $selectedSubject = $lesson->theme->subject;
        $themes = $selectedSubject->themes;
        return view('pages.admin.form.lesson-edit', compact('lesson', 'subjects', 'themes', 'selectedSubject'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $this->authorizeLesson($lesson);
        $request->validate([
            'theme_id' => 'required|integer|exists:themes,id',
            'title'    => 'required|string|min:2|max:255',
            'content'  => 'required|string|min:10',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'    => 'nullable|url|max:500',
        ], [
            'theme_id.required' => 'Выберите тему',
            'theme_id.exists'   => 'Выбранная тема не найдена',
            'title.required'    => 'Название урока обязательно',
            'title.min'         => 'Название должно содержать минимум 2 символа',
            'title.max'         => 'Название не должно превышать 255 символов',
            'content.required'  => 'Содержимое урока обязательно',
            'content.min'       => 'Содержимое должно содержать минимум 10 символов',
            'image.image'       => 'Файл должен быть изображением',
            'image.mimes'       => 'Допустимые форматы: JPG, PNG, WEBP',
            'image.max'         => 'Размер изображения не должен превышать 2 МБ',
            'video.url'         => 'Введите корректную ссылку на видео',
            'video.max'         => 'Ссылка не должна превышать 500 символов',
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
        $this->authorizeLesson($lesson);
        if ($lesson->image) {
            Storage::disk('public')->delete($lesson->image);
        }
        $lesson->delete();
        return redirect()->route('admin-lessons')->with('success', 'Урок удалён');
    }


    private function authorizeLesson(Lesson $lesson): void
    {
        $user = auth()->user();
        if ($user->isTeacher()) {
            $subjectIds = $user->subjects()->pluck('id');
            if (!$subjectIds->contains($lesson->theme->subject_id)) {
                abort(403);
            }
        }
    }
}

