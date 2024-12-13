@extends('layoutes.main')

@section('content')
    <div class="container-fluid px-0" style="height: 100vh; display: flex; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
        <!-- Left Section -->
        <div class="d-none d-md-flex flex-column justify-content-center align-items-center col-md-6 text-white" style="background: url('{{ asset('images/background-pattern.png') }}') no-repeat center/cover;">
            <h1 class="fw-bold display-4 mb-3">Create Your Account</h1>
            <p class="lead text-center">Join our platform and start your journey today!</p>
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
                                        <a href="{{ route('login') }}" class="text-primary fw-bold">Login here</a>
                                    </p>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <a href="" class="btn btn-outline-primary">
                                    <i class="fas fa-home me-2"></i>Home
                                </a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-primary"></i>
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
                                    <i class="fas fa-lock text-primary"></i>
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
                                    <i class="fas fa-lock text-primary"></i>
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
                            <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 8px;">
                                <i class="fas fa-user-plus me-2"></i>Sign Up
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="small text-muted">Already have an account? <a href="" class="fw-bold text-primary">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #4e73df;
    }
    .btn-primary {
        background-color: #4e73df;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #375a7f;
        transform: translateY(-2px);
    }
</style>
@endpush

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