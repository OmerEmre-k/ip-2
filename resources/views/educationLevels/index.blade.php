@extends('app')

@section('content')
    <div class="container">
        <h1>Eğitim Seviyeleri</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('educationLevels.create') }}" class="btn btn-primary mb-3">Yeni Eğitim Seviyesi Ekle</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Başlık</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($levels as $level)
                <tr>
                    <td>{{ $level->id }}</td>
                    <td>{{ $level->title }}</td>
                    <td>
                        <a href="{{ route('educationLevels.edit', $level->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form action="{{ route('educationLevels.destroy', $level->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz? Bu işlem geri alınamaz.')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
