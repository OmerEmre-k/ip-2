@extends('app')

@section('content')
    <div class="container">
        <h1>Eğitim Alanları</h1>
        <a href="{{ route('educationFields.create') }}" class="btn btn-primary">Yeni Eğitim Alanı Ekle</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
            <tr>
                <th>#</th>
                <th>Ad</th>
                <th>Aksiyonlar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fields as $field)
                <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>
                        <a href="{{ route('educationFields.edit', $field->id) }}" class="btn btn-warning">Düzenle</a>
                        <form action="{{ route('educationFields.destroy', $field->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bu eğitim alanını silmek istediğinizden emin misiniz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
