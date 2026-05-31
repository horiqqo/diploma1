@extends('index')
@section('title', 'Профиль')
@section('content')

    <div class="max-w-3xl mx-auto px-6 py-10 flex flex-col gap-8">

        <div class="card border border-base-200 p-6 flex flex-col gap-4">

            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-lg font-medium">
                        {{ $user->name }}
                    </span>
                    <span class="text-sm text-base-content/50 flex">
                        <p>Почта: </p> {{ $user->email }}
                    </span>
                    <span class="text-sm text-base-content/30 flex">
                         <p>Класс: </p>  {{ $user->class_number }}{{ $user->class_letter }}
                    </span>
                </div>
                <a href="{{route('profile.edit')}}" class="btn btn-primary font-normal">Редактировать</a>
            </div>

            <div class="border-t border-base-200"></div>

            <p class="text-center text-lg">
                Общий средний балл по всем предметам:
                <span class="text-primary font-semibold">
                    {{ $averageScore }}
                </span>
            </p>

        </div>

        <div class="flex flex-col gap-4">
            <h2 class="text-xl font-semibold text-center">Таблица оценок за тестированию</h2>

            <div class="overflow-x-auto">
                <table class="table border border-base-200 rounded-xl w-full min-w-[500px]">
                    <thead>
                    <tr class="border-b border-base-200">
                        <th class="p-4 text-left font-medium">Предмет</th>
                        <th class="p-4 text-center font-medium">Тема</th>
                        <th class="p-4 text-right font-medium">Оценка</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tbody>

                    @forelse($results as $result)
                        <tr class="border-b border-base-200">
                            <td class="p-4">
                                {{ $result->test->theme->subject->title }}
                            </td>
                            <td class="p-4 text-center">
                                {{ $result->test->theme->title }}
                            </td>
                            <td class="p-4 text-right">
                                <x-grade :score="$result->score" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-6 text-center text-base-content/50">
                                Вы ещё не проходили тесты
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
