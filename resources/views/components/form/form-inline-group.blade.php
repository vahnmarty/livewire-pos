<div
    class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start"
>
    <x-form.label :required="$required">{{ $label }}</x-form.label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        {{ $slot }}
    </div>
</div>