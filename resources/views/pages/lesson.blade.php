@extends('index')
@section('title', 'Урок')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('lesson') }}

        <div class="border-b border-base-200 pb-4 mb-8">
            <h1 class="text-xl font-bold">Тема урока</h1>
        </div>

        <div class="flex flex-col gap-6">

            <p class="text-base-content/80 text-lg leading-relaxed">
                Текст учебного материала. Здесь будет содержимое урока которое
                учитель добавит через админ-панель.
            </p>

            <div class="flex justify-center">
                <img src="#" alt="Иллюстрация" class="rounded-xl max-w-full object-contain">
            </div>

            <p class="text-base-content/80 text-lg leading-relaxed">
                Продолжение учебного материала после картинки.
            </p>

            <div class="flex items-stretch gap-4 p-5 rounded-xl bg-primary/5">
                <div class="w-1 bg-primary/40 rounded-full shrink-0"></div>
                <p class="text-base-content/80 text-lg">
                    Важная информация которую нужно запомнить.
                </p>
            </div>

        </div>

        <div class="mt-10">
            <a href="{{ route('test') }}" class="btn btn-primary px-10 font-normal text-lg transition-all duration-300 hover:scale-[1.01]">
                Пройти тест по теме
            </a>
        </div>

    </div>

@endsection
