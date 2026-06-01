@extends('index')
@section('title', 'Предметы')
@section('content')

    <div class="max-w-5xl mx-auto px-6 py-10">

        {{ Breadcrumbs::render('subjects') }}

        <div class="flex items-end justify-between mb-6">
            <div class="hidden md:block w-[420px]">
                <img src="{{ asset('../images/illustration/illustration.webp') }}" alt="Предметы" class="w-full object-contain" loading="lazy">
            </div>
        </div>

        <x-filters :action="route('subjects')">

            <select name="teacher_id" class="select select-bordered font-normal">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Все учителя</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>

            <select name="sort" class="select select-bordered font-normal">
                <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Сортировка</option>
                <option value="asc"  {{ request('sort') === 'asc'  ? 'selected' : '' }}>А → Я</option>
                <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Я → А</option>
            </select>

        </x-filters>

        <h2 class="text-xl font-semibold text-center mb-6">Список учебных предметов</h2>

        @if($subjects->isEmpty())
            <p class="text-center text-base-content/50 py-10">Предметы не найдены</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($subjects as $subject)
                    <a href="{{ route('themes', $subject->id) }}"
                       class="bg-base-100 border border-base-300 rounded-xl hover:shadow-md hover:-translate-y-1 hover:border-primary/20 p-5 text-base-content/70 hover:text-primary font-medium transition-all duration-300 flex items-center gap-4 min-h-[70px]">

                    <span class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-lg shrink-0">
                        {{ mb_substr($subject->title, 0, 1) }}
                    </span>

                        <div class="flex flex-col gap-1 min-w-0">
                            <span class="text-base-content font-semibold truncate">{{ $subject->title }}</span>

                            @if($subject->description)
                                <span class="text-xs text-base-content/50 font-normal line-clamp-2 leading-snug">
                                {{ $subject->description }}
                            </span>
                            @endif

                            @if($subject->teacher)
                                <span class="text-xs text-primary/70 font-normal flex items-center gap-1 mt-0.5">
                                {{ $subject->teacher->name }}
                            </span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $subjects->links() }}
            </div>
        @endif

    </div>

@endsection
