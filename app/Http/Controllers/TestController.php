<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\Theme;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function show(Test $test)
    {
        $existingResult = TestResult::where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->first();

        if ($existingResult) {
            return redirect()->route('test-results', $test->id)->with('info', 'Вы уже проходили этот тест');
        }

        $test->load('questions.answers');

        return view('pages.test', compact('test'));
    }

    public function submit(Request $request, Test $test)
    {
        $total = $test->questions->count();
        $correct = 0;

        foreach ($test->questions as $question) {
            $correctAnswer = $question->answers()
                ->where('is_correct', true)
                ->first();

            if ($question->type === 'choice') {
                $userAnswer = $request->answers[$question->id] ?? null;
                if ($correctAnswer && $correctAnswer->id == $userAnswer) {
                    $correct++;
                }
            } else {
                $userAnswer = trim($request->text_answers[$question->id] ?? '');
                if ($correctAnswer && mb_strtolower($userAnswer) === mb_strtolower($correctAnswer->answer)) {
                    $correct++;
                }
            }
        }

        $score = $total > 0 ? round(($correct / $total) * 100) : 0;

        TestResult::create([
            'user_id' => auth()->id(),
            'test_id' => $test->id,
            'score'   => $score,
        ]);

        return redirect()->route('test-results', $test->id)->with('success', 'Тест успешно пройден');
    }

    public function results(Test $test)
    {
        $result = TestResult::with('test')
            ->where('user_id', auth()->id())
            ->where('test_id', $test->id)
            ->first();

        return view('pages.test-results', compact('result'));
    }

    public function showTestsListPage(Request $request)
    {
        $query = Test::with('theme.subject')->whereHas('theme.subject');

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

        $tests = $query->paginate(15)->withQueryString();
        $subjects = Subject::all();
        $themes = $request->filled('subject_id')
            ? Theme::where('subject_id', $request->subject_id)->get()
            : collect();

        return view('pages.admin.tests-list', compact('tests', 'subjects', 'themes'));
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

        return view('pages.admin.form.test-create', compact(
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
        ], [
            'theme_id.required' => 'Выберите тему',
            'theme_id.exists'   => 'Выбранная тема не найдена',
            'title.required'    => 'Название теста обязательно',
            'title.min'         => 'Название должно содержать минимум 2 символа',
            'title.max'         => 'Название не должно превышать 255 символов',
        ]);

        Test::create([
            'theme_id' => $request->theme_id,
            'title' => $request->title,
        ]);

        return redirect()->route('admin-tests')
            ->with('success', 'Тест успешно создан');
    }


    public function edit(Test $test)
    {
        $this->authorizeTest($test);
        $subjects = Subject::all();
        $selectedSubject = $test->theme->subject;
        $themes = $selectedSubject->themes;
        return view('pages.admin.form.test-edit', compact('test', 'subjects', 'themes', 'selectedSubject'));
    }

    public function update(Request $request, Test $test)
    {
        $this->authorizeTest($test);
        $request->validate([
            'theme_id' => 'required|integer|exists:themes,id',
            'title'    => 'required|string|min:2|max:255',
        ], [
            'theme_id.required' => 'Выберите тему',
            'theme_id.exists'   => 'Выбранная тема не найдена',
            'title.required'    => 'Название теста обязательно',
            'title.min'         => 'Название должно содержать минимум 2 символа',
            'title.max'         => 'Название не должно превышать 255 символов',
        ]);

        $test->update($request->only(['theme_id', 'title']));

        return redirect()->route('admin-tests')->with('success', 'Тест обновлён');
    }

    public function destroy(Test $test)
    {
        $this->authorizeTest($test);
        $test->delete();
        return redirect()->route('admin-tests')->with('success', 'Тест удалён');
    }

    private function authorizeTest(Test $test): void
    {
        $user = auth()->user();
        if ($user->isTeacher()) {
            $subjectIds = $user->subjects()->pluck('id');
            if (!$subjectIds->contains($test->theme->subject_id)) {
                abort(403);
            }
        }
    }
}
