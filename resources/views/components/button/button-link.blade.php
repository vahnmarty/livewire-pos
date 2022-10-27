

<a
    {{ $attributes }}
    class="inline-flex justify-center px-3 py-1 ml-3 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm cursor-pointer hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    {{ $slot }}

    <x-heroicon-s-link class="w-4 h-4" />
</a>