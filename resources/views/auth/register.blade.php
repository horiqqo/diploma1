@extends('index')
@section('title', 'Регистрация')
@section('content')

    <div class="min-h-[60vh] flex items-center justify-center px-4">
        <div class="w-full max-w-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Регистрация</h1>
                <p class="text-base-content/60 mt-2">Начните обучение уже сейчас - создайте личный аккаунт.</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                @csrf
                <x-auth-input label="ФИО" name="name" placeholder="Введите ФИО"/>
                <x-auth-input label="Почта" name="email" type="email" placeholder="Введите почту"/>
                <x-auth-input label="Пароль" name="password" type="password" placeholder="Введите пароль"/>
                <x-auth-checkbox name="agree"> Я согласен на
                    <a href="#" class="text-primary hover:underline">обработку персональных данных</a>
                </x-auth-checkbox>
                <button type="submit" class="btn btn-primary w-full text-lg font-normal mt-2 transition-all duration-300">
                    Зарегистрироваться
                </button>
            </form>
            <p class="text-center mt-6 text-base-content/70"> Уже есть аккаунт?
                <a href="{{ route('login') }}" class="text-primary hover:underline">Авторизуйтесь</a>
            </p>
        </div>
    </div>

@endsection
