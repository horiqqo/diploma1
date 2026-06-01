@props(['action' => '', 'search' => true])

<form method="GET" action="{{ $action }}" class="flex flex-col gap-3 mb-6">

    @if($search)
        <div class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Поиск..."
                   class="input input-bordered w-full font-normal focus:outline-none focus:border-primary transition-all duration-300">
            <button type="submit" class="btn btn-primary font-normal">Поиск</button>
        </div>
    @endif

    @if($slot->isNotEmpty())
        <div class="flex flex-wrap items-center gap-2">
            {{ $slot }}
            <button type="submit" class="btn btn-primary btn-sm font-normal">Применить</button>
            @if(request()->hasAny(array_keys(request()->except('page'))))
                <a href="{{ $action }}" class="btn btn-sm font-normal">Сбросить</a>
            @endif
        </div>
    @endif

</form>
