@extends('index')
@section('title', 'Редактирование теста')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-6">

        {{ Breadcrumbs::render('admin-tests-edit', $test) }}

        <form method="GET" action="{{ route('admin-tests-edit', $test->id) }}" class="card border border-base-200 p-8 flex flex-col gap-5">
            <h1 class="text-2xl font-bold">Редактирование теста</h1>
            <x-form-field label="Предмет">
                <select name="subject_id" class="select select-bordered w-full">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $selectedSubject->id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
            </x-form-field>
            <button class="btn btn-outline w-full">Сменить предмет</button>
        </form>
        <form method="POST" action="{{ route('admin-tests-update', $test->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')
            <x-form-field label="Тема">
                <select name="theme_id" class="select select-bordered w-full">
                    @foreach($themes as $theme)
                        <option value="{{ $theme->id }}"
                            {{ $theme->id == $test->theme_id ? 'selected' : '' }}>
                            {{ $theme->title }}
                        </option>
                    @endforeach
                </select>
            </x-form-field>
            <x-form-field label="Название теста" :error="$errors->first('title')">
                <input type="text" name="title" value="{{ old('title', $test->title) }}" class="input input-bordered w-full">
            </x-form-field>
            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-tests') }}" class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>
@endsection
