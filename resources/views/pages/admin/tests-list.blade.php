@extends('index')

@section('title', 'Список тестов')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col gap-6">


        {{ Breadcrumbs::render('admin-tests') }}

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">
                Список тестов
            </h1>

            <a href="{{ route('admin-tests-create') }}"
               class="btn btn-primary">
                Создать тест

            </a>

        </div>

        <x-filters :action="route('admin-tests')">
            <select name="subject_id" class="select select-bordered font-normal">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все предметы</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->title }}
                    </option>
                @endforeach
            </select>

            @if($themes->count())
                <select name="theme_id" class="select select-bordered font-normal">
                    <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все темы</option>
                    @foreach($themes as $theme)
                        <option value="{{ $theme->id }}" {{ request('theme_id') == $theme->id ? 'selected' : '' }}>
                            {{ $theme->title }}
                        </option>
                    @endforeach
                </select>
            @endif

            <select name="sort" class="select select-bordered font-normal">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Сортировка</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>А → Я</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Я → А</option>
            </select>
        </x-filters>


        <div class="overflow-x-auto">

            <table class="table w-full border border-base-200">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Предмет</th>
                    <th>Тема</th>
                    <th>Название теста</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tests as $test)

                    <tr>

                        <td>{{ $test->id }}</td>
                        <td>{{ $test->theme->subject->title }}</td>
                        <td>{{ $test->theme->title }}</td>
                        <td>{{ $test->title }}</td>





                        <td class="flex items-center gap-2">
                            <a href="{{ route('admin-questions', $test->id) }}"
                               class="btn btn-sm btn-primary">Вопросы</a>

                            <a href="{{ route('admin-tests-edit', $test->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-tests-delete', $test->id) }}" id="delete-test-{{ $test->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-error btn-outline"
                                        onclick="confirmDelete('delete-test-{{ $test->id }}', 'Вы уверены, что хотите удалить этот тест?')">
                                    Удалить
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <div class="mt-4 px-4">
                {{ $tests->links() }}
            </div>

        </div>

    </div>

@endsection
