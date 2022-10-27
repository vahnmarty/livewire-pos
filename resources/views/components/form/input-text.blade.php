<input
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => ($invalid ? 'border-red-700 border-2 ' : '') . 'block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' . ' ' . ($disabled ? 'bg-gray-100 cursor-not-allowed' : '')]) }}
/>
