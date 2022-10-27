<!--
      When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars
  
      Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
    -->
    <header x-data="{ isOpen: false }" 
        class="bg-white shadow-sm lg:static lg:overflow-y-visible"
        :class="isOpen ? 'fixed inset-0 z-40 overflow-y-auto' : '' "
        >
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
            <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
              <div class="flex items-center flex-shrink-0">
                <a href="#">
                  <img class="block w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=rose&shade=500" alt="Workflow">
                </a>
              </div>
            </div>
            <div class="flex-1 min-w-0 md:px-8 lg:px-0 xl:col-span-6">
              <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                <div class="w-full">
                  <label for="search" class="sr-only">Search</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <!-- Heroicon name: mini/magnifying-glass -->
                      <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input id="search" name="search" class="block w-full py-2 pl-10 pr-3 text-sm placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 sm:text-sm" placeholder="Search" type="search">
                  </div>
                </div>
              </div>
            </div>
            <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
              <!-- Mobile menu button -->
              <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center p-2 -mx-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!--
                  Icon when menu is closed.
    
                  Heroicon name: outline/bars-3
    
                  Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!--
                  Icon when menu is open.
    
                  Heroicon name: outline/x-mark
    
                  Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
              <p class="font-bold font-montserrat">
                ₱ {{ number_format(Auth::user()->balance(),2) }}
              </p>
              <a href="#" class="flex-shrink-0 p-1 ml-5 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </a>
              
              <!-- Profile dropdown -->
              <div class="relative flex-shrink-0 ml-5">
                <div>
                  <button type="button" class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </button>
                </div>
              </div>
    
              <a href="#" onclick="document.querySelector('#form_logout').submit()" class="inline-flex items-center px-4 py-2 ml-6 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"> Log out </a>
              <form action="{{ route('logout') }}" method="POST" id="form_logout" class="hidden">
                @csrf
              </form>
            </div>
          </div>
        </div>
    
        <!-- Mobile menu, show/hide based on menu state. -->
        <nav x-cloak x-show="isOpen" class="lg:hidden" aria-label="Global">
          <div class="max-w-3xl px-2 pt-2 pb-3 mx-auto space-y-1 sm:px-4">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->
            <a href="#" aria-current="page" class="block px-3 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md">Home</a>
    
            <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Popular</a>
    
            <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Communities</a>
    
            <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Trending</a>
          </div>
          <div class="pt-4 border-t border-gray-200">
            <div class="flex items-center max-w-3xl px-4 mx-auto sm:px-6">
              <div class="flex-shrink-0">
                <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </div>
              <div class="ml-3">
                <div class="text-base font-medium text-gray-800">Chelsea Hagon</div>
                <div class="text-sm font-medium text-gray-500">chelsea.hagon@example.com</div>
              </div>
              <button type="button" class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>
            </div>
            <div class="max-w-3xl px-2 mx-auto mt-3 space-y-1 sm:px-4">
              <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Your Profile</a>
    
              <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Settings</a>
    
              <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Sign out</a>
            </div>
          </div>
    
          <div class="max-w-3xl px-4 mx-auto mt-6 sm:px-6">
            <a href="#" onclick="document.querySelector('#form_logout').submit()" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-rose-600 hover:bg-rose-700"> Log out </a>
    
          </div>
        </nav>
      </header>