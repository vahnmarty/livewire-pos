<label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
    {{ $slot }}
    @if($required)<x-required/>@endif
</label>