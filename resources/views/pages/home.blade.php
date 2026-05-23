@extends('index')
@section('title', 'Главная')
@section('content')

    <div class="max-w-5xl mx-auto px-6">

        <section class="py-16 flex items-center justify-between gap-10 px-4">
            <div class="flex flex-col gap-6 max-w-lg">
                <div>
                    <h1 class="text-3xl font-bold">Система дистанционного обучения МОАУ СОШ №13</h1>
                    <p class="text-base-content/50 mt-3">
                        Электронная образовательная среда для организации дистанционного обучения,
                        взаимодействия преподавателей и учеников, а также удобного доступа
                        к учебным материалам и тестам.
                    </p>
                </div>

                <div class="flex items-center gap-4 mt-10">
                    <a href="{{ route('subjects')}}" class="btn px-15 py-6 text-lg btn-primary text-base-100 font-normal transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg active:scale-95">
                        К предметам
                    </a>
                    <a href="{{route('profile')}}"
                       class="btn px-15 py-6 text-lg text-secondary font-normal bg-base-100 transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-md active:scale-95">
                        В профиль
                    </a>
                </div>
            </div>

            <div class="hidden md:block w-[420px] shrink-0">
                <video autoplay loop muted playsinline class="w-full object-contain">
                    <source src="{{ asset('../videos/hero.mp4') }}" type="video/mp4">
                </video>
            </div>
        </section>

   {{-- <div class="border-t border-base-300"></div>--}}

        <section class="py-2 flex items-center gap-10 px-4">
            <div class="hidden md:block w-[420px] shrink-0">
               <img loading="lazy" src="{{asset('../images/gifs/books-main.gif')}}">
            </div>

            <div class="max-w-md">
                <h2 class="text-2xl font-bold">Учитесь в удобном темпе</h2>
                <p class="text-base-content/70 mt-3 text-lg">
                    Получайте доступ к материалам, тестам и статистике успеваемости в любое время
                </p>
            </div>
        </section>

    {{--<div class="border-t border-base-300"></div>--}}

        <section class="py-16 flex items-center justify-between gap-10 px-4">

        <div class="flex flex-col gap-6">
            <h2 class="text-2xl font-bold">Перейти к учебным предметам</h2>

            <div class="grid grid-cols-2 gap-4">
                <a href="#" class="card border border-base-200 hover:border-primary p-6 text-primary font-medium text-center transition">Информатика</a>
                <a href="#" class="card border border-base-200 hover:border-primary p-6 text-primary font-medium text-center transition">Математика</a>
                <a href="#" class="card border border-base-200 hover:border-primary p-6 text-primary font-medium text-center transition">Английский язык</a>
                <a href="#" class="card border border-base-200 hover:border-primary p-6 text-primary font-medium text-center transition">Физика</a>
            </div>
        </div>

        <div class="hidden md:block w-[380px] shrink-0">
            <img src="{{ asset('../images/illustration/illustration_1.webp') }}" alt="Предметы" class="w-full object-contain">
        </div>

    </section>

@endsection
