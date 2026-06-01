@extends('index')
@section('title', 'Авторизация')
@section('content')

    <div class="min-h-[60vh] flex items-center justify-center px-4">
        <div class="w-full max-w-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Авторизация</h1>
                <p class="text-base-content/60 mt-2">Авторизуйтесь для доступа к вашим предметам и результатам.</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                @csrf
                <x-auth-input label="Почта" name="email" type="email" placeholder="Введите почту"/>
                <x-auth-input label="Пароль" name="password" type="password" placeholder="Введите пароль"/>
                <div class="flex items-center justify-between">
                    <x-auth-checkbox name="remember">Запомнить меня</x-auth-checkbox>
                    <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Забыли пароль?</a>                </div>
                <button type="submit" class="btn btn-primary w-full text-lg font-normal mt-2 transition-all duration-300">
                    Авторизоваться
                </button>
            </form>
            <p class="text-center mt-6 text-base-content/70"> Ещё нет аккаунта?
                <a href="{{ route('register') }}" class="text-primary hover:underline">Создайте</a>
            </p>
        </div>
    </div>

@endsection
