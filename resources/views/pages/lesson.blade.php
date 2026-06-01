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
                @php
                    $videoUrl = $lesson->video;
                    if (preg_match('/rutube\.ru\/video\/([\w-]+)/', $videoUrl, $m)) {
                        $videoUrl = 'https://rutube.ru/play/embed/' . $m[1];
                    } else if (preg_match('/vk\.com\/video(-?\d+_\d+)/', $videoUrl, $m)) {
                        $videoUrl = 'https://vk.com/video_ext.php?oid=' . explode('_', $m[1])[0] . '&id=' . explode('_', $m[1])[1];
                    }
                @endphp
                <p class="text-base-content/50 text-sm">Видеоматериал по теме: </p>
                <div class="rounded-xl overflow-hidden">
                    <iframe
                        class="w-full aspect-video rounded-xl"
                        src="{{ $videoUrl }}"
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
