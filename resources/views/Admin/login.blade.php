<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Additional CSS Files -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-574-mexant.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<style>
    .body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        background-color: #1e1e2f;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        width: 400px;
        padding: 20px;
        background-color: #2c2c3e;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #3e3e54;
        color: #fff;
        margin-bottom: 15px;
        font-size: 16px;
    }

    input[type="email"]::placeholder,
    input[type="password"]::placeholder {
        color: #b3b3b3;
    }

    .error {
        color: #ff5c5c;
        font-size: 12px;
        margin-bottom: 10px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #1976d2;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #005bb5;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="body">
        <div class="login-container">
            <h3>Admin Login</h3>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        autofocus />
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required />
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Error Messages -->
                @error('record')
                    <p class="error">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
