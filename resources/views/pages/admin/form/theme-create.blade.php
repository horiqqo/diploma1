@extends('index')
@section('title', 'Создание темы')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('admin-themes-create') }}

        <form method="POST" action="{{ route('themes.store') }}" class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            <h1 class="text-2xl font-bold">Создание темы</h1>
            <x-form-field label="Предмет" :error="$errors->first('subject_id')">
                <select name="subject_id" class="select select-bordered w-full">
                    <option disabled selected>Выберите предмет</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                    @endforeach
                </select>
            </x-form-field>
            <x-form-field label="Название" :error="$errors->first('title')">
                <input type="text" name="title" value="{{ old('title') }}" class="input input-bordered w-full">
            </x-form-field>
            <x-form-field label="Описание" :error="$errors->first('description')">
                <textarea name="description" class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
            </x-form-field>
            <div class="grid grid-cols-2 gap-4">
                <x-form-field label="Номер класса" :error="$errors->first('class_number')">
                    <select name="class_number" class="select select-bordered w-full">
                        @for($i = 1; $i <= 11; $i++)
                            <option value="{{ $i }}" {{ old('class_number') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </x-form-field>
                <x-form-field label="Буква класса" :error="$errors->first('class_letter')">
                    <select name="class_letter" class="select select-bordered w-full">
                        @foreach(['А', 'Б', 'В', 'Г'] as $letter)
                            <option value="{{ $letter }}" {{ old('class_letter') == $letter ? 'selected' : '' }}>{{ $letter }}</option>
                        @endforeach
                    </select>
                </x-form-field>
            </div>
            <button class="btn btn-primary w-full">Создать тему</button>
        </form>
    </div>
@endsection
