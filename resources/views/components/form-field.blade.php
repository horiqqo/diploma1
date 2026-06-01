@props(['label', 'error' => null])

<div class="flex flex-col gap-2">
    <label class="font-medium">{{ $label }}</label>
    <div class="{{ $error ? 'ring-1 ring-error rounded-lg' : '' }}">
        {{ $slot }}
    </div>
    @if($error)
        <span class="text-error text-sm">{{ $error }}</span>
    @endif
</div>
