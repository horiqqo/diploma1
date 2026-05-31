@extends('index')
@section('title', 'Редактирование ответа')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">
        <form method="POST" action="{{ route('admin-answers-update', $answer->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">Редактирование ответа</h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Ответ</label>
                <input type="text" name="answer"
                       value="{{ old('answer', $answer->answer) }}"
                       class="input input-bordered w-full">
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_correct" value="1"
                       class="checkbox checkbox-primary"
                    {{ $answer->is_correct ? 'checked' : '' }}>
                <label class="font-medium">Правильный ответ</label>
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-answers', $answer->question_id) }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>

@endsection
