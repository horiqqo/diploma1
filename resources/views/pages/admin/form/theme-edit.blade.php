@extends('index')
@section('title', 'Редактирование темы')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">
        <form method="POST" action="{{ route('admin-themes-update', $theme->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">Редактирование темы</h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Предмет</label>
                <select name="subject_id" class="select select-bordered w-full">
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $subject->id == $theme->subject_id ? 'selected' : '' }}>
                            {{ $subject->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Название</label>
                <input type="text" name="title"
                       value="{{ old('title', $theme->title) }}"
                       class="input input-bordered w-full">
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Описание</label>
                <textarea name="description"
                          class="textarea textarea-bordered w-full">{{ old('description', $theme->description) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label class="font-medium">Класс</label>
                    <select name="class_number" class="select select-bordered w-full">
                        @for($i = 1; $i <= 11; $i++)
                            <option value="{{ $i }}"
                                {{ $i == $theme->class_number ? 'selected' : '' }}>
                                {{ $i }} класс
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Буква</label>
                    <select name="class_letter" class="select select-bordered w-full">
                        @foreach(['А', 'Б', 'В', 'Г'] as $letter)
                            <option value="{{ $letter }}"
                                {{ $letter == $theme->class_letter ? 'selected' : '' }}>
                                {{ $letter }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-themes') }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>

@endsection
