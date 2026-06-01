@extends('index')

@section('title', 'Вопросы теста')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col gap-6">

        {{ Breadcrumbs::render('admin-questions', $test) }}

        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Вопросы теста: {{ $test->title }}
            </h1>

            <a href="{{ route('admin-questions-create', $test->id) }}" class="btn btn-primary">
                Добавить вопрос
            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="table table-fixed w-full border border-base-200">

                <thead>

                <tr>
                    <th>ID</th>
                    <th>Вопрос</th>
                    <th>Действия</th>
                </tr>

                </thead>

                <tbody>

                @foreach($questions as $question)

                    <tr>

                        <td>{{ $question->id }}</td>

                        <td>{{ $question->question }}</td>

                        <td class="flex items-center gap-2">
                            @if($question->type === 'choice')
                                <a href="{{ route('admin-answers', $question->id) }}"
                                   class="btn btn-sm btn-primary">Ответы</a>
                            @endif

                            <a href="{{ route('admin-questions-edit', $question->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-questions-delete', $question->id) }}"
                                  id="delete-question-{{ $question->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-error btn-outline"
                                        onclick="confirmDelete('delete-question-{{ $question->id }}', 'Вы уверены, что хотите удалить этот вопрос?')">
                                    Удалить
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <div class="mt-4 px-4">
                {{ $questions->links() }}
            </div>

        </div>

    </div>

@endsection
