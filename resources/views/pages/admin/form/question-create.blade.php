@extends('index')

@section('title', 'Создание вопроса')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <form method="POST"
              action="{{ route('questions.store', $test->id) }}"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf

            <h1 class="text-2xl font-bold">
                Новый вопрос
            </h1>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Вопрос
                </label>

                <textarea name="question"
                          class="textarea textarea-bordered w-full"></textarea>

            </div>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Изображение
                </label>

                <input type="text"
                       name="image"
                       class="input input-bordered w-full">

            </div>

            <button class="btn btn-primary w-full">
                Создать вопрос
            </button>

        </form>

    </div>

@endsection
