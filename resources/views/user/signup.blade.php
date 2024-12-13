@extends('layoutes.main')
@push('styles')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #4e73df;
    }
    .btn-brown {
        background-color: #7c1b00;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-brown:hover {
        background-color: #375a7f;
        transform: translateY(-2px);
    }
    .btn-brown {
        background-color: #8B4513; /* Warna coklat SaddleBrown */
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-brown:hover {
        background-color: #A0522D; /* Warna coklat yang sedikit lebih terang */
        transform: translateY(-2px);
    }
    .text-brown {
        color: #8B4513 !important;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid px-0" style="height: 100vh; display: flex; background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(49, 21, 21, 0.8) 100%), url('{{ asset('images/brownbg.jpg') }}'); background-size: cover; background-position: center;">
        <!-- Left Section -->
        <div class="d-none d-md-flex flex-column justify-content-center align-items-center col-md-6 text-white" style="background: url('{{ asset('images/background-pattern.png') }}') no-repeat center/cover;">
            <h1 class="fw-bold display-4 mb-3">Create Your Account</h1>
            <p class="lead text-center">Join our platform and start your journey today!</p>
        </div>

            <!-- Right Section -->
        <div class="d-flex flex-column justify-content-center align-items-center col-md-6 px-4 px-md-5 bg-white">
            <div class="card border-0 w-100" style="max-width: 400px; border-radius: 12px;">
                <div class="card-body py-5 px-4">
                    <h3 class="fw-bold text-center mb-4">Sign Up for an Account</h3>
                    <form method="POST" action="" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-brown" style="color: rgb(39, 19, 19)"></i>
                                </span>
                                <input type="text" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Enter your full name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-brown" style="color: rgb(39, 19, 19);"></i>
                                </span>
                                <input type="email" 
                                       class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       placeholder="Enter your email" 
                                       value="{{ old('email') }}" 
                                       required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-brown"style="color: rgb(39, 19, 19);"></i>
                                </span>
                                <input type="password" 
                                       class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Create your password" 
                                       required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-brown"style="color: rgb(39, 19, 19);"></i>
                                </span>
                                <input type="password" 
                                       class="form-control border-start-0 @error('password_confirmation') is-invalid @enderror" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Confirm your password" 
                                       required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-brown btn-lg" style="border-radius: 8px;  background-color: rgb(39, 19, 19); color:white; padding: 0.8rem; font-size: 1.2rem;">
                                <i class="fas fa-user-plus me-2"style="color: rgb(39, 19, 19);"></i>Sign Up
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="small text-muted">Already have an account? <a href="{{ route('login') }}" class="fw-bold text-brown"style="color: rgb(39, 19, 19);">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection



@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Custom form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    });
</script>
@endpush