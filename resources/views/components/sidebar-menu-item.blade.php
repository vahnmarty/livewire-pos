<span>
    @if(request()->is($link))
    <a
        href="{{ url($link) }}"
        class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group"
    >
        {{ $slot }}</a
    >
    @else

    <a
        href="{{ url($link) }}"
        class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group"
    >
        {{ $slot }}
    </a>

    @endif
</span>
