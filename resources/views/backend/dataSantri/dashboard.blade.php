@extends('frontend.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- FOTO & NAMA --}}
            <div class="text-center mb-4">
                @if ($santri->pas_foto)
                    <img src="{{ asset('storage/' . $santri->pas_foto) }}" class="rounded-circle shadow-sm mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Pas Foto">
                @else
                    <img src="{{ asset('assets/images/default-profile.png') }}" class="rounded-circle shadow-sm mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Foto Default">
                @endif
                <h4 class="fw-semibold">Hi, {{ Auth::user()->name }}</h4>
            </div>

            {{-- STATUS PENDAFTARAN --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0"><i class="fas fa-info-circle text-primary me-2"></i> Status Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <div class="alert 
                        @if($santri->status == 'terima') alert-success 
                        @elseif($santri->status == 'tolak') alert-danger 
                        @else alert-warning 
                        @endif
                        mb-3">
                        <strong>Status:</strong>
                        @switch($santri->status)
                            @case('terima')
                                LOLOS
                                @break
                            @case('tolak')
                                TIDAK LOLOS
                                @break
                            @default
                                PROSES VERIFIKASI
                        @endswitch<br>
                        <small>
                            @if($santri->status == 'terima')
                                🎉 Selamat! Anda <strong>LOLOS</strong> sebagai calon santri.
                            @elseif($santri->status == 'tolak')
                                ❗ Maaf, Anda <strong>TIDAK LOLOS</strong> seleksi.
                            @else
                                ⏳ Data Anda sedang <strong>PROSES VERIFIKASI</strong>.
                            @endif
                        </small>
                    </div>
                    <p class="mb-0"><strong>Nomor Pendaftaran:</strong> {{ $santri->nomor_pendaftaran }}</p>
                </div>
            </div>

            {{-- PESAN ADMIN --}}
            @if ($santri->info)
                <div class="alert alert-info shadow-sm mb-4">
                    <i class="fas fa-envelope me-2"></i>
                    <strong>Pesan Admin:</strong> {{ $santri->info }}
                </div>
            @endif

            {{-- PENGUMUMAN --}}
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0"><i class="fas fa-bullhorn text-warning me-2"></i> Informasi & Pengumuman</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach(App\Models\Pengumuman::latest()->take(5)->get() as $index => $info)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <a href="#" class="fw-semibold text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalPengumuman{{ $index }}">
                                        📢 {{ $info->judul }}
                                    </a>
                                    <br>
                                    <small class="text-muted">{{ $info->created_at->format('d M Y') }}</small>
                                </div>
                                <i class="fas fa-chevron-right text-muted"></i>
                            </li>

                            <!-- Modal -->
                            <div class="modal fade" id="modalPengumuman{{ $index }}" tabindex="-1" aria-labelledby="modalLabel{{ $index }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $index }}">{{ $info->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if($info->img)
                                                <img src="{{ asset('storage/' . $info->img) }}" alt="gambar" class="img-fluid rounded mb-3">
                                            @endif
                                            <div style="white-space: pre-line;">{{ $info->isi }}</div>
                                        </div>
                                        <div class="modal-footer">
                                            <small class="text-muted">Dipublikasikan: {{ $info->created_at->format('d M Y H:i') }}</small>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
