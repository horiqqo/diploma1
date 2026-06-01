@extends('index')
@section('title', 'Регистрация')
@section('content')

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Регистрация</h1>
                <p class="text-base-content/60 mt-2">Начните обучение уже сейчас - создайте личный аккаунт.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                @csrf

                <x-auth-input label="ФИО" name="name" placeholder="Введите ФИО" :value="old('name')"/>
                <x-auth-input label="Почта" name="email" type="email" placeholder="Введите почту" :value="old('email')"/>
                <x-auth-input label="Пароль" name="password" type="password" placeholder="Введите пароль"/>
                <x-auth-input label="Подтвердите пароль" name="password_confirmation" type="password" placeholder="Повторите пароль"/>
                <x-auth-input label="Дата рождения" name="birthday" type="date" :value="old('birthday')"/>

                <div class="flex gap-3">
                    <div class="flex-1">
                        <label class="label">Номер класса</label>
                        <select name="class_number" class="select select-bordered w-full @error('class_number') select-error @enderror">
                            <option value="">Выберите класс</option>
                            @foreach(range(1, 11) as $n)
                                <option value="{{ $n }}" {{ old('class_number') == $n ? 'selected' : '' }}>{{ $n }}</option>
                            @endforeach
                        </select>
                        @error('class_number')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label class="label">Буква класса</label>
                        <select name="class_letter" class="select select-bordered w-full @error('class_letter') select-error @enderror">
                            <option value="">Выберите букву</option>
                            @foreach(['А','Б','В','Г','Д'] as $l)
                                <option value="{{ $l }}" {{ old('class_letter') == $l ? 'selected' : '' }}>{{ $l }}</option>
                            @endforeach
                        </select>
                        @error('class_letter')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <x-auth-checkbox name="agree">
                    Я согласен на <a href="{{ route('privacy') }}" class="text-primary hover:underline">обработку персональных данных</a>
                </x-auth-checkbox>
                @error('agree')
                <p class="text-error text-sm -mt-3">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-primary w-full text-lg font-normal mt-2 transition-all duration-300">
                    Зарегистрироваться
                </button>
            </form>

            <p class="text-center mt-6 text-base-content/70">
                Уже есть аккаунт?
                <a href="{{ route('login') }}" class="text-primary hover:underline">Авторизуйтесь</a>
            </p>
        </div>
    </div>

@endsection
