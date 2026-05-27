@extends('index')
@section('title', 'Главная')
@section('content')

    <div class="max-w-5xl mx-auto px-6">
        <section class="py-10 md:py-16 px-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">

                <div class="w-[280px] md:w-[420px] shrink-0 order-first md:order-last">
                    <video autoplay loop muted playsinline class="w-full object-contain rounded-3xl">
                        <source src="{{ asset('../videos/hero.mp4') }}" type="video/mp4">
                    </video>
                </div>

                <div class="flex flex-col gap-6 max-w-lg">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold">Система дистанционного обучения общеобразовательным программам</h1>
                        <p class="text-base-content/50 mt-3">
                            Электронная образовательная среда для организации дистанционного обучения,
                            взаимодействия преподавателей и учеников, а также удобного доступа
                            к учебным материалам и тестам.
                        </p>
                    </div>
                    <div class="flex items-center gap-4 mt-4 md:mt-10">
                        <a href="{{ route('subjects')}}" class="btn btn-primary text-base md:text-lg px-6 md:px-15 py-4 md:py-6 text-base-100 font-normal transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg active:scale-95">
                            К предметам
                        </a>
                        <a href="{{route('register')}}" class="btn text-base md:text-lg px-6 md:px-15 py-4 md:py-6 text-secondary font-normal bg-base-100 border border-base-300 transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-md active:scale-95">
                            В профиль
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <section class="py-2 px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card border border-base-200 p-6 flex flex-col gap-3 transition-all duration-300 hover:border-primary/30 hover:shadow-md hover:-translate-y-1">
                    <img data-icon="book-open"  src="{{ asset('../images/icons/book-open.svg') }}"  alt="Учебные материалы" class="w-7 h-7 object-contain">
                    <h3 class="font-semibold text-lg">Учебные материалы</h3>
                    <p class="text-base-content/60">Все лекции, презентации и задания собраны в одном месте и доступны в любое время</p>
                </div>
                <div class="card border border-base-200 p-6 flex flex-col gap-3 transition-all duration-300 hover:border-primary/30 hover:shadow-md hover:-translate-y-1">
                    <img data-icon="check-list" src="{{ asset('../images/icons/check-list.svg') }}" alt="Тесты и задания"    class="w-6 h-6 object-contain">
                    <h3 class="font-semibold text-lg">Тесты и задания</h3>
                    <p class="text-base-content/60">Проверяйте знания с помощью тестов и получайте мгновенную обратную связь</p>
                </div>
                <div class="card border border-base-200 p-6 flex flex-col gap-3 transition-all duration-300 hover:border-primary/30 hover:shadow-md hover:-translate-y-1">
                    <img data-icon="stats" src="{{ asset('../images/icons/stats.svg') }}" alt="Статистика" class="w-5 h-5 object-contain">
                    <h3 class="font-semibold text-lg">Статистика успеваемости</h3>
                    <p class="text-base-content/60">Следите за своим прогрессом и результатами по каждому предмету</p>
                </div>
            </div>
        </section>

        <section class="py-6 px-4">
            <div class="flex justify-center md:hidden mb-4">
                <img loading="lazy" src="{{asset('../images/gifs/books-main.gif')}}" class="w-[200px]">
            </div>

            <div class="flex items-center gap-10">
                <div class="hidden md:block w-[420px] shrink-0">
                    <img loading="lazy" class="rounded-3xl" src="{{asset('../images/gifs/books-main.gif')}}">
                </div>

                <div class="relative w-full">
                    <div class="relative h-[220px]">
                        <div class="slide-text absolute inset-0 transition-all duration-500 ease-in-out opacity-100 scale-100">
                            <div class="flex items-stretch p-5 rounded-xl gap-4 bg-primary/3 h-full">
                                <div class="w-1 bg-primary/40 rounded-full shrink-0"></div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold">Учитесь в удобном темпе</h2>
                                    <p class="text-base-content/70 mt-3 text-base md:text-lg">
                                        Получайте доступ к материалам, тестам и статистике успеваемости в любое время
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-text absolute inset-0 transition-all duration-500 ease-in-out opacity-0 scale-90">
                            <div class="flex items-stretch p-5 rounded-xl gap-4 bg-primary/3 h-full">
                                <div class="w-1 bg-primary/40 rounded-full shrink-0"></div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold">Взаимодействуйте с учителями</h2>
                                    <p class="text-base-content/70 mt-3 text-base md:text-lg">
                                        Задавайте вопросы и получайте обратную связь напрямую от преподавателей
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="slide-text absolute inset-0 transition-all duration-500 ease-in-out opacity-0 scale-90">
                            <div class="flex items-stretch p-5 rounded-xl gap-4 bg-primary/3 h-full">
                                <div class="w-1 bg-primary/40 rounded-full shrink-0"></div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold">Следите за своим прогрессом</h2>
                                    <p class="text-base-content/70 mt-3 text-base md:text-lg">
                                        Смотрите результаты тестов и динамику успеваемости по каждому предмету
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center gap-2 mt-5">
                        <button onclick="goToText(0)" class="text-dot w-3 h-3 rounded-full bg-primary transition-all duration-300 cursor-pointer"></button>
                        <button onclick="goToText(1)" class="text-dot w-3 h-3 rounded-full bg-base-300 transition-all duration-300 cursor-pointer"></button>
                        <button onclick="goToText(2)" class="text-dot w-3 h-3 rounded-full bg-base-300 transition-all duration-300 cursor-pointer"></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-16 px-4">
            <div class="flex justify-center md:hidden mb-6">
                <img data-illustration="illustration_1" src="{{ asset('../images/illustration/illustration_1.webp') }}" alt="Предметы" class="w-[200px] object-contain">
            </div>

            <div class="flex items-center justify-between gap-10">
                <div class="flex flex-col gap-4 w-full md:w-auto">
                    <h2 class="text-xl md:text-2xl font-bold text-center md:text-left">Перейти к учебным предметам</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-4 md:p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center justify-center md:justify-start gap-3 md:gap-4 min-h-[60px] md:min-h-[70px]">
                            <span class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">И</span>
                            Информатика
                        </a>
                        <a href="#" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-4 md:p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center justify-center md:justify-start gap-3 md:gap-4 min-h-[60px] md:min-h-[70px]">
                            <span class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">М</span>
                            Математика
                        </a>
                        <a href="#" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-4 md:p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center justify-center md:justify-start gap-3 md:gap-4 min-h-[60px] md:min-h-[70px]">
                            <span class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">Ая</span>
                            Английский язык
                        </a>
                        <a href="#" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-4 md:p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center justify-center md:justify-start gap-3 md:gap-4 min-h-[60px] md:min-h-[70px]">
                            <span class="w-8 h-8 md:w-9 md:h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">Ф</span>
                            Физика
                        </a>
                    </div>
                </div>

                <div class="hidden md:block w-[380px] shrink-0">
                    <img data-illustration="illustration_1" src="{{ asset('../images/illustration/illustration_1.webp') }}" alt="Предметы" class="w-full object-contain" loading="lazy">
                </div>
            </div>
        </section>

    </div>

@endsection
