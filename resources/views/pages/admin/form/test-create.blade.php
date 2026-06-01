@extends('index')
@section('title', 'Создание теста')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-6">

        {{ Breadcrumbs::render('admin-tests-create') }}

        <form method="GET" action="{{ route('admin-tests-create') }}" class="card border border-base-200 p-8 flex flex-col gap-5">
            <h1 class="text-2xl font-bold">Создание теста</h1>
            <x-form-field label="Предмет">
                <select name="subject_id" class="select select-bordered w-full">
                    <option disabled {{ !$selectedSubject ? 'selected' : '' }}>Выберите предмет</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $selectedSubject?->id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
            </x-form-field>
            <button class="btn btn-outline w-full">Выбрать предмет</button>
        </form>
        @if($selectedSubject)
            <form method="POST" action="{{ route('tests.store') }}" class="card border border-base-200 p-8 flex flex-col gap-5">
                @csrf
                <input type="hidden" name="subject_id" value="{{ $selectedSubject->id }}">
                <x-form-field label="Тема">
                    <select name="theme_id" class="select select-bordered w-full">
                        <option disabled selected>Выберите тему</option>
                        @foreach($themes as $theme)
                            <option value="{{ $theme->id }}">{{ $theme->title }}</option>
                        @endforeach
                    </select>
                </x-form-field>
                <x-form-field label="Название теста" :error="$errors->first('title')">
                    <input type="text" name="title" class="input input-bordered w-full">
                </x-form-field>
                <button class="btn btn-primary w-full">Создать тест</button>
            </form>
        @endif
    </div>
@endsection
