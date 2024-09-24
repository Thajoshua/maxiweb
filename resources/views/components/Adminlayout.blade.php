<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/css/Adminstyle.css', 'resources/js/Admin.js'])

    </head>
</head>

<body>

    <!-- In your layout file -->


    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Asmr</span>Prog</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class='fas fa-tachometer-alt'></i> Dashboard</a></li>
            <li><a href="{{ route('admin.users') }}"><i class="fa-solid fa-user"></i> User</a></li>
            <li class=""><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>

            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu sm">


            <form method="POST" class="logout" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <span style="color: red">Log Out</span>
                </x-dropdown-link>
            </form>

        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='fas fa-bars'></i> <!-- Replaced bx-menu with Font Awesome icon -->
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='fas fa-search'></i></button> <!-- Replaced bx-search with Font Awesome icon -->
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='fas fa-bell'></i> <!-- Replaced bx-bell with Font Awesome icon -->
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>


        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>{{ $heading }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">{{ $heading }}</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    {{-- <form action="{{ route('admin.generate.pin', $users->id) }}" method="POST">
                        @csrf --}}
                        <button type="submit">Generate Pin</button>
                    {{-- </form> --}}
                </a>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


            {{ $slot }}
        </main>

    </div>
</body>

</html>
