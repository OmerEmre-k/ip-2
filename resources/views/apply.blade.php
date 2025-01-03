@extends('app')

@section('content')
    <div class="container">
        <h1>{{ $job->title }} - Başvuru Formu</h1>
        <form action="{{ route('application.store', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefon</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Eğitim Durumu</label>
                <input type="text" class="form-control @error('education') is-invalid @enderror" id="education" name="education" required value="{{ old('education') }}">
                @error('education')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="resume" class="form-label">Özgeçmiş</label>
                <textarea class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" required>{{ old('resume') }}</textarea>
                @error('resume')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notlar (Opsiyonel)</label>
                <textarea class="form-control" id="notes" name="notes">{{ old('notes') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label">CV</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" required>
                @error('cv')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="education_field_id" class="form-label">Eğitim Alanı</label>
                <select class="form-control @error('education_field_id') is-invalid @enderror" id="education_field_id" name="education_field_id" required>
                    @foreach($educationFields as $field)
                        <option value="{{ $field->id }}" {{ old('education_field_id') == $field->id ? 'selected' : '' }}>{{ $field->name }}</option>
                    @endforeach
                </select>
                @error('education_field_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="education_level_id" class="form-label">Eğitim Seviyesi</label>
                <select class="form-control @error('education_level_id') is-invalid @enderror" id="education_level_id" name="education_level_id" required>
                    @foreach($educationLevels as $level)
                        <option value="{{ $level->id }}" {{ old('education_level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('education_level_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Yetenekler (Birden fazla yetenek seçebilirsiniz)</label>
                <select multiple class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills[]">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}>{{ $skill->skill_name }}</option>
                    @endforeach
                </select>
                @error('skills')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location_id" class="form-label">Yaşadığınız Şehir</label>
                <select class="form-control @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>
                    <option value="">Seçiniz</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->city }}
                        </option>
                    @endforeach
                </select>
                @error('location_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="military_status" class="form-label">Askerlik Durumu</label>
                <select class="form-control @error('military_status') is-invalid @enderror" id="military_status" name="military_status">
                    @foreach($militaryStatuses as $status)
                        <option value="{{ $status->id }}" {{ old('military_status') == $status->id ? 'selected' : '' }}>{{ $status->military_status }}</option>
                    @endforeach
                </select>
                @error('military_status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="driving_license" class="form-label">Ehliyet Durumu</label>
                <select multiple class="form-control @error('driving_license') is-invalid @enderror" id="driving_license" name="driving_license[]">
                    @foreach($drivingLicenses as $license)
                        <option value="{{ $license->id }}" {{ in_array($license->id, old('driving_license', [])) ? 'selected' : '' }}>{{ $license->license_class }}</option>
                    @endforeach
                </select>
                @error('driving_license')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="marital_status" class="form-label">Medeni Durum</label>
                <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status">
                    @foreach($maritalStatuses as $status)
                        <option value="{{ $status->id }}" {{ old('marital_status') == $status->id ? 'selected' : '' }}>{{ $status->status }}</option>
                    @endforeach
                </select>
                @error('marital_status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="languages" class="form-label">Dil Bilgisi (Birden fazla dil seçebilirsiniz)</label>
                <select multiple class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages[]">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ in_array($language->id, old('languages', [])) ? 'selected' : '$language' }}>{{ $language->language }}</option>
                    @endforeach
                </select>
                @error('languages')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Başvuruyu Gönder</button>
        </form>
    </div>
@endsection
