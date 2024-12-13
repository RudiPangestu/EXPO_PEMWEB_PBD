<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna Marketplace</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: rgb(39, 19, 19);
            --secondary-color: #2ecc71;
            --background-light: #f7f9fc;
            --text-dark: rgb(39, 19, 19);
            --card-bg: #ffffff;
        }

        body {
            background-color: var(--background-light);
            font-family: 'Inter', 'Arial', sans-serif;
            color: rgb(39, 19, 19);
        }

        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), #5b3cc4);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .profile-avatar {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .profile-card {
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        .section-title {
            color: rgb(39, 19, 19);
            border-bottom: 2px solid rgb(39, 19, 19);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .quick-stats {
            display: flex;
            justify-content: space-between;
            background-color: var(--background-light);
            border-radius: 10px;
            padding: 15px;
        }

        .stat-item {
            text-align: center;
            color: rgb(39, 19, 19);
        }

        .nav-custom {
            flex-direction: column;
        }

        .nav-custom .nav-link {
            color: rgb(39, 19, 19);
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .nav-custom .nav-link:hover,
        .nav-custom .nav-link.active {
            background-color: rgb(39, 19, 19);
            color: white;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f1f3f5;
            transition: background-color 0.3s ease;
            color: rgb(39, 19, 19);
        }

        .order-item:hover {
            background-color: #f9f9f9;
        }

        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card .card-text {
            color: rgb(39, 19, 19);
        }

        .profile-container a {
            color: rgb(39, 19, 19);
        }

        .profile-container a:hover {
            color: rgb(59, 29, 29);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('images/user-avatar.jpg') }}" alt="Foto Profil" class="profile-avatar mb-3">
                </div>
                <div class="col-md-9">
                    <h1 class="mb-2">Muhammad Rizki Pratama</h1>
                    <p class="mb-3">Pembeli Aktif | Bergabung sejak Januari 2023</p>
                    <div>
                        <button class="btn btn-light me-2">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </button>
                        <button class="btn btn-outline-light">
                            <i class="fas fa-cog me-2"></i>Pengaturan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <h4 class="section-title">Statistik Pengguna</h4>
                    <div class="quick-stats mb-3">
                        <div class="stat-item">
                            <h5>25</h5>
                            <small>Total Pesanan</small>
                        </div>
                        <div class="stat-item">
                            <h5>20</h5>
                            <small>Selesai</small>
                        </div>
                        <div class="stat-item">
                            <h5>5</h5>
                            <small>Proses</small>
                        </div>
                    </div>

                    <nav class="nav nav-custom">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-shopping-bag me-2"></i>Daftar Pesanan
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fas fa-star me-2"></i>Ulasan Saya
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fas fa-heart me-2"></i>Produk Favorit
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fas fa-cogs me-2"></i>Pengaturan Akun
                        </a>
                    </nav>
                </div>
            </div>

            <div class="col-md-8">
                <div class="profile-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="section-title mb-0">Riwayat Pesanan</h4>
                        <a href="#" class="text-primary">Lihat Semua</a>
                    </div>

                    <div class="order-list">
                        <div class="order-item">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Pesanan #INV-2024-001</h6>
                                <small class="text-muted">14 Des 2024 | 3 Produk</small>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-success">Selesai</span>
                                <strong class="ms-2">Rp 250.000</strong>
                            </div>
                            <button class="btn btn-sm btn-outline-primary ms-3">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="order-item">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Pesanan #INV-2024-002</h6>
                                <small class="text-muted">10 Des 2024 | 2 Produk</small>
                            </div>
                            <div class="ms-auto">
                                <span class="badge bg-warning">Proses</span>
                                <strong class="ms-2">Rp 150.000</strong>
                            </div>
                            <button class="btn btn-sm btn-outline-primary ms-3">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="profile-card mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="section-title mb-0">Produk Favorit</h4>
                        <a href="#" class="text-primary">Lihat Semua</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-card card mb-3">
                                <img src="{{ asset('images/product-placeholder.jpg') }}" class="card-img-top" alt="Produk">
                                <div class="card-body">
                                    <small class="text-muted">Elektronik</small>
                                    <h6 class="card-title mb-1">Smartphone Canggih</h6>
                                    <p class="card-text text-primary fw-bold">Rp 3.500.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card card mb-3">
                                <img src="{{ asset('images/product-placeholder.jpg') }}" class="card-img-top" alt="Produk">
                                <div class="card-body">
                                    <small class="text-muted">Fashion</small>
                                    <h6 class="card-title mb-1">Jaket Musim Dingin</h6>
                                    <p class="card-text text-primary fw-bold">Rp 750.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card card mb-3">
                                <img src="{{ asset('images/product-placeholder.jpg') }}" class="card-img-top" alt="Produk">
                                <div class="card-body">
                                    <small class="text-muted">Olahraga</small>
                                    <h6 class="card-title mb-1">Sepatu Running</h6>
                                    <p class="card-text text-primary fw-bold">Rp 1.250.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>