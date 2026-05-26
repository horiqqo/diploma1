@extends('index')
@section('title', 'Предметы')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('subjects') }}

        <div class="flex items-end justify-between mb-6">
            <div class="hidden md:block w-[420px]">
                <img src="{{ asset('../images/illustration/illustration.webp') }}" alt="Предметы" class="w-full object-contain" loading="lazy">
            </div>
            <div class="flex items-center gap-3">
                <button class="btn bg-base-100 border border-base-300 font-normal">Фильтрация</button>
                <button class="btn bg-base-100 border border-base-300 font-normal">Сортировка</button>
            </div>
        </div>

        <div class="flex gap-3 mb-10">
            <input
                type="text"
                placeholder="Поиск предмета..."
                class="input input-bordered w-full focus:outline-none focus:border-primary transition-all duration-300"
            />
            <button class="btn btn-primary px-8 font-normal">Поиск</button>
        </div>

        <h2 class="text-xl font-semibold text-center mb-6">список учебных предметов</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{route('themes')}}" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center gap-4 min-h-[70px]">
                <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-lg shrink-0">И</span>
                Информатика
            </a>
            <a href="{{route('themes')}}" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center gap-4 min-h-[70px]">
                <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-lg shrink-0">М</span>
                Математика
            </a>
            <a href="{{route('themes')}}" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center gap-4 min-h-[70px]">
                <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-lg shrink-0">Ая</span>
                Английский язык
            </a>
            <a href="{{route('themes')}}" class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center gap-4 min-h-[70px]">
                <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-lg shrink-0">Ф</span>
                Физика
            </a>
        </div>

    </div>

@endsection
