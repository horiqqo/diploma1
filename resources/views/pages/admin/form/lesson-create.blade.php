@extends('index')
@section('title', 'Создание урока')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-6">

        <nav class="text-sm crumbs">
            {{ Breadcrumbs::render('admin-lessons-create') }}
        </nav>

        <form method="GET"
              action="{{ route('admin-lessons-create') }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">

            <h1 class="text-2xl font-bold">Создание урока</h1>

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

            <form method="POST" action="{{ route('lessons.store') }}"
                  enctype="multipart/form-data"
                  class="card border border-base-200 p-8 flex flex-col gap-5">

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

                <x-form-field label="Название урока" :error="$errors->first('title')">
                    <input type="text" name="title" value="{{ old('title') }}" class="input input-bordered w-full">
                </x-form-field>

                <x-form-field label="Содержание" :error="$errors->first('content')">
                    <textarea name="content" rows="8" class="textarea textarea-bordered w-full">{{ old('content') }}</textarea>
                </x-form-field>

                <x-form-field label="Изображение" :error="$errors->first('image')">
                    <input type="file" name="image" accept="image/*" class="file-input file-input-bordered w-full">
                    <span class="text-sm text-base-content/50">JPG, PNG, WEBP — до 2 МБ</span>
                </x-form-field>

                <x-form-field label="Видео (URL)" :error="$errors->first('video')">
                    <input type="text" name="video" value="{{ old('video') }}" placeholder="https://rutube.ru/..." class="input input-bordered w-full">
                    <span class="text-sm text-base-content/50">Ссылка на Rutube или VK video</span>
                </x-form-field>

                <button class="btn btn-primary w-full">Создать урок</button>
            </form>
        @endif
    </div>
@endsection
