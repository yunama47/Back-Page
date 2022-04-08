<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin </title>
    <!-- Scripts -->
    <script src="{{ mix('js/AdminApp.js') }}" defer="defer"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/27aa344f69.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link:active {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-blue-700 px-2 hidden sm:flex">
            <div class="w-1/4 ml-3">
                <a href="/admin" class="text-white no-underline text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            </div>
            <div x-data="{ isOpen: false }" class="w-3/4 justify-end items-center flex flex-row">
                <div class="px-5 text-white text-md">{{ Auth::user()->name }}</div>
                <form method="POST" class="hover:bg-red-400 p-2 rounded-md" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-white text-md" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>
                <!-- </div> -->
        </header>
        <div id="admin"></div>
    </div>
</body>

</html>