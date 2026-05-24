@extends('index')
@section('title', 'Тест')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('test') }}

        <form method="POST" action="#">
            @csrf

            <div class="flex flex-col gap-6">

                <h2 class="text-2xl font-semibold">1. Текст вопроса</h2>

                <div class="flex justify-center">
                    <div class="w-[300px] h-[200px] bg-base-200 rounded-xl"></div>
                </div>

                <div class="border-t border-base-200"></div>

                <div class="flex flex-col gap-3">
                    <p>Выберите один вариант ответа:</p>
                    <label class="flex items-center gap-3 p-4 border border-base-200 rounded-xl cursor-pointer hover:border-primary transition-all duration-300">
                        <input type="radio" name="answer" value="1" class="radio radio-primary">
                        <span>Вариант ответа 1</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-base-200 rounded-xl cursor-pointer hover:border-primary transition-all duration-300">
                        <input type="radio" name="answer" value="2" class="radio radio-primary">
                        <span>Вариант ответа 2</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-base-200 rounded-xl cursor-pointer hover:border-primary transition-all duration-300">
                        <input type="radio" name="answer" value="3" class="radio radio-primary">
                        <span>Вариант ответа 3</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-base-200 rounded-xl cursor-pointer hover:border-primary transition-all duration-300">
                        <input type="radio" name="answer" value="4" class="radio radio-primary">
                        <span>Вариант ответа 4</span>
                    </label>
                </div>

            </div>

            <div class="mt-8">
                <button type="submit" class="btn btn-primary px-12 py-3 text-lg font-normal transition-all duration-300 hover:scale-[1.01]">
                    Отправить
                </button>
            </div>

        </form>

    </div>

@endsection
