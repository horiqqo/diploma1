@extends('index')
@section('title', 'Темы')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('themes') }}

        <div class="flex justify-center mb-6">
            <div class="w-[220px]">
                <img src="{{ asset('../images/illustration/illustration_2.webp') }}" alt="иллюстрация2" class="w-full object-contain" loading="lazy">
            </div>
        </div>

        <div class="border-b border-base-200 pb-4 mb-6">
            <h1 class="text-xl font-semibold text-center">Название предмета</h1>
        </div>

        <div class="flex items-center justify-between px-4 mb-4">
            <span class="font-semibold">Название темы</span>
            <span class="text-base-content/70">Оценка за тестирование</span>
        </div>

        <div class="flex flex-col gap-4">

            <div class="flex flex-col gap-2">

                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" class="checkbox checkbox-primary rounded-md" disabled>
                        <a href="#" class="text-primary hover:underline font-medium">Тема 1. Текст</a>
                    </div>
                    <span class="text-primary">4 / 5</span>
                </div>

                <div class="flex flex-col gap-2 pl-10">
                    <div class="flex items-center gap-3 px-4 py-2">
                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm rounded-md" disabled>
                        <a href="{{ route('lesson') }}" class="text-primary hover:underline">Урок 1. название файла</a>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2">
                        <input type="checkbox" class="checkbox checkbox-primary checkbox-sm rounded-md" disabled>
                        <a href="{{ route('test') }}" class="text-primary hover:underline">Тестирование</a>
                    </div>
                </div>

            </div>

            <div class="border-t border-base-200"></div>



        </div>

    </div>

@endsection
