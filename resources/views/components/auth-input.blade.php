@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
])

<div class="flex flex-col gap-2">

    <label for="{{ $name }}" class="text-sm text-base-content/70">
        {{ $label }}
    </label>

    <input
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($type !== 'password') value="{{ old($name) }}" @endif
        class="input input-bordered w-full rounded-md transition-all duration-300 focus:border-primary focus:outline-none
        {{ $errors->has($name) ? 'input-error' : '' }}"
    />

    @error($name)
    <span class="text-error text-sm">{{ $message }}</span>
    @enderror

</div>
