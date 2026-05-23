@props(['name'])

<div class="flex items-center gap-3">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        class="checkbox checkbox-primary rounded-md mt-1"
    >
    <label for="{{ $name }}" class="text-sm text-base-content/70 cursor-pointer">
        {{ $slot }}
    </label>
</div>
