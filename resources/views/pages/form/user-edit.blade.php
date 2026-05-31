@extends('index')
@section('title', 'Редактировать профиль')
@section('content')

    <div class="max-w-xl mx-auto px-6 py-10">
        <div class="card border border-base-200 p-6 flex flex-col gap-4">

            <h2 class="text-xl font-semibold">Редактировать профиль</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PATCH')

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Имя</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                           class="input input-bordered w-full @error('name') input-error @enderror">
                    @error('name') <span class="text-error text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="input input-bordered w-full @error('email') input-error @enderror">
                    @error('email') <span class="text-error text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="border-t border-base-200 pt-4 flex flex-col gap-4">
                    <p class="text-sm text-base-content/50">Оставьте пустым, если не хотите менять пароль</p>

                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium">Новый пароль</label>
                        <input type="password" name="password"
                               class="input input-bordered w-full @error('password') input-error @enderror">
                        @error('password') <span class="text-error text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-medium">Повторите пароль</label>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full">
                    </div>
                </div>

                <div class="flex gap-3 justify-end">
                    <a href="{{ route('profile') }}" class="btn font-normal">Отмена</a>
                    <button type="submit" class="btn btn-primary font-normal">Сохранить</button>
                </div>

            </form>
        </div>
    </div>

@endsection
