@extends('layoutes.main')

@section('content')
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-image: linear-gradient(to right, #4e73df 0%, #224abe 100%);
        }
        .list-group-item {
            border-radius: 8px;
            margin: 5px 0;
            transition: all 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #f8f9fa;
            transform: translateX(10px);
        }
        .profile-avatar {
            transition: transform 0.3s ease;
        }
        .profile-avatar:hover {
            transform: scale(1.1);
        }
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .stat-card {
            border-radius: 12px;
            background-color: #f8f9fa;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
    
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-header text-white py-3">
                        <h5 class="card-title mb-0 d-flex align-items-center">
                            <i class="fas fa-bars me-2"></i> Navigation Menu
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="" class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="fas fa-tachometer-alt me-3"></i> Dashboard
                            </a>
                            <a href="{" class="list-group-item list-group-item-action active d-flex align-items-center">
                                <i class="fas fa-user me-3"></i> Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Profile Section -->
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-header text-white d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0">
                            <i class="fas fa-user me-2"></i> Profile Details
                        </h4>
                        <a href="" class="btn btn-light btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" 
                             class="rounded-circle shadow-lg mb-3 profile-avatar" 
                             style="width: 180px; height: 180px; object-fit: cover;" 
                             alt="User Avatar">
                        <h2 class="fw-bold mb-2">{{ $user->name }}</h2>
                        <p class="text-muted mb-4">{{ $user->email }}</p>
                    </div>
                </div>

                <!-- Product Statistics -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card stat-card border-0 text-center">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Products</h6>
                                <h4 class="fw-bold text-primary">{{ $products->count() }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card border-0 text-center">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Product Value</h6>
                                <h4 class="fw-bold text-success">
                                    Rp {{ number_format($products->sum('harga_jual'), 0, ',', '.') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stat-card border-0 text-center">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Unique Categories</h6>
                                <h4 class="fw-bold text-warning">
                                    {{ $products->unique('jenis')->count() }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your Products -->
                <div class="card border-0 shadow-lg">
                    <div class="card-header text-white d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0">
                            <i class="fas fa-box-open me-2"></i> Your Products
                        </h4>
                        <a href="" class="btn btn-light btn-sm shadow-sm">
                            <i class="fas fa-plus me-2"></i> Add New Product
                        </a>
                    </div>
                    <div class="card-body">
                        @if($products->isEmpty())
                            <div class="text-center py-4">
                                <p class="text-muted">You have not added any products yet.</p>
                            </div>
                        @else
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach($products as $product)
                                    <div class="col">
                                        <div class="card h-100 product-card">
                                            <img src="{{ $product->foto ? url('image/' . $product->foto) : url('image/nophoto.jpg') }}" 
                                                 class="card-img-top" 
                                                 style="height: 220px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;" 
                                                 alt="{{ $product->nama }}">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold mb-3">{{ $product->nama }}</h5>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <span class="text-success">
                                                        <i class="fas fa-tag me-2"></i>
                                                        Selling: Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                                    </span>
                                                    <span class="text-muted">
                                                        <i class="fas fa-cart-plus me-2"></i>
                                                        Cost: Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <p class="card-text text-muted small">
                                                    {{ Str::limit($product->deskripsi, 80) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes, Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection