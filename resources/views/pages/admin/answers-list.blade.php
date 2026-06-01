@extends('index')

@section('title', 'Ответы')

@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10 flex flex-col gap-6">

        {{ Breadcrumbs::render('admin-answers', $question) }}

        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Ответы
            </h1>

            <a href="{{ route('admin-answers-create', $question->id) }}" class="btn btn-primary">
                Добавить ответ
            </a>

        </div>

        <x-filters :action="route('admin-answers', $question->id)" :search="false">
            <select name="is_correct" class="select select-bordered font-normal">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все ответы</option>
                <option value="true" {{ request('is_correct') == 'true' ? 'selected' : '' }}>Правильные</option>
                <option value="false" {{ request('is_correct') == 'false' ? 'selected' : '' }}>Неправильные</option>
            </select>
        </x-filters>

        <div class="overflow-x-auto">

            <table class="table table-fixed w-full border border-base-200">

                <thead>

                <tr>
                    <th>ID</th>
                    <th>Ответ</th>
                    <th>Статус</th>
                    <th>Действия</th>

                </tr>

                </thead>

                <tbody>

                @foreach($answers as $answer)

                    <tr>

                        <td>{{ $answer->id }}</td>

                        <td>{{ $answer->answer }}</td>

                        <td>

                            @if($answer->is_correct)

                                <span class="badge badge-success">
                                Правильный
                            </span>

                            @else

                                <span class="badge badge-error">
                                Неправильный
                            </span>

                            @endif

                        </td>

                        <td class="flex items-center gap-2">
                            <a href="{{ route('admin-answers-edit', $answer->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-answers-delete', $answer->id) }}" id="delete-answer-{{ $answer->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-error btn-outline"
                                        onclick="confirmDelete('delete-answer-{{ $answer->id }}', 'Вы уверены, что хотите удалить этот ответ?')">
                                    Удалить
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <div class="mt-4 px-4">
                {{ $answers->links() }}
            </div>

        </div>

    </div>

@endsection
