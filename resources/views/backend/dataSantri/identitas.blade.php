@extends('frontend.layouts.app')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4">Identitas Santri</h3>
    
    <form method="POST" action="{{ route('santri.identitas.update') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- DATA DIRI --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light fw-bold">Data Diri</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nomor Pendaftaran</label>
                    <input type="text" class="form-control" value="{{ $santri->nomor_pendaftaran }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" value="{{ $santri->nik }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $santri->nama_lengkap }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="L" {{ $santri->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $santri->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $santri->tempat_lahir }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $santri->tanggal_lahir }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $santri->no_hp }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $santri->email }}" readonly>
                </div>
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" required>{{ $santri->alamat }}</textarea>
                </div>
            </div>
        </div>

        {{-- ORANG TUA / WALI --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light fw-bold">Data Orang Tua / Wali</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ $santri->nama_ayah }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $santri->pekerjaan_ayah }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pendidikan Ayah</label>
                    <input type="text" name="pendidikan_ayah" class="form-control" value="{{ $santri->pendidikan_ayah }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $santri->nama_ibu }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $santri->pekerjaan_ibu }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pendidikan Ibu</label>
                    <input type="text" name="pendidikan_ibu" class="form-control" value="{{ $santri->pendidikan_ibu }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat Orang Tua</label>
                    <textarea name="alamat_orangtua" class="form-control" rows="2">{{ $santri->alamat_orangtua }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">No HP Orang Tua</label>
                    <input type="text" name="no_hp_orangtua" class="form-control" value="{{ $santri->no_hp_orangtua }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Wali</label>
                    <input type="text" name="nama_wali" class="form-control" value="{{ $santri->nama_wali }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hubungan Wali</label>
                    <input type="text" name="hubungan_wali" class="form-control" value="{{ $santri->hubungan_wali }}">
                </div>
            </div>
        </div>

        {{-- BERKAS --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-light fw-bold">Berkas</div>
    <div class="card-body">
        <div class="row g-4">
            {{-- PAS FOTO --}}
            <div class="col-md-4">
                <label class="form-label">Pas Foto (jpg/png, max 2MB)</label>
                <input type="file" name="pas_foto" class="form-control" accept="image/*" onchange="previewFile(this, '#preview-foto')">
                <div class="mt-2">
                    @if($santri->pas_foto)
                        <a href="{{ asset('storage/' . $santri->pas_foto) }}" target="_blank" id="preview-pas_foto" class="d-block">📄 Lihat File Foto</a>
                        {{-- <img src="{{ asset('storage/' . $santri->pas_foto) }}" alt="Pas Foto" id="preview-foto" class="img-thumbnail" width="100%"> --}}
                    @else
                        <a id="preview-pas_foto" class="d-none" target="_blank">📄 Lihat File Foto</a>
                        {{-- <img id="preview-foto" class="img-thumbnail d-none" width="100%"> --}}
                    @endif
                </div>
            </div>

            {{-- KK --}}
            <div class="col-md-4">
                <label class="form-label">Kartu Keluarga</label>
                <input type="file" name="kk" class="form-control" accept=".jpg,.jpeg,.png,.pdf" onchange="previewFile(this, '#preview-kk')">
                <div class="mt-2">
                    @if($santri->kk)
                        <a href="{{ asset('storage/' . $santri->kk) }}" target="_blank" id="preview-kk" class="d-block">📄 Lihat File KK</a>
                    @else
                        <a id="preview-kk" class="d-none" target="_blank">📄 Lihat File KK</a>
                    @endif
                </div>
            </div>

            {{-- Akta Kelahiran --}}
            <div class="col-md-4">
                <label class="form-label">Akta Kelahiran</label>
                <input type="file" name="akta_kelahiran" class="form-control" accept=".jpg,.jpeg,.png,.pdf" onchange="previewFile(this, '#preview-akta')">
                <div class="mt-2">
                    @if($santri->akta_kelahiran)
                        <a href="{{ asset('storage/' . $santri->akta_kelahiran) }}" target="_blank" id="preview-akta" class="d-block">📄 Lihat Akta</a>
                    @else
                        <a id="preview-akta" class="d-none" target="_blank">📄 Lihat Akta</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-register btn-lg text-white" style="background-color: #04415f;">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
function previewFile(input, previewSelector) {
    const file = input.files[0];
    const preview = document.querySelector(previewSelector);

    if (!file || !preview) return;

    const reader = new FileReader();

    reader.onload = function (e) {
        if (file.type.startsWith("image/")) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        } else {
            preview.href = e.target.result;
            preview.textContent = "📄 Lihat File";
            preview.classList.remove('d-none');
        }
    };

    reader.readAsDataURL(file);
}
</script>
@endpush
