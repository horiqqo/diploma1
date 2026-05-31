@extends('index')
@section('title', 'Редактирование вопроса')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">
        <form method="POST" action="{{ route('admin-questions-update', $question->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">Редактирование вопроса</h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Вопрос</label>
                <input type="text" name="question"
                       value="{{ old('question', $question->question) }}"
                       class="input input-bordered w-full">
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-questions', $question->test_id) }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>

@endsection
