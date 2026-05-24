@extends('index')
@section('title', 'Темы')
@section('content')


    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('themes') }}


        <div class="flex items-center justify-center mb-6">


            <div class="hidden md:block w-[220px]">
                <img src="{{ asset('../images/illustration/illustration_2.webp') }}" alt="" class="w-full object-contain">
            </div>

        </div>

        <div class="border-b border-base-200 pb-4 mb-6">
            <h1 class="text-xl font-bold text-center">Название предмета</h1>
        </div>

        <div class="flex items-center justify-between px-4 mb-3">
            <span class="">Название темы</span>
            <span class="">Оценка за тестирование</span>
        </div>



    </div>

@endsection
