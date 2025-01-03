@extends('app')

@section('content')
    <div class="container">
        <h1>Yeni Eğitim Alanı Ekle</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('educationFields.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Eğitim Alanı Adı</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Eğitim Alanı Ekle</button>
        </form>
    </div>
@endsection
