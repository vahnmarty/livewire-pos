<div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white shadow">
    <button type="button" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
      <span class="sr-only">Open sidebar</span>
      <!-- Heroicon name: outline/menu-alt-2 -->
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
      </svg>
    </button>
    <div class="flex justify-between flex-1 px-4">
      <div class="flex items-center">
        <h3>{{ $page_title ?? 'Dashboard' }}</h3>
      </div>
      <div>
        @include('layouts.navigation')
      </div>
    </div>
  </div>