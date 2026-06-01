@extends('index')
@section('title', 'Редактирование профиля')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        <form method="POST"
              action="{{ route('admin-profile-update') }}"
              class="card border border-base-200 p-8 flex flex-col gap-5">

            @csrf
            @method('PUT')

            <h1 class="text-2xl font-bold">Редактирование профиля</h1>

            @if(session('success'))
                <div class="alert alert-success text-sm">{{ session('success') }}</div>
            @endif

            <x-form-field label="ФИО" :error="$errors->first('name')">
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full">
            </x-form-field>

            <x-form-field label="Email" :error="$errors->first('email')">
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full">
            </x-form-field>

            <div class="border-t border-base-200 pt-4 flex flex-col gap-4">
                <span class="font-medium text-base-content/60 text-sm">Оставьте пустым, если не хотите менять пароль</span>
                <x-form-field label="Новый пароль" :error="$errors->first('password')">
                    <input type="password" name="password" class="input input-bordered w-full">
                </x-form-field>
                <x-form-field label="Подтверждение пароля">
                    <input type="password" name="password_confirmation" class="input input-bordered w-full">
                </x-form-field>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button class="btn btn-primary px-8 font-normal">Сохранить</button>
                <a href="{{ route('dashboard') }}" class="btn bg-base-100 border border-base-300 font-normal">Отмена</a>
            </div>

        </form>
    </div>
@endsection
