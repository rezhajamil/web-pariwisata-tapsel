<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" /> --}}
    @yield('style')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b2ba1193ce.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        @yield('content')
    </div>
    @yield('scripts')
    <script>
        $(document).ready(function() {
            const toggleSearch = () => {
                $("#searchInput").toggleClass("hidden");
            };

            const mdOptionsToggle = () => {
                $("#md-searchbar").toggleClass("hidden").toggleClass("flex");
            };

            const openMenu = () => {
                $("#mobile-menu").removeClass("hidden");
            };

            const closeMenu = () => {
                $("#mobile-menu").addClass("hidden");
            };

            $("#btn-wisata").click(function() {
                $("#drop-wisata").toggleClass("hidden");
            })

            $("#close-menu").click(function() {
                $("#mobile-menu").toggleClass('hidden');
            })

            $("#open-menu").click(function() {
                $("#mobile-menu").toggleClass('hidden');
            })

            @yield('jquery')
        });
    </script>
</body>

</html>
