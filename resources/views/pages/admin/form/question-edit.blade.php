@extends('index')
@section('title', 'Редактирование вопроса')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('admin-questions-edit', $question) }}

        <form method="POST" action="{{ route('admin-questions-update', $question->id) }}"
              enctype="multipart/form-data"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold">Редактирование вопроса</h1>

            <x-form-field label="Вопрос" :error="$errors->first('question')">
                <input type="text" name="question" value="{{ old('question', $question->question) }}"
                       class="input input-bordered w-full">
            </x-form-field>

            <x-form-field label="Тип вопроса" :error="$errors->first('type')">
                <select name="type" id="type-select" class="select select-bordered w-full">
                    <option value="choice" {{ old('type', $question->type) == 'choice' ? 'selected' : '' }}>Выбор из вариантов</option>
                    <option value="text" {{ old('type', $question->type) == 'text' ? 'selected' : '' }}>Ввод вручную</option>
                </select>
            </x-form-field>

            <div id="text-answer-field" class="{{ old('type', $question->type) == 'text' ? '' : 'hidden' }}">
                <x-form-field label="Правильный ответ" :error="$errors->first('correct_answer')">
                    <input type="text" name="correct_answer"
                           value="{{ old('correct_answer', $question->answers->where('is_correct', true)->first()?->answer) }}"
                           class="input input-bordered w-full">
                </x-form-field>
            </div>

            <x-form-field label="Изображение" :error="$errors->first('image')">
                @if($question->image)
                    <img src="{{ asset('storage/' . $question->image) }}"
                         class="w-32 h-20 object-cover rounded-lg mb-2">
                @endif
                <input type="file" name="image" accept="image/jpg,image/jpeg,image/png,image/webp"
                       class="file-input file-input-bordered w-full">
                <span class="text-sm text-base-content/50">Оставьте пустым, чтобы не менять. JPG, PNG, WEBP — до 2 МБ</span>
            </x-form-field>


            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-questions', $question->test_id) }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>

    <script>
        const typeSelect = document.getElementById('type-select');
        const textAnswerField = document.getElementById('text-answer-field');

        typeSelect.addEventListener('change', () => {
            textAnswerField.classList.toggle('hidden', typeSelect.value !== 'text');
        });
    </script>

@endsection
