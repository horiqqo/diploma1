@extends('index')

@section('title', 'Создание темы')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <nav class="flex items-center gap-2 text-sm text-base-content/50">
         {{ Breadcrumbs::render('admin-themes-create') }}
        </nav>

        <form method="POST"
              action="{{ route('themes.store') }}"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf

            <h1 class="text-2xl font-bold">
                Создание темы
            </h1>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Предмет
                </label>

                <select name="subject_id"
                        class="select select-bordered w-full">

                    <option disabled selected>
                        Выберите предмет
                    </option>

                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->title }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Название
                </label>

                <input type="text"
                       name="title"
                       class="input input-bordered w-full">

            </div>

            <div class="flex flex-col gap-2">

                <label class="font-medium">
                    Описание
                </label>

                <textarea name="description"
                          class="textarea textarea-bordered w-full"></textarea>

            </div>

            <div class="grid grid-cols-2 gap-4">

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Номер класса</label>
                    <select name="class_number" class="select select-bordered w-full">
                        @for($i = 1; $i <= 11; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="font-medium">Буква класса</label>
                    <select name="class_letter" class="select select-bordered w-full">
                        @foreach(['А', 'Б', 'В', 'Г'] as $letter)
                            <option value="{{ $letter }}">{{ $letter }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <button class="btn btn-primary w-full">
                Создать тему
            </button>

        </form>

    </div>

@endsection
