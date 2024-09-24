<x-guest-layout>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4"> <!-- Reduced padding -->
                                <h2 class="text-uppercase text-center mb-4">Create an account</h2> <!-- Reduced margin-bottom -->

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="form-outline mb-3"> <!-- Reduced margin-bottom -->
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-outline mb-3"> <!-- Reduced margin-bottom -->
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="username" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="form-outline mb-3"> <!-- Reduced margin-bottom -->
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-outline mb-3"> <!-- Reduced margin-bottom -->
                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control form-control-lg"
                                            name="password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-3"> <!-- Reduced margin-bottom -->
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required />
                                        <label class="form-check-label" for="form2Example3cg">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                            {{ __('Register') }}
                                        </button>
                                    </div>

                                    <p class="text-center text-muted mt-4 mb-0">Have already an account?
                                        <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
