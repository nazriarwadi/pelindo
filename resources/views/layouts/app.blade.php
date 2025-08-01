<!DOCTYPE html>
<html class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>@yield('title', 'Pelindo')</title>

    {{-- Script & Stylesheet --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500 h-full">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    {{-- ====================================================================== --}}
    {{-- BAGIAN SIDEBAR YANG DIPERBAIKI --}}
    {{-- ====================================================================== --}}
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
                href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo-ct.png') }}"
                    class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Pelindo</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        {{-- Daftar Menu Utama --}}
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                {{-- Menu Dashboard (selalu tampil) --}}
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 {{ request()->routeIs('dashboard') ? 'bg-blue-500/13 font-semibold text-slate-700' : '' }} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="{{ route('dashboard') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>

                {{-- Menu yang tampil berdasarkan role --}}
                @auth
                    {{-- Menu HANYA untuk role 'pelindo_pakning' --}}
                    @if (Auth::user()->role == 'pelindo_pakning')
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 {{ request()->routeIs('pengajuan.*') ? 'bg-blue-500/13 font-semibold text-slate-700' : '' }} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                                href="{{ route('pengajuan.index') }}">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-single-copy-04"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Buat Pengajuan</span>
                            </a>
                        </li>
                    @endif

                    {{-- Menu HANYA untuk role 'pelindo_dumai' --}}
                    @if (Auth::user()->role == 'pelindo_dumai')
                        <li class="mt-0.5 w-full">
                            {{-- Ganti 'permohonan.*' dengan nama rute Anda nanti --}}
                            <a class="py-2.7 {{-- request()->routeIs('permohonan.*') ? 'bg-blue-500/13 font-semibold text-slate-700' : '' --}} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                                href="#">
                                <div
                                    class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-archive-2"></i>
                                </div>
                                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Permohonan Masuk</span>
                            </a>
                        </li>
                    @endif

                    {{-- Menu Complete (tampil untuk semua role yang login) --}}
                    <li class="mt-0.5 w-full">
                        {{-- Ganti 'complete.*' dengan nama rute Anda nanti --}}
                        <a class="py-2.7 {{-- request()->routeIs('complete.*') ? 'bg-blue-500/13 font-semibold text-slate-700' : '' --}} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                            href="#">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-check-bold"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Complete</span>
                        </a>
                    </li>
                @endauth

                {{-- Bagian Account pages (tidak diubah) --}}
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account
                        pages</h6>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="#">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors">
                            <div
                                class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-user-run"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    {{-- Main content area --}}
    <main class="relative transition-all duration-200 ease-in-out xl:ml-68 rounded-xl flex flex-col min-h-screen">
        {{-- Navbar --}}
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">@yield('page_title', 'Dashboard')</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">@yield('page_heading', 'Dashboard')</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">

                    {{-- DIV UNTUK SEARCH BAR DIHAPUS DARI SINI --}}

                    {{-- Kelas 'md:ml-auto' ditambahkan di sini untuk mendorong <ul> ke kanan --}}
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full md:ml-auto">
                        <li class="flex items-center">
                            @auth
                                <a href="#"
                                    class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="hidden sm:inline">Sign In</span>
                                </a>
                            @endauth
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="w-full px-6 py-6 mx-auto flex-grow">
            @yield('content')
        </div>

        <footer class="pt-4 mt-auto">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="#" class="font-semibold text-slate-700 dark:text-white"
                                target="_blank">Progremer</a>
                            Pelindo.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
    @stack('scripts')
</body>

</html>
