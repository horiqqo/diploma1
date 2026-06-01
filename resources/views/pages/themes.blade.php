@extends('index')
@section('title', 'Темы')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('themes', $subject) }}

        <div class="flex justify-center mb-6">
            <div class="w-[220px]">
                <img data-illustration="illustration_2" src="{{ asset('../images/illustration/illustration_2.webp') }}" alt="иллюстрация2" class="w-full object-contain" loading="lazy">
            </div>
        </div>

        <div class="border-b border-base-200 pb-4 mb-6">
            <h1 class="text-xl font-semibold text-center">{{ $subject->title }}</h1>
        </div>

        <div class="flex items-center justify-between px-4 mb-4">
            <span class="font-semibold">Раздел</span>
            <span class="text-base-content/70">Оценка за тестирование</span>
        </div>

        <div class="flex flex-col gap-4">

            @foreach($themes as $theme)

                <div class="flex flex-col gap-2">

                    <div class="flex items-center justify-between px-4 py-3">

                        <div class="flex items-center gap-3">
                            <span class="text-primary font-medium">{{ $theme->title }}</span>
                        </div>

                        @php
                            $testResult = $theme->tests->flatMap->testResults->first();
                        @endphp

                        @if($testResult)
                            <x-grade :score="$testResult->score" />
                        @else
                            <span class="font-bold text-base-content/30">—</span>
                        @endif

                    </div>

                    <div class="flex flex-col gap-2 pl-10">

                        @foreach($theme->lessons as $lesson)
                            <div class="flex items-center gap-3 px-4 py-2">
                                <img src="{{asset('../images/icons/education.svg')}}" alt="иконка обучения" class="w-7 h-7 object-contain" loading="lazy">
                                <a href="{{ route('lesson', $lesson->id) }}" class="text-primary hover:underline">
                                    {{ $lesson->title }}
                                </a>
                            </div>
                        @endforeach

                        @foreach($theme->tests as $test)
                            <div class="flex items-center gap-3 px-4 py-2">
                                <img src="{{asset('../images/icons/test.svg')}}" alt="иконка тестов" class="w-7 h-7 object-contain" loading="lazy">
                                <a href="{{ route('test', $test->id) }}" class="text-primary hover:underline">
                                    {{ $test->title }}
                                </a>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="border-t border-base-200"></div>

            @endforeach

        </div>

    </div>

@endsection
