@extends('index')
@section('title', 'Тест')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('test', $test) }}

        <div class="mb-8">
            <h1 class="text-2xl font-bold">
                {{ $test->title }}
            </h1>
        </div>

        <form method="POST"
              action="{{ route('test.submit', $test->id) }}"
              class="flex flex-col gap-8">

            @csrf

            @foreach($test->questions as $question)

                <div class="card border border-base-200 p-6 flex flex-col gap-5">

                    <h2 class="text-lg font-semibold">
                        {{ $loop->iteration }}. {{ $question->question }}
                    </h2>

                    <div class="flex flex-col gap-3">

                        @foreach($question->answers as $answer)

                            <label class="flex items-center gap-3 cursor-pointer">

                                <input type="radio"
                                       name="answers[{{ $question->id }}]"
                                       value="{{ $answer->id }}"
                                       class="radio radio-primary">

                                <span>
                                {{ $answer->answer }}
                            </span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

            <button class="btn btn-primary w-full">
                Завершить тест
            </button>

        </form>

    </div>

@endsection
