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
        @if($test->questions->isEmpty())
            <div class="bg-primary/10 text-primary border border-primary/20 rounded-lg px-4 py-3">
                В этом тесте пока нет вопросов
            </div>
        @else
        <form method="POST"
              action="{{ route('test.submit', $test->id) }}"
              class="flex flex-col gap-8">

            @csrf

            @foreach($test->questions as $question)
                <div class="card border border-base-200 p-6 flex flex-col gap-5">

                    <h2 class="text-lg font-semibold">
                        {{ $loop->iteration }}. {{ $question->question }}
                    </h2>

                    @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}"
                             alt="Изображение к вопросу"
                             class="rounded-lg max-h-64 object-contain">
                    @endif

                    @if($question->type === 'choice')
                        <div class="flex flex-col gap-3">
                            @foreach($question->answers as $answer)
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="radio"
                                           name="answers[{{ $question->id }}]"
                                           value="{{ $answer->id }}"
                                           class="radio radio-primary">
                                    <span>{{ $answer->answer }}</span>
                                </label>
                            @endforeach
                        </div>
                    @else
                        <input type="text"
                               name="text_answers[{{ $question->id }}]"
                               class="input input-bordered w-full"
                               placeholder="Введите ответ...">
                    @endif

                </div>
            @endforeach

            <button class="btn btn-primary w-full">
                Завершить тест
            </button>

        </form>
        @endif

    </div>

@endsection
