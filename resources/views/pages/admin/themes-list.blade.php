@extends('index')

@section('title', 'Список тем')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col gap-6">

        <nav class="flex items-center gap-2 text-sm text-base-content/50">
            {{ Breadcrumbs::render('admin-themes') }}
        </nav>
        <div class="flex items-center justify-between">

            <h1 class="text-2xl font-bold">
                Список тем
            </h1>

            <a href="{{ route('admin-themes-create') }}"
               class="btn btn-primary">

                Создать тему

            </a>

        </div>


        <x-filters :action="route('admin-themes')">
            <select name="subject_id" class="select select-bordered font-normal">
                <option value="">Все предметы</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->title }}
                    </option>
                @endforeach
            </select>

            <select name="class_number" class="select select-bordered font-normal">
                <option value="">Все классы</option>
                @for($i = 1; $i <= 11; $i++)
                    <option value="{{ $i }}" {{ request('class_number') == $i ? 'selected' : '' }}>{{ $i }} класс</option>
                @endfor
            </select>

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
                    <th>Предмет</th>
                    <th>Класс</th>
                    <th>Действия</th>

                </tr>

                </thead>

                <tbody>

                @foreach($themes as $theme)

                    <tr>

                        <td>{{ $theme->id }}</td>

                        <td>{{ $theme->title }}</td>

                        <td>{{ $theme->subject->title }}</td>

                        <td>
                            {{ $theme->class_number }}
                            {{ $theme->class_letter }}
                        </td>

                        <td class="flex items-center gap-2">
                            <a href="{{ route('admin-themes-edit', $theme->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-themes-delete', $theme->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-error btn-outline"
                                        onclick="return confirm('Удалить тему?')">Удалить</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
            <div class="mt-4 px-4">
                {{ $themes->links() }}
            </div>

        </div>

    </div>

@endsection
