@extends('app')

@section('content')
    <div class="container">
        <h1>Yeni Eğitim Seviyesi Ekle</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('educationLevels.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Başlık</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Ekle</button>
        </form>
    </div>
@endsection
