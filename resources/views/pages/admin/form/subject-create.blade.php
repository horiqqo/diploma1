@extends('index')

@section('title', 'Создание предмета')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <nav class="flex items-center gap-2 text-sm text-base-content/50">
            {{ Breadcrumbs::render('admin-subjects-create') }}
        </nav>

        <form method="POST" action="{{ route('subjects.store') }}"
              class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf

            <h1 class="text-2xl font-bold">
                Создание предмета
            </h1>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Название</label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="input input-bordered w-full">

                @error('title')
                <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Описание</label>

                <textarea name="description"
                          class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label class="font-medium">Учитель</label>

                <select name="teacher_id" class="select select-bordered w-full">
                    <option disabled selected>Выберите учителя</option>

                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>

                @error('teacher_id')
                <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary w-full">
                Создать предмет
            </button>

        </form>

    </div>

@endsection
