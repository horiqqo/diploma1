@extends('index')
@section('title', 'Список предметов')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10 flex flex-col gap-6">

        <nav class="flex items-center gap-2 text-sm text-base-content/50">
            {{ Breadcrumbs::render('admin-subjects') }}
        </nav>

            <a href="{{route('admin-subjects-create')}}"  class="btn btn-primary font-normal w-fit">Создать предмет</a>



        <x-filters :action="route('admin-subjects')">
            <select name="teacher_id" class="select select-bordered font-normal">
                <option value="">Все преподаватели</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
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
                    <th>Описание</th>
                    <th>Преподаватель</th>
                    <th>Действия</th>
                </tr>
                </thead>

                <tbody>
                @foreach($subjects as $subject)
                    <tr class="hover">
                        <td>{{ $subject->id }}</td>

                        <td>{{ $subject->title }}</td>

                        <td>{{ $subject->description ?? '—' }}</td>

                        <td>
                            {{ $subject->teacher->name ?? '—' }}
                        </td>

                        <td class="flex items-center gap-2">
                            <a href="{{ route('admin-subjects-edit', $subject->id) }}"
                               class="btn btn-sm btn-outline">Изменить</a>

                            <form method="POST" action="{{ route('admin-subjects-delete', $subject->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-error btn-outline"
                                        onclick="return confirm('Удалить предмет?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 px-4">
                {{ $subjects->links() }}
            </div>
        </div>

    </div>

@endsection
