<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- font awsome icons  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased">
    <header class="header-area header-sticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <!-- Logo at the left end -->
                            <a href="{{ url('/') }}" class="custom-logo">
                                <img src="/assets/images/logo.png" alt="Mexant Logo" class="logo">
                            </a>

                            <!-- Toggler/collapsible button for mobile -->
                            <button class="navbar-toggler" type="button" id="navbarToggle" aria-label="Toggle navigation">
                                <i class="fas fa-bars text-white"></i> <!-- Font Awesome Hamburger Icon -->
                            </button>
                            <!-- Collapsible content -->
                            <div class="navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ms-auto align-items-center">
                                    @if (request()->is('/'))
                                    <li class="nav-item"><a href="#about" class="custom-sub-link">About Us</a></li>
                                    <li class="nav-item"><a href="#services" class="custom-sub-link">Our Services</a></li>
                                    <li class="nav-item"><a href="#testimonials" class="custom-sub-link">Testimonials</a></li>
                                    <li class="nav-item">
                                @endif

                                        @guest
                                            <a href="{{ url('/login') }}" class="custom-nav-link text-white btn">Login</a>
                                        @endguest
                                        @if (Auth::check() && Auth::user()->role === 'admin')
                                            <a href="{{ url('/admin') }}" class="custom-nav-link">Admin Dashboard</a>
                                        @endif
                                        @if (Auth::check() && Auth::user()->role === 'user')
                                            <a href="{{ url('/dashboard') }}" class="custom-nav-link">User Dashboard</a>
                                        @endif
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary text-white ms-2" href="{{url('/register')}}">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("navbarToggle");
    const navbarNav = document.getElementById("navbarNav");

    // Add click event listener to the toggle button
    toggleButton.addEventListener("click", function () {
        // Toggle the 'show' class to manage visibility
        navbarNav.classList.toggle("show");
    });

    // Optional: Close the navbar when a link is clicked (for mobile view)
    const navLinks = document.querySelectorAll(".navbar-nav .nav-item a");
    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            if (navbarNav.classList.contains("show")) {
                navbarNav.classList.remove("show");
            }
        });
    });
});

    </script>



    <div class="">
        {{ $slot }}
    </div>
    </div>
</body>
<script>
  // Wait for the DOM to fully load


</script>

</html>
