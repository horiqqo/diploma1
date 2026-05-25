@extends('index')
@section('title', 'Список пользователей')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10 flex flex-col gap-6">

        {{ Breadcrumbs::render('admin-users') }}

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button class="btn bg-base-100 border border-base-300 font-normal">Фильтрация</button>
                <button class="btn bg-base-100 border border-base-300 font-normal">Сортировка</button>
            </div>
        </div>

        <div class="flex gap-3">
            <input type="text" placeholder="Поиск..."
                class="input input-bordered w-full focus:outline-none focus:border-primary transition-all duration-300"
            />
            <button class="btn btn-primary px-8 font-normal">Поиск</button>
        </div>

    </div>

@endsection
