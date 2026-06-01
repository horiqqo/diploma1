@props(['name'])

<div class="flex items-center gap-3">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        {{ old($name) ? 'checked' : '' }}
        class="checkbox checkbox-primary rounded-md mt-1"
    >
    <label for="{{ $name }}" class="text-sm text-base-content/70 cursor-pointer">
        {{ $slot }}
    </label>
</div>
