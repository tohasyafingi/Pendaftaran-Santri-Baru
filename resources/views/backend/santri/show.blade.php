@extends('backend.layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0"><i class="fas fa-user-graduate me-2"></i> Detail Santri</h4>
    </div>
    <div class="card-body">
        <dl class="row">
            @php
                $labelClass = 'col-sm-4 col-lg-3 fw-semibold text-muted';
                $valueClass = 'col-sm-8 col-lg-9';
            @endphp

            {{-- Data Pribadi --}}
            <dt class="{{ $labelClass }}">Nama Lengkap</dt>
            <dd class="{{ $valueClass }}">{{ $santri->nama_lengkap }}</dd>

            <dt class="{{ $labelClass }}">NIK</dt>
            <dd class="{{ $valueClass }}">{{ $santri->nik }}</dd>

            <dt class="{{ $labelClass }}">Jenis Kelamin</dt>
            <dd class="{{ $valueClass }}">{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>

            <dt class="{{ $labelClass }}">Tempat, Tanggal Lahir</dt>
            <dd class="{{ $valueClass }}">{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->translatedFormat('d F Y') }}</dd>

            <dt class="{{ $labelClass }}">No. HP</dt>
            <dd class="{{ $valueClass }}">{{ $santri->no_hp }}</dd>

            <dt class="{{ $labelClass }}">Email</dt>
            <dd class="{{ $valueClass }}">{{ $santri->email ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Alamat</dt>
            <dd class="{{ $valueClass }}">{{ $santri->alamat }}</dd>

            <hr class="my-3">

            {{-- Data Orang Tua --}}
            <dt class="{{ $labelClass }}">Nama Ayah</dt>
            <dd class="{{ $valueClass }}">{{ $santri->nama_ayah }}</dd>

            <dt class="{{ $labelClass }}">Pekerjaan Ayah</dt>
            <dd class="{{ $valueClass }}">{{ $santri->pekerjaan_ayah ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Pendidikan Ayah</dt>
            <dd class="{{ $valueClass }}">{{ $santri->pendidikan_ayah ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Nama Ibu</dt>
            <dd class="{{ $valueClass }}">{{ $santri->nama_ibu }}</dd>

            <dt class="{{ $labelClass }}">Pekerjaan Ibu</dt>
            <dd class="{{ $valueClass }}">{{ $santri->pekerjaan_ibu ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Pendidikan Ibu</dt>
            <dd class="{{ $valueClass }}">{{ $santri->pendidikan_ibu ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Alamat Orang Tua</dt>
            <dd class="{{ $valueClass }}">{{ $santri->alamat_orangtua ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">No. HP Orang Tua</dt>
            <dd class="{{ $valueClass }}">{{ $santri->no_hp_orangtua }}</dd>

            <hr class="my-3">

            {{-- Data Wali --}}
            <dt class="{{ $labelClass }}">Nama Wali</dt>
            <dd class="{{ $valueClass }}">{{ $santri->nama_wali ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Hubungan Wali</dt>
            <dd class="{{ $valueClass }}">{{ $santri->hubungan_wali ?? '-' }}</dd>

            <hr class="my-3">

            {{-- Status --}}
            <dt class="{{ $labelClass }}">Tanggal Pendaftaran</dt>
            <dd class="{{ $valueClass }}">{{ optional($santri->tanggal_pendaftaran)->translatedFormat('d F Y') ?? '-' }}</dd>

            <dt class="{{ $labelClass }}">Status</dt>
            <dd class="{{ $valueClass }}">
                @switch($santri->status)
                    @case('terima')
                        <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Diterima</span>
                        @break
                    @case('tolak')
                        <span class="badge bg-danger"><i class="fas fa-times-circle me-1"></i> Ditolak</span>
                        @break
                    @default
                        <span class="badge bg-warning text-dark"><i class="fas fa-hourglass-half me-1"></i> Proses Verifikasi</span>
                @endswitch
            </dd>

            <hr class="my-3">

            {{-- Berkas Upload --}}
            <dt class="{{ $labelClass }}">Berkas</dt>
            <dd class="{{ $valueClass }}">
                <div class="row">
                    @foreach (['pas_foto' => 'Pas Foto', 'kk' => 'Kartu Keluarga', 'akta_kelahiran' => 'Akta Kelahiran'] as $field => $label)
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <small class="text-muted d-block">{{ $label }}</small>
                                @if($santri->$field)
                                    <a href="{{ Storage::url($santri->$field) }}" target="_blank">
                                        <img src="{{ Storage::url($santri->$field) }}" alt="{{ $label }}" class="img-thumbnail" style="max-height: 100px;">
                                    </a>
                                @else
                                    <div class="text-danger small">Belum diunggah</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </dd>
        </dl>

        {{-- Tombol Verifikasi --}}
        <div class="d-flex gap-2 mt-4">
            @if ($santri->status !== 'terima')
                <form action="{{ route('backend.santri.verifikasi', ['santri' => $santri->id, 'status' => 'terima']) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Terima
                    </button>
                </form>
            @endif

            @if ($santri->status !== 'tolak')
                <form action="{{ route('backend.santri.verifikasi', ['santri' => $santri->id, 'status' => 'tolak']) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i> Tolak
                    </button>
                </form>
            @endif
        </div>
                {{-- Form Kirim Pesan --}}
        <hr class="my-4">

        <h5>Kirim Pesan ke Pendaftar</h5>
        <form action="{{ route('backend.santri.kirimPesan', $santri->id) }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="info" class="form-label fw-semibold">Pesan (maksimal 255 karakter)</label>
                <textarea name="info" id="info" rows="3" class="form-control @error('info') is-invalid @enderror">{{ old('info', $santri->info) }}</textarea>
                @error('info')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
        </form>

    </div>
</div>
@endsection
