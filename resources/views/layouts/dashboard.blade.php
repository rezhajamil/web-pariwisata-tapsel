<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Dashboard</title>
    <!--     Fonts and icons     -->
    <link rel="icon" href="{{ asset('images/logo-1.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.4') }}" rel="stylesheet" />

    <script src="{{ asset('js/trix.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b2ba1193ce.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @isset($plain)
        @yield('content')
    @else
        @auth
            <!-- sidenav  -->
            <aside
                class="max-w-62.5 shadow-soft-xl ease-nav-brand bg-gradient-to-tl from-purple-700 from-80% !to-pink-600 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
                <div class="h-19.5">
                    {{-- <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
                    sidenav-close></i> --}}
                    <a class="block px-8 py-6 m-0 text-lg text-white whitespace-nowrap"
                        href="{{ route('admin.dashboard.index') }}" target="_blank">
                        <span class="block ml-1 font-semibold transition-all duration-200 ease-nav-brand">Dashboard</span>
                        <span class="block ml-1 font-semibold transition-all duration-200 ease-nav-brand">Pariwisata
                            Tapsel</span>
                    </a>
                </div>

                <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

                <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                    <ul class="flex flex-col pl-0 mb-0">
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center font-semibold whitespace-nowrap rounded-lg px-4 transition-colors @if (request()->segment(2) == 'dashboard') bg-white text-slate-700 @else text-white @endif"
                                href="{{ route('admin.dashboard.index') }}">
                                <div
                                    class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 @if (request()->segment(2) == 'dashboard') bg-gradient-to-tl from-purple-700 to-pink-500  @else  bg-white @endif">
                                    <i
                                        class="fa-solid fa-house @if (request()->segment(2) == 'dashboard') text-white @else text-slate-700 @endif"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                            </a>
                        </li>
                        {{-- 
                    <li class="w-full mt-4">
                        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Destinasi</h6>
                    </li> --}}

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center font-semibold whitespace-nowrap px-4 rounded-lg transition-colors @if (request()->segment(2) == 'destination') bg-white text-slate-700 @else text-white @endif"
                                href="{{ route('admin.destination.index') }}">
                                <div
                                    class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 @if (request()->segment(2) == 'destination') bg-gradient-to-tl from-purple-700 to-pink-500  @else  bg-white @endif">
                                    <i
                                        class="fa-solid fa-mountain-sun @if (request()->segment(2) == 'destination') text-white @else text-slate-700 @endif"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                    Daftar Destinasi
                                </span>
                            </a>
                        </li>

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center font-semibold whitespace-nowrap px-4 rounded-lg transition-colors @if (request()->segment(2) == 'destination_type') bg-white text-slate-700 @else text-white @endif"
                                href="{{ route('admin.destination_type.index') }}">
                                <div
                                    class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 @if (request()->segment(2) == 'destination_type') bg-gradient-to-tl from-purple-700 to-pink-500  @else  bg-white @endif">
                                    <i
                                        class="fa-solid fa-mountain @if (request()->segment(2) == 'destination_type') text-white @else text-slate-700 @endif"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                    Daftar Tipe Destinasi
                                </span>
                            </a>
                        </li>

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center font-semibold whitespace-nowrap px-4 rounded-lg transition-colors @if (request()->segment(2) == 'user') bg-white text-slate-700 @else text-white @endif"
                                href="{{ route('admin.user.index') }}">
                                <div
                                    class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 @if (request()->segment(2) == 'user') bg-gradient-to-tl from-purple-700 to-pink-500  @else  bg-white @endif">
                                    <i
                                        class="fa-solid fa-user @if (request()->segment(2) == 'user') text-white @else text-slate-700 @endif"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                                    Daftar User
                                </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </aside>
            <!-- end sidenav -->
        @endauth

        <main
            class="ease-soft-in-out @auth xl:ml-68.5 xl:pr-6 @endauth relative h-full max-h-screen rounded-xl transition-all duration-200">
            @auth
                <!-- Navbar -->
                <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
                    navbar-main navbar-scroll="true">
                    <div class="flex items-center justify-end w-full py-1 mx-auto space-x-4 flex-wrap-inherit">
                        <a href="{{ route('edit_password') }}"
                            class="px-3 py-2 font-semibold text-purple-700 transition-all rounded hover:underline">
                            <i class="mr-2 fa-solid fa-unlock-keyhole"></i>
                            Change Password
                        </a>
                        <a href="{{ route('logout') }}"
                            class="px-3 py-2 font-semibold text-white rounded bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="mr-2 fa-solid fa-right-from-bracket"></i>
                            Sign Out
                        </a>
                    </div>
                </nav>
            @endauth

            <!-- end Navbar -->

            @yield('content')
        </main>
        @include('components.footer')
    @endisset
    @yield('scripts')
</body>

</html>
