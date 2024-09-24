<x-guest-layout >

    <style>
        .form-control {
    border: 1px solid #007bff; /* Primary color border */
    border-radius: 10px; /* Rounded corners for input fields */
}

.form-control:focus {
    border-color: #0056b3; /* Darker blue when focused */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Shadow effect on focus */
}

.btn-primary {
    background-color: #007bff; /* Primary button color */
    border-color: #007bff; /* Border color to match */
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
    </style>
    <section class="vh-100" style="background-color: #f8f9fa; "> <!-- Light background for contrast -->
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 1.5rem;"> <!-- Slightly larger border-radius -->
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-4" style="color: #007bff;">Sign in</h3> <!-- Changed title color -->

                            <!-- Laravel Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label" for="remember_me">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>

                                <!-- Submit Button and Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #007bff;"> <!-- Link color -->
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 30px;"> <!-- Rounded button -->
                                        {{ __('Log in') }}
                                    </button>
                                </div>
                            </form>
                            <!-- End of Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>

