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

            <div class="flex flex-col gap-2">
                <label class="font-medium">Предмет</label>

                <select name="subject_id" class="select select-bordered w-full">
                    <option disabled {{ !$selectedSubject ? 'selected' : '' }}>
                        Выберите предмет
                    </option>

                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $selectedSubject?->id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-outline w-full">
                Выбрать предмет
            </button>

        </form>

        @if($selectedSubject)

            <form method="POST" action="{{ route('lessons.store') }}"
                  enctype="multipart/form-data" class="card border border-base-200 p-8 flex flex-col gap-5">>


                @csrf

                <input type="hidden" name="subject_id" value="{{ $selectedSubject->id }}">

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Тема</label>

                    <select name="theme_id" class="select select-bordered w-full">
                        <option disabled selected>Выберите тему</option>

                        @foreach($themes as $theme)
                            <option value="{{ $theme->id }}">
                                {{ $theme->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Название урока</label>
                    <input type="text" name="title"
                           class="input input-bordered w-full">
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Содержание</label>
                    <textarea name="content" rows="8"
                              class="textarea textarea-bordered w-full"></textarea>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Изображение</label>
                    <input type="file"
                           name="image"
                           accept="image/*"
                           class="file-input file-input-bordered w-full">
                    <span class="text-sm text-base-content/50">
                          JPG, PNG, WEBP — до 2 МБ
                    </span>
                    @error('image')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Видео (URL)</label>
                    <input type="text" name="video"
                           placeholder="https://rutube.ru/..."
                           class="input input-bordered w-full">
                    <span class="text-sm text-base-content/50">
                        Ссылка на Rutube или VK video
                    </span>
                    @error('video')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary w-full">
                    Создать урок
                </button>

            </form>

        @endif

    </div>

@endsection
