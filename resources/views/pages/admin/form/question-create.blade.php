@extends('index')
@section('title', 'Создание вопроса')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('admin-questions-create', $test) }}

        <form method="POST" action="{{ route('questions.store', $test->id) }}" enctype="multipart/form-data"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            <h1 class="text-2xl font-bold">Новый вопрос</h1>

            <x-form-field label="Вопрос" :error="$errors->first('question')">
                <textarea name="question" class="textarea textarea-bordered w-full">{{ old('question') }}</textarea>
            </x-form-field>

            <x-form-field label="Изображение" :error="$errors->first('image')">
                <input type="file" name="image" accept="image/jpg,image/jpeg,image/png,image/webp"
                       class="file-input file-input-bordered w-full">
                <span class="text-sm text-base-content/50">JPG, PNG, WEBP — до 2 МБ</span>
            </x-form-field>

            <x-form-field label="Тип вопроса" :error="$errors->first('type')">
                <select name="type" id="type-select" class="select select-bordered w-full">
                    <option value="choice" {{ old('type') == 'choice' ? 'selected' : '' }}>Выбор из вариантов</option>
                    <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Ввод вручную</option>
                </select>
            </x-form-field>

            <div id="text-answer-field" class="{{ old('type', 'choice') == 'text' ? '' : 'hidden' }}">
                <x-form-field label="Правильный ответ" :error="$errors->first('correct_answer')">
                    <input type="text" name="correct_answer" value="{{ old('correct_answer') }}"
                           class="input input-bordered w-full">
                </x-form-field>
            </div>

            <button class="btn btn-primary w-full">Создать вопрос</button>
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
