@extends('index')
@section('title', 'Результат теста')
@section('content')

    <div class="max-w-2xl mx-auto px-6 py-10 flex flex-col gap-6">

        <h1 class="text-2xl font-bold">Результат теста</h1>

        @if($result)
            <div class="card border border-base-200 p-6 flex flex-col gap-4">

                <div class="flex flex-col gap-1">
                    <span class="font-semibold text-lg">{{ $result->test->title }}</span>
                    <span class="text-sm text-base-content/50">{{ $result->created_at->format('d.m.Y H:i') }}</span>
                </div>

                <div class="border-t border-base-200"></div>

                <div class="flex items-center justify-between">
                    <span class="text-base-content/70">Оценка</span>
                    <x-grade :score="$result->score" />
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-base-content/70">Результат</span>
                    <span class="font-semibold">{{ $result->score }}%</span>
                </div>

            </div>

            <a href="{{ route('subjects') }}" class="btn btn-primary font-normal w-full">
                К предметам
            </a>
        @endif

    </div>

@endsection
