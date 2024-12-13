@extends('layoutes.main')

@section('content')
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .signup-container {
            min-height: 100vh;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: none;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-image: linear-gradient(to right, #4e73df 0%, #224abe 100%);
        }
        .form-control {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .btn-signup {
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-signup:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .input-group {
            transition: all 0.3s ease;
        }
        .input-group:focus-within {
            transform: translateY(-2px);
        }
    </style>
    
    <div class="container-fluid px-0" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
        <div class="row g-0 signup-container align-items-center">
            <!-- Left Section -->
            <div class="col-md-6 d-none d-md-block">
                <div class="p-5 text-white text-center">
                    <h1 class="display-4 mb-4">Create Your Account</h1>
                    <p class="lead mb-5">
                        Join our platform and start your journey today.
                    </p>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('images/Signup-Icon.png') }}" 
                             alt="Signup Illustration" 
                             class="img-fluid" 
                             style="max-width: 300px; transition: transform 0.3s ease;">
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center px-4 px-md-5">
                <div class="w-100" style="max-width: 450px;">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header text-white d-flex justify-content-between align-items-center py-3">
                            <h4 class="mb-0">
                                <i class="fas fa-user-plus me-2"></i> Sign Up for an Account
                            </h4>
                        </div>
                        <div class="card-body p-5">
                            <form method="POST" action="" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="form-label text-muted">Full Name</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control form-control-lg ps-0 @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               placeholder="Enter your full name" 
                                               value="{{ old('name') }}" 
                                               required 
                                               autocomplete="name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label text-muted">Email Address</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input type="email" 
                                               class="form-control form-control-lg ps-0 @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email" 
                                               placeholder="Enter your email" 
                                               value="{{ old('email') }}" 
                                               required 
                                               autocomplete="email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label text-muted">Password</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control form-control-lg ps-0 @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               placeholder="Create your password" 
                                               required 
                                               autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label text-muted">Confirm Password</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input type="password" 
                                               class="form-control form-control-lg ps-0 @error('password_confirmation') is-invalid @enderror" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               placeholder="Confirm your password" 
                                               required 
                                               autocomplete="new-password">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-signup">
                                        <i class="fas fa-user-plus me-2"></i>Sign Up
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-muted">
                                        Already have an account? 
                                        <a href="" class="text-primary fw-bold">Login here</a>
                                    </p>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <a href="" class="btn btn-outline-primary">
                                    <i class="fas fa-home me-2"></i>Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .btn-outline-primary {
        background-color: #fff;
        color: #2575fc;
        border-color: #2575fc;
        transition: all 0.3s ease;
        border-radius: 8px;
    }
    .btn-outline-primary:hover {
        background-color: #2575fc;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.input-group').style.transform = 'translateY(-2px)';
            });
            input.addEventListener('blur', function() {
                this.closest('.input-group').style.transform = 'translateY(0)';
            });
        });

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