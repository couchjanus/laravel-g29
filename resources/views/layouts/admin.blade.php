<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

            .font-family-karla { font-family: karla; }
            .bg-sidebar { background: #3957F9; }
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: #1947ee; }
            .nav-item:hover { background: #1947ee; }
            .account-link:hover { background: #3d68ff; }

        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-gray-100 font-family-karla flex">

        @include('admin.partials.aside')

        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <!-- Page Navigation -->
            @livewire('navigation-menu')
            <!-- Page Content -->
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    <!-- Page Heading -->
                    @if (isset($header))
                        {{ $header }}
                    @endif

                     <!-- Page Content -->
                    {{ $slot }}

                </main>

                <x-admin.footer />
            </div>
        </div>

        @stack('modals')

        @livewireScripts
                <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    </body>
</html>
