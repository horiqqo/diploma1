@extends('index')

@section('content')
    <div class="max-w-5xl mx-auto px-6">
        <section class="py-16 md:py-24 px-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">

                <div class="w-[250px] md:w-[380px] shrink-0 order-first md:order-last">
                    <img
                        src="{{ asset('../images/gifs/books-main.gif') }}"
                        alt="Ошибка"
                        class="w-full object-contain rounded-3xl"
                    >
                </div>

                <div class="flex flex-col gap-6 max-w-xl">

                    <div class="inline-flex items-center gap-3">
                        <div class="badge badge-primary badge-lg">
                            @yield('code')
                        </div>
                    </div>

                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold">
                            @yield('title')
                        </h1>

                        <p class="text-base-content/60 mt-4 text-lg">
                            @yield('message')
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-2">
                        <a href="{{ route('home') }}"
                           class="btn btn-primary px-8">
                            На главную
                        </a>

                        <button onclick="history.back()" class="btn btn-outline">
                            Назад
                        </button>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
