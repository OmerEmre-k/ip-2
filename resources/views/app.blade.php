<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İş Başvuru Uygulaması</title>

    <!-- Bootstrap 5 CSS Bağlantısı -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-4 mb-5">
        <a class="navbar-brand" href="#">İş Başvuru Sistemi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Ana Sayfa</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
    <footer class="text-center mt-5 py-4 bg-light">
        <p>&copy; 2024 İş Başvuru Sistemi</p>
    </footer>
</div>

<!-- Bootstrap JS Bağlantıları -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
