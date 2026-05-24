@extends('index')
@section('title', 'Панель администратора')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-8">

        {{ Breadcrumbs::render('dashboard') }}


        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-base-200 shrink-0"></div>
                <div class="flex flex-col">
                <span class="text-lg font-medium">Фамилия Имя Отчество</span>
                <span class="text-primary text-sm">администратор</span>
                </div>
            </div>
            <a href="#" class="btn btn-primary font-normal">Редактировать</a>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="card border border-base-200 p-6 flex flex-col items-center gap-2">
                <span class="text-3xl font-bold text-primary">10</span>
                <span class="text-base-content/70 text-sm text-center">Всего предметов</span>
            </div>
            <div class="card border border-base-200 p-6 flex flex-col items-center gap-2">
                <span class="text-3xl font-bold text-primary">10</span>
                <span class="text-base-content/70 text-sm text-center">Всего тестов</span>
            </div>
            <div class="card border border-base-200 p-6 flex flex-col items-center gap-2">
                <span class="text-3xl font-bold text-primary">10</span>
                <span class="text-base-content/70 text-sm text-center">Всего пользователей</span>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="flex flex-col gap-3 border-t-4 border-primary pt-4">
                <span class="font-semibold">Предмет</span>
                <a href="#" class="text-base-content/70 hover:text-primary transition text-sm">Создать предмет</a>
                <a href="{{route('admin-subjects')}}" class="text-base-content/70 hover:text-primary transition text-sm">Список предметов</a>
            </div>

            <div class="flex flex-col gap-3 border-t-4 border-primary/60 pt-4">
                <span class="font-semibold">Урок</span>
                <a href="#" class="text-base-content/70 hover:text-primary transition text-sm">Создать урок</a>
                <a href="#" class="text-base-content/70 hover:text-primary transition text-sm">Создать тест</a>
            </div>

            <div class="flex flex-col gap-3 border-t-4 border-primary/40 pt-4">
                <span class="font-semibold">Пользователи</span>
                <a href="{{route('admin-users')}}" class="text-base-content/70 hover:text-primary transition text-sm">Список пользователей</a>
            </div>

            <div class="flex flex-col gap-3 border-t-4 border-primary/20 pt-4">
                <span class="font-semibold">Темы</span>
                <a href="#" class="text-base-content/70 hover:text-primary transition text-sm">Создать тему</a>
            </div>

        </div>

    </div>

@endsection
