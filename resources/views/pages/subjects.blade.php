@extends('index')
@section('title', 'Предметы')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('subjects') }}

        <div class="flex items-end justify-between mb-6">

            <div class="hidden md:block w-[420px]">
                <img src="{{ asset('../images/illustration/illustration.webp') }}" alt="Предметы" class="w-full object-contain">
            </div>

            <div class="flex items-center gap-3">
                <button class="btn bg-base-100 border border-base-300">Фильтрация</button>
                <button class="btn bg-base-100 border border-base-300">Сортировка</button>
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

    </div>

@endsection


