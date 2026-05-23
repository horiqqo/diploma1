@unless($breadcrumbs->isEmpty())
    <nav class="flex items-center gap-2 text-sm text-base-content/50 mb-6">
        @foreach($breadcrumbs as $breadcrumb)
            @if($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="hover:text-primary transition">
                    {{ $breadcrumb->title }}
                </a>
                <span>/</span>
            @else
                <span class="text-base-content/70">{{ $breadcrumb->title }}</span>
            @endif
        @endforeach
    </nav>
@endunless
