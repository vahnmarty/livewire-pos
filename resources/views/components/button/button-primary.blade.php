@if($size == 'sm')
<button
    type="button"
    {{ $attributes }}
    class="inline-flex justify-center px-3 py-1 ml-3 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    {{ $slot }}
</button>
@elseif($size == 'lg')
<button
    type="button"
    {{ $attributes }}
    class="inline-flex justify-center px-6 py-3 ml-3 text-xs font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    {{ $slot }}
</button>
@else
<button
    type="button"
    {{ $attributes }}
    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
>
    {{ $slot }}
</button>
@endif