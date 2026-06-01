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
            'answer'     => 'required|string|min:1|max:500',
            'is_correct' => 'nullable|boolean',
        ], [
            'answer.required' => 'Текст ответа обязателен',
            'answer.min'      => 'Ответ должен содержать минимум 1 символ',
            'answer.max'      => 'Ответ не должен превышать 500 символов',
            'is_correct.boolean' => 'Некорректное значение поля "правильный ответ"',
        ]);

        if ($request->boolean('is_correct')) {
            $question->answers()->where('is_correct', true)->update(['is_correct' => false]);
        }

        Answer::create([
            'question_id' => $question->id,
            'answer'      => $request->answer,
            'is_correct'  => $request->boolean('is_correct'),
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
            'answer'     => 'required|string|min:1|max:500',
            'is_correct' => 'nullable|boolean',
        ], [
            'answer.required' => 'Текст ответа обязателен',
            'answer.min'      => 'Ответ должен содержать минимум 1 символ',
            'answer.max'      => 'Ответ не должен превышать 500 символов',
            'is_correct.boolean' => 'Некорректное значение поля "правильный ответ"',
        ]);

        if ($request->boolean('is_correct')) {
            $answer->question->answers()
                ->where('is_correct', true)
                ->where('id', '!=', $answer->id)
                ->update(['is_correct' => false]);
        }

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
