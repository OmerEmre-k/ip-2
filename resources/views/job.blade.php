<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Detayları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-3">{{ $job['title'] }}</h1>

    <p class="lead">{{ $job['description'] }}</p>

    <a href="{{ route('job.apply', ['id' => $job['id']]) }}" class="btn btn-success btn-lg">Başvuru Yap</a>

    <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">Geri Dön</a>
</div>

<!-- Bootstrap JS ve Popper.js Linkleri -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
