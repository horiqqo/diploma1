@extends('index')
@section('title', 'Редактирование урока')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-6">

        <form method="GET" action="{{ route('admin-lessons-edit', $lesson->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">

            <h1 class="text-2xl font-bold">Редактирование урока</h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Предмет</label>
                <select name="subject_id" class="select select-bordered w-full">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $selectedSubject->id == $subject->id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-outline w-full">Сменить предмет</button>
        </form>

        <form method="POST" action="{{ route('admin-lessons-update', $lesson->id) }}"
              enctype="multipart/form-data"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-2">
                <label class="font-medium">Тема</label>
                <select name="theme_id" class="select select-bordered w-full">
                    @foreach($themes as $theme)
                        <option value="{{ $theme->id }}"
                            {{ $theme->id == $lesson->theme_id ? 'selected' : '' }}>
                            {{ $theme->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Название</label>
                <input type="text" name="title"
                       value="{{ old('title', $lesson->title) }}"
                       class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Содержание</label>
                <textarea name="content" rows="8"
                          class="textarea textarea-bordered w-full">{{ old('content', $lesson->content) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Изображение</label>
                @if($lesson->image)
                    <img src="{{ asset('storage/' . $lesson->image) }}"
                         class="w-32 h-20 object-cover rounded-lg">
                @endif
                <input type="file" name="image" accept="image/*"
                       class="file-input file-input-bordered w-full">
                <span class="text-sm text-base-content/50">Оставьте пустым, чтобы не менять</span>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Видео (URL)</label>
                <input type="text" name="video"
                       value="{{ old('video', $lesson->video) }}"
                       class="input input-bordered w-full">
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-lessons') }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>

@endsection
