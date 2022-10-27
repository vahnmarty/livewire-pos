<header x-data="{ scrolled: false }"
    x-on:scroll.window="scrolled = this.scrollY > 50"
    :class="scrolled ? 'bg-gray-900 py-3' : 'bg-transparent py-6'"
     class="fixed top-0 left-0 right-0 z-10 text-white">
    <div class="px-8 mx-auto max-w-7xl">
        <div class="flex justify-between">
            <div class="self-center">
                <img src="img/logo-white.jpeg" class="w-auto" alt="" :class="scrolled ? 'h-8' : 'h-16'">
            </div>
            <div>
                <nav x-show="!scrolled" class="flex justify-end mb-4">
                    <div class="flex gap-8">
                        <a href="" class="inline-flex items-center gap-2 text-xs">
                            <x-heroicon-s-envelope class="w-3 h-3"/>
                            <span>thegoldenheartsiligan@gmail.com</span>
                        </a>
                        <a href="" class="inline-flex items-center gap-2 text-xs">
                            <x-heroicon-s-phone class="w-3 h-3"/>
                            <span>(063) 222-2222</span>
                        </a>
                        <a href="" class="inline-flex items-center gap-2 text-xs">
                            <x-heroicon-o-device-phone-mobile class="w-3 h-3"/>
                            <span>(+63) 0917-111-5555</span>
                        </a>
                    </div>
                </nav>
                <nav>
                    <div class="flex items-center justify-end gap-8">
                        <a href="" class="text-sm font-bold uppercase">Home</a>
                        <a href="" class="text-sm font-bold uppercase">About</a>
                        <a href="" class="text-sm font-bold uppercase">Programs</a>
                        <a href="" class="text-sm font-bold uppercase">Contact Us</a>
                        <a href="" class="text-sm font-bold uppercase">FAQ</a>
                        <a href="" class="text-sm font-bold uppercase">News</a>
                        <div class="flex items-center justify-center gap-4">
                            <a href="{{ url('login') }}" class="flex items-center justify-center px-4 py-1 text-base font-medium text-white bg-transparent border-2 border-white rounded-full shadow-sm hover:bg-amber-50 hover:text-amber-500 sm:px-8">Log In</a>
                  <a href="#" class="flex items-center justify-center px-4 py-1 text-base font-medium text-white border border-transparent rounded-full shadow-sm bg-amber-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">Register Now</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
   
</header>