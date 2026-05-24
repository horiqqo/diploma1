@extends('index')
@section('title', 'Профиль')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-8">

        <div class="card border border-base-200 p-6 flex flex-col gap-4">

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-base-200 shrink-0"></div>
                    <span class="text-lg font-medium">Фамилия Имя Отчество</span>
                </div>
                <a href="#" class="btn btn-primary font-normal">Редактировать</a>
            </div>

            <div class="border-t border-base-200"></div>

            <p class="text-center text-lg">
                Общий средний балл по всем предметам:
                <span class="text-primary font-semibold">4.33</span>
            </p>

        </div>

        <div class="flex flex-col gap-4">
            <h2 class="text-xl font-semibold text-center">Таблица оценок за тестированию</h2>

            <table class="table border border-base-200 rounded-xl w-full">
                <thead>
                <tr class="border-b border-base-200">
                    <th class="p-4 text-left font-medium">Предмет</th>
                    <th class="p-4 text-center font-medium">Тема</th>
                    <th class="p-4 text-right font-medium">Оценка</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>

@endsection
