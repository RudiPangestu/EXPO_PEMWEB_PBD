<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Marketplace Pengrajin Lokal - Product Management" />
    <meta name="author" content="TPI" />
    <title>Marketplace Pengrajin Lokal</title>
    <base href="/#">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    
    <!-- Custom Styles -->
    <link href="/css/styles.css" rel="stylesheet" />
    
    <!-- Dark Mode Toggle CSS -->
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        body.dark-mode .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }
        body.dark-mode .table {
            color: #e0e0e0;
        }
        .mode-toggle {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .mode-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ route('product.index') }}">
                <i class="fas fa-store me-2"></i>Marketplace Pengrajin Lokal
            </a>
            <div class="d-flex align-items-center">
                <!-- Dark Mode Toggle -->
                <div class="mode-toggle me-3" id="darkModeToggle" title="Toggle Dark Mode">
                    <i class="fas fa-moon" id="darkModeIcon"></i>
                </div>
                
                <!-- User Profile Dropdown -->
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> --}}

    <div class="main-logo" style="position: fixed; top: 0; left: 0; padding: 20px;">
        <a href="#">
            <img src="images/logoW.png" alt="logo" class="img-fluid w-25">
        </a>
    </div>

    <div id="content">
        <main>
            @yield('content')
        </main>

        {{-- <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Nelson Richie Richardo - 2331038</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- Dark Mode Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const darkModeIcon = document.getElementById('darkModeIcon');
            const savedMode = localStorage.getItem('darkMode');

            if (savedMode === 'enabled') {
                document.body.classList.add('dark-mode');
                darkModeIcon.classList.replace('fa-moon', 'fa-sun');
            }

            darkModeToggle.addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
                
                if (document.body.classList.contains('dark-mode')) {
                    localStorage.setItem('darkMode', 'enabled');
                    darkModeIcon.classList.replace('fa-moon', 'fa-sun');
                } else {
                    localStorage.setItem('darkMode', null);
                    darkModeIcon.classList.replace('fa-sun', 'fa-moon');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>