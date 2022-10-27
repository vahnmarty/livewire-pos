<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'Admin')</title>

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
    <body class="h-full">
        <div>
            @include('includes.sidebar.mobile')
            @include('includes.sidebar.desktop')
            <div class="flex flex-col md:pl-64">
                @include('includes.navbar')

                <main class="flex-1">
                    <div class="py-6">
                        <x-alert-errors/>
                        @yield('content')
                        {{ $slot ?? "" }}
                    </div>
                </main>
            </div>
        </div>

        @stack('modals')

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <script
            type="text/javascript"
            charset="utf8"
            src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"
        ></script>

        <script>
            $(document).ready(function () {
                $(".table-datatable").DataTable();
            });
        </script>
        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
        <x-livewire-alert::scripts />

        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash />

        @include('includes.listeners')
    </body>
</html>
