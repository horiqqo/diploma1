@extends('index')

@section('title', 'Список уроков')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col gap-6">

        <nav class="text-sm crumbs">
            {{ Breadcrumbs::render('admin-lessons') }}
        </nav>



        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Список уроков
            </h1>

            <a href="{{ route('admin-lessons-create') }}"
               class="btn btn-primary">

                Создать урок

            </a>

        </div>


        <x-filters :action="route('admin-lessons')">
            <select name="subject_id" class="select select-bordered font-normal">
                <option value="">Все предметы</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->title }}
                    </option>
                @endforeach
            </select>

            @if($themes->count())
                <select name="theme_id" class="select select-bordered font-normal">
                    <option value="">Все темы</option>
                    @foreach($themes as $theme)
                        <option value="{{ $theme->id }}" {{ request('theme_id') == $theme->id ? 'selected' : '' }}>
                            {{ $theme->title }}
                        </option>
                    @endforeach
                </select>
            @endif

            <select name="sort" class="select select-bordered font-normal">
                <option value="">Сортировка</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>А → Я</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Я → А</option>
            </select>
        </x-filters>

        <div class="overflow-x-auto">

            <table class="table w-full border border-base-200">

                <thead>

                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Тема</th>
                    <th>Действия</th>

                </tr>

                </thead>

                <tbody>

                @foreach($lessons as $lesson)

                    <tr>

                        <td>{{ $lesson->id }}</td>

                        <td>{{ $lesson->title }}</td>

                        <td>{{ $lesson->theme->title }}</td>

                        <td class="flex items-center gap-2">
                            <a href="{{ route('admin-lessons-edit', $lesson->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-lessons-delete', $lesson->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-error btn-outline"
                                        onclick="return confirm('Удалить урок?')">Удалить</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <div class="mt-4 px-4">
                {{ $lessons->links() }}
            </div>

        </div>

    </div>

@endsection
