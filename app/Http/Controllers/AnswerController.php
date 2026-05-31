<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function showAnswersListPage(Request $request, Question $question)
    {
        $query = Answer::where('question_id', $question->id);

        if ($request->filled('is_correct')) {
            $query->where('is_correct', $request->is_correct === 'true');
        }

        $answers = $query->paginate(15)->withQueryString();

        return view('pages.admin.answers-list', compact('answers', 'question'));
    }

    public function create(Question $question)
    {
        return view(
            'pages.admin.form.answer-create',
            compact('question')
        );
    }

    public function store(Request $request, Question $question)
    {
        $request->validate([
            'answer' => 'required|string',
            'is_correct' => 'nullable',
        ]);

        Answer::create([
            'question_id' => $question->id,
            'answer' => $request->answer,
            'is_correct' => $request->has('is_correct'),
        ]);

        return redirect()
            ->route('admin-answers', $question->id)
            ->with('success', 'Ответ создан');
    }

    public function edit(Answer $answer)
    {
        return view('pages.admin.form.answer-edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer'     => 'required|string|max:255',
            'is_correct' => 'boolean',
        ]);

        $answer->update([
            'answer'     => $request->answer,
            'is_correct' => $request->boolean('is_correct'),
        ]);

        return redirect()
            ->route('admin-answers', $answer->question_id)
            ->with('success', 'Ответ обновлён');
    }

    public function destroy(Answer $answer)
    {
        $questionId = $answer->question_id;
        $answer->delete();
        return redirect()
            ->route('admin-answers', $questionId)
            ->with('success', 'Ответ удалён');
    }

}
