<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nusantara Market - Daftar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Poppins', sans-serif;
        }
        .signup-container {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            color: white;
        }
        .form-control {
            border-radius: 25px;
            padding: 10px 15px;
        }
        .btn-signup {
            border-radius: 25px;
            padding: 10px 20px;
            background-color: #ffc107;
            color: #000;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-signup:hover {
            background-color: #ffca28;
            transform: translateY(-3px);
        }
        .decorative-element {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 position-relative">
                <!-- Decorative Elements -->
                <div class="decorative-element" style="width: 100px; height: 100px; top: -50px; left: -50px;"></div>
                <div class="decorative-element" style="width: 200px; height: 200px; bottom: -100px; right: -100px;"></div>
                
                <div class="signup-container p-5 position-relative">
                    <div class="text-center mb-4">
                        <h2>Bergabung di Nusantara Market</h2>
                        <p class="text-light">Platform Produk Lokal Terbaik</p>
                    </div>
                    
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="tel" class="form-control" name="phone" placeholder="Nomor Telepon" required>
                        </div>
                        
                        <div class="mb-3">
                            <textarea class="form-control" name="address" placeholder="Alamat Lengkap" rows="3" required></textarea>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerm" required>
                            <label class="form-check-label" for="agreeTerm">Saya setuju dengan syarat & ketentuan</label>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-signup">Daftar Sekarang</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p class="small">Sudah punya akun? <a href="" class="text-warning">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>