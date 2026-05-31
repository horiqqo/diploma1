@extends('index')

@section('title', 'Создание ответа')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <form method="POST"
              action="{{ route('answers.store', $question->id) }}"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf

            <h1 class="text-2xl font-bold">
                Новый ответ
            </h1>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Ответ
                </label>

                <input type="text"
                       name="answer"
                       class="input input-bordered w-full">

            </div>

            <div class="form-control">

                <label class="label cursor-pointer justify-start gap-4">

                    <input type="checkbox"
                           name="is_correct"
                           class="checkbox checkbox-primary">

                    <span class="label-text">
                    Правильный ответ
                </span>

                </label>

            </div>

            <button class="btn btn-primary w-full">
                Создать ответ
            </button>

        </form>

    </div>

@endsection
