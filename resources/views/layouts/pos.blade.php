<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'POS')</title>

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"
        />
    </head>
    <body class="h-full bg-gray-100">
        <div class="h-screen bg-gray-100 max-w-7xl lg:px-8">
            <div class="flex h-screen">
                <div class="px-8 py-8 bg-gray-100 h-100">
                    <div class="pb-4 mb-8 border-b">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block w-auto h-10 text-gray-600 fill-current" />
                        </a>
                    </div>
                    <div class="flex flex-col">
                        <a href="#" class="flex flex-col items-center justify-center block text-center">
                            <x-heroicon-s-home class="w-8 h-8 text-gray-600"/>
                            <p class="text-sm">Home</p>
                        </a>
                    </div>
                </div>
                <main class="flex-1 max-h-screen py-3 overflow-hidden">
                    <div class="py-6 bg-gray-200 rounded-lg ">
                        {{ $slot ?? "" }}
                    </div>
                </main>
            </div>
        </div>

        @stack('modals')

        
        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        @include('includes.listeners')
    </body>
</html>
