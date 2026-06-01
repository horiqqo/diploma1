@extends('index')
@section('title', 'Редактирование предмета')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">
        <form method="POST" action="{{ route('admin-subjects-update', $subject->id) }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold">Редактирование предмета</h1>
            <x-form-field label="Название" :error="$errors->first('title')">
                <input type="text" name="title" value="{{ old('title', $subject->title) }}" class="input input-bordered w-full">
            </x-form-field>
            <x-form-field label="Описание" :error="$errors->first('description')">
                <textarea name="description" class="textarea textarea-bordered w-full">{{ old('description', $subject->description) }}</textarea>
            </x-form-field>
            <x-form-field label="Учитель" :error="$errors->first('teacher_id')">
                <select name="teacher_id" class="select select-bordered w-full">
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ $teacher->id == $subject->teacher_id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </x-form-field>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('admin-subjects') }}"
                   class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>
        </form>
    </div>
@endsection
