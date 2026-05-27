@extends('index')
@section('title', 'Результаты теста')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-8">
        <div class="card border border-base-200 p-8 flex flex-col items-center gap-4">
            <h1 class="text-2xl font-bold">Результаты тестирования</h1>

            <div class="flex flex-col items-center gap-2 mt-2">
                <span class="text-6xl font-bold text-primary">4</span>
                <span class="text-base-content/50">из 5</span>
            </div>

            <div class="flex items-center gap-6 mt-2">
                <div class="flex flex-col items-center gap-1">
                    <span class="text-lg font-semibold text-green-500">8</span>
                    <span class="text-sm text-base-content/50">Правильных</span>
                </div>
                <div class="w-px h-8 bg-base-200"></div>
                <div class="flex flex-col items-center gap-1">
                    <span class="text-lg font-semibold text-red-400">2</span>
                    <span class="text-sm text-base-content/50">Неправильных</span>
                </div>
                <div class="w-px h-8 bg-base-200"></div>
                <div class="flex flex-col items-center gap-1">
                    <span class="text-lg font-semibold text-base-content/70">10</span>
                    <span class="text-sm text-base-content/50">Всего вопросов</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <h2 class="text-xl font-semibold">Разбор вопросов</h2>

            <div class="card border border-green-200 bg-green-50/50 p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-base-content/50">Вопрос 1</span>
                    <span class="text-sm font-medium text-green-500">✓ Правильно</span>
                </div>
                <p class="font-medium">Текст вопроса?</p>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-green-100 border border-green-200">
                        <span class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-white text-xs shrink-0">✓</span>
                        <span class="text-sm">Правильный вариант ответа</span>
                    </div>
                </div>
            </div>

            <div class="card border border-red-200 bg-red-50/50 p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-base-content/50">Вопрос 2</span>
                    <span class="text-sm font-medium text-red-400">✗ Неправильно</span>
                </div>
                <p class="font-medium">Текст вопроса?</p>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-red-100 border border-red-200">
                        <span class="w-5 h-5 rounded-full bg-red-400 flex items-center justify-center text-white text-xs shrink-0">✗</span>
                        <span class="text-sm">Ваш ответ (неправильный)</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-lg bg-green-100 border border-green-200">
                        <span class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-white text-xs shrink-0">✓</span>
                        <span class="text-sm">Правильный ответ</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Кнопки --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('themes') }}" class="btn btn-primary font-normal px-8">Вернуться к темам</a>
            <a href="{{ route('subjects') }}" class="btn bg-base-100 border border-base-300 font-normal">К предметам</a>
        </div>

    </div>

@endsection
