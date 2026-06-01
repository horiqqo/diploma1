@extends('index')
@section('title', 'Новый пароль')
@section('content')

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Новый пароль</h1>
                <p class="text-base-content/60 mt-2">Придумайте новый пароль для вашего аккаунта.</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <x-auth-input label="Почта" name="email" type="email" placeholder="Введите почту" :value="old('email', $email ?? '')"/>
                <x-auth-input label="Новый пароль" name="password" type="password" placeholder="Введите новый пароль"/>
                <x-auth-input label="Подтвердите пароль" name="password_confirmation" type="password" placeholder="Повторите пароль"/>
                <button type="submit" class="btn btn-primary w-full text-lg font-normal mt-2">
                    Сохранить пароль
                </button>
            </form>
        </div>
    </div>

@endsection
