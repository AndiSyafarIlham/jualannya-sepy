@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-sepy-yellow">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-4 animate-card">
                <div class="card-header text-center bg-sepy-dark text-white rounded-top">
                    <h3 class="mb-0">{{ __('Login') }}</h3>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-sepy-yellow">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .bg-sepy-yellow {
        background-color: #ffcc00; /* Sepy brand yellow */
    }

    .bg-sepy-dark {
        background-color: #333; /* Dark background for the header */
    }

    .btn-sepy-yellow {
        background-color: #ffcc00; /* Sepy brand yellow */
        color: #fff;
        border: none;
        border-radius: 30px;
    }

    .btn-sepy-yellow:hover {
        background-color: #e6b800;
    }

    .animate-card {
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .card {
        border-radius: 15px;
    }

    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .form-control {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #ffcc00;
        box-shadow: 0 0 0 0.2rem rgba(255, 204, 0, 0.25);
    }

    .text-decoration-none {
        color: #ffcc00;
    }

    .text-decoration-none:hover {
        text-decoration: underline;
    }
</style>
@endsection
