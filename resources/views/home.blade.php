@extends('app')

@section('content')
    <!-- Bootstrap 5 CSS Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .job-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .job-card .card-body {
            flex-grow: 1;
        }
        .card {
            height: 100%;
        }
    </style>

    <div class="container">
        <h1 class="mt-4">İş İlanları</h1>
        <div class="row">
            @foreach ($jobs as $job)
                <div class="col-md-4 mb-4">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{{ \Str::limit($job->description, 150) }}</p> <!-- Kısa açıklama -->
                            <a href="{{ route('job.apply', $job->id) }}" class="btn btn-primary">Başvur</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap 5 JS ve Popper.js Linkleri -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection

