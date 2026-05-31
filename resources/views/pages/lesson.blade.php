@extends('index')
@section('title', 'Урок')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('lesson', $lesson) }}

        <div class="border-b border-base-200 pb-4 mb-8">
            <h1 class="text-xl font-bold">
                {{ $lesson->title }}
            </h1>
        </div>


        <div class="flex flex-col gap-6">

            <p class="text-base-content/80 text-lg leading-relaxed">
                {{ $lesson->content }}
            </p>

            @if($lesson->image)
                <img src="{{ asset('storage/' . $lesson->image) }}"
                     alt="{{ $lesson->title }}"
                     class="rounded-xl w-full object-cover">
            @endif

            @if($lesson->video)
                <div class="rounded-xl overflow-hidden">
                    <iframe
                        class="w-full aspect-video rounded-xl"
                        src="{{ $lesson->video }}"
                        allowfullscreen>
                    </iframe>
                </div>
            @endif

        </div>

        @if($lesson->theme->tests->count())
            <div class="mt-10">

                <a href="{{ route('test', $lesson->theme->tests->first()->id)}}"
                   class="btn btn-primary px-10 font-normal text-lg transition-all duration-300 hover:scale-[1.01]">
                    Пройти тест по теме
                </a>

            </div>
        @endif

    </div>

@endsection
