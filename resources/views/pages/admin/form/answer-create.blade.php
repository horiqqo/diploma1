@extends('index')
@section('title', 'Создание ответа')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('admin-answers-create', $question) }}

        <form method="POST" action="{{ route('answers.store', $question->id) }}" class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            <h1 class="text-2xl font-bold">Новый ответ</h1>

            <x-form-field label="Ответ" :error="$errors->first('answer')">
                <input type="text" name="answer" value="{{ old('answer') }}" class="input input-bordered w-full">
            </x-form-field>

            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-4">
                    <input type="checkbox" name="is_correct" class="checkbox checkbox-primary">
                    <span class="label-text">Правильный ответ</span>
                </label>
            </div>

            <button class="btn btn-primary w-full">Создать ответ</button>

        </form>
    </div>

@endsection
