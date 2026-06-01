@extends('index')
@section('title', 'Восстановление пароля')
@section('content')

    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-lg">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">Восстановление пароля</h1>
                <p class="text-base-content/60 mt-2">Введите почту - мы отправим ссылку для сброса пароля.</p>
            </div>

            @if(session('status'))
                <div class="alert alert-success mb-6">
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
                @csrf
                <x-auth-input label="Почта" name="email" type="email" placeholder="Введите почту" :value="old('email')"/>
                <button type="submit" class="btn btn-primary w-full text-lg font-normal mt-2">
                    Отправить ссылку
                </button>
            </form>

            <p class="text-center mt-6 text-base-content/70">
                <a href="{{ route('login') }}" class="text-primary hover:underline">Вернуться ко входу</a>
            </p>
        </div>
    </div>

@endsection
