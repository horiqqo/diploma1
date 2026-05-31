<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showQuestionsListPage(Request $request, Test $test)
    {
        $query = Question::where('test_id', $test->id);

        if ($request->filled('search')) {
            $query->where('question', 'ilike', '%' . $request->search . '%');
        }

        $questions = $query->paginate(15)->withQueryString();

        return view('pages.admin.question-list', compact('questions', 'test'));
    }

    public function create(Test $test)
    {
        return view(
            'pages.admin.form.question-create',
            compact('test')
        );
    }

    public function store(Request $request, Test $test)
    {
        $request->validate([
            'question' => 'required|string',
            'image' => 'nullable|string',
        ]);

        Question::create([
            'test_id' => $test->id,
            'question' => $request->question,
            'image' => $request->image,
        ]);

        return redirect()
            ->route('admin-questions', $test->id)
            ->with('success', 'Вопрос создан');
    }
    public function edit(Question $question)
    {
        return view('pages.admin.form.question-edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        $question->update(['question' => $request->question]);

        return redirect()
            ->route('admin-questions', $question->test_id)
            ->with('success', 'Вопрос обновлён');
    }

    public function destroy(Question $question)
    {
        $testId = $question->test_id;
        $question->delete();
        return redirect()
            ->route('admin-questions', $testId)
            ->with('success', 'Вопрос удалён');
    }

}
