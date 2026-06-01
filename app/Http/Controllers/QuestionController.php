<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'question'       => 'required|string|min:5|max:1000',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'type'           => 'required|in:choice,text',
            'correct_answer' => 'required_if:type,text|nullable|string|min:1|max:500',
        ], [
            'question.required'       => 'Текст вопроса обязателен',
            'question.min'            => 'Вопрос должен содержать минимум 5 символов',
            'question.max'            => 'Вопрос не должен превышать 1000 символов',
            'image.image'             => 'Файл должен быть изображением',
            'image.mimes'             => 'Допустимые форматы: JPG, PNG, WEBP',
            'image.max'               => 'Размер изображения не должен превышать 2 МБ',
            'correct_answer.required_if' => 'Укажите правильный ответ',
        ]);

        $question = Question::create([
            'test_id'  => $test->id,
            'question' => $request->question,
            'image'    => $request->hasFile('image')
                ? $request->file('image')->store('questions', 'public')
                : null,
            'type'     => $request->type,
        ]);

        if ($request->type === 'text') {
            $question->answers()->create([
                'answer'     => $request->correct_answer,
                'is_correct' => true,
            ]);
        }

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
            'question' => 'required|string|min:5|max:1000',
            'type'     => 'required|in:choice,text',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'correct_answer' => 'required_if:type,text|nullable|string|min:1|max:500',
        ], [
            'question.required'          => 'Текст вопроса обязателен',
            'question.min'               => 'Вопрос должен содержать минимум 5 символов',
            'question.max'               => 'Вопрос не должен превышать 1000 символов',
            'image.image'                => 'Файл должен быть изображением',
            'image.mimes'                => 'Допустимые форматы: JPG, PNG, WEBP',
            'image.max'                  => 'Размер изображения не должен превышать 2 МБ',
            'correct_answer.required_if' => 'Укажите правильный ответ',
        ]);

        $imagePath = $question->image;

        if ($request->hasFile('image')) {
            if ($question->image) {
                Storage::disk('public')->delete($question->image);
            }
            $imagePath = $request->file('image')->store('questions', 'public');
        }

        $question->update([
            'question' => $request->question,
            'type'     => $request->type,
            'image'    => $imagePath,
        ]);

        if ($request->type === 'text') {
            $correctAnswer = $question->answers()->where('is_correct', true)->first();
            if ($correctAnswer) {
                $correctAnswer->update(['answer' => $request->correct_answer]);
            } else {
                $question->answers()->create([
                    'answer'     => $request->correct_answer,
                    'is_correct' => true,
                ]);
            }
        }

        return redirect()
            ->route('admin-questions', $question->test_id)
            ->with('success', 'Вопрос обновлён');
    }

    public function destroy(Question $question)
    {
        $testId = $question->test_id;
        if ($question->image) {
            Storage::disk('public')->delete($question->image);
        }
        $question->delete();
        return redirect()
            ->route('admin-questions', $testId)
            ->with('success', 'Вопрос удалён');
    }

}
