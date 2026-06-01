@extends('index')
@section('title', 'Создание предмета')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('admin-subjects-create') }}

        <form method="POST" action="{{ route('subjects.store') }}" class="card bg-base-100 border border-base-200 p-8 flex flex-col gap-5">

            @csrf

            <h1 class="text-2xl font-bold">Создание предмета</h1>

            <x-form-field label="Название" :error="$errors->first('title')">
                <input type="text" name="title" value="{{ old('title') }}" class="input input-bordered w-full">
            </x-form-field>

            <x-form-field label="Описание" :error="$errors->first('description')">
                <textarea name="description" class="textarea textarea-bordered w-full">{{ old('description') }}</textarea>
            </x-form-field>

            <x-form-field label="Учитель" :error="$errors->first('teacher_id')">
                <select name="teacher_id" class="select select-bordered w-full">
                    <option disabled {{ old('teacher_id') ? '' : 'selected' }}>Выберите учителя</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </x-form-field>
            <button class="btn btn-primary w-full">Создать предмет</button>
        </form>
    </div>
@endsection
