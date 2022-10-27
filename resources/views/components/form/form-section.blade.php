<section x-data="{ isOpen: true }" class="bg-gray-50">
    <div class="flex px-4 py-2 cursor-pointer bg-gray-50 hover:bg-gray-200" 
        @click="isOpen = !isOpen">
        <x-heroicon-s-chevron-right class="w-6 h-6 text-gray-900"/>
        <span class="font-bold">{{ $title ?? '' }}</span>
    </div>
    <div x-show="isOpen" class="px-6 py-3 space-y-2 bg-white">
        {{ $slot }}
    </div>
</section>