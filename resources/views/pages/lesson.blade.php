@extends('index')
@section('title', 'Урок')
@section('content')


    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('lesson') }}

        <div class="border-b border-base-200 pb-4 mb-6">
            <h1 class="text-xl font-bold text-center">Тема урока</h1>
         </div>





    </div>

@endsection
