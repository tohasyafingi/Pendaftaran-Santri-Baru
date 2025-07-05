@extends('frontend.layouts.app')
@section('content')
<div class="container my-5">
    <div class="text-center mb-4">
        @if ($santri->pas_foto)
            <img src="{{ asset('storage/' . $santri->pas_foto) }}" class="rounded-circle shadow-sm mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Pas Foto">
        @else
            <img src="{{ asset('assets/images/default-profile.png') }}" class="rounded-circle shadow-sm mb-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Foto Default">
        @endif
        <h4 class="fw-semibold">Hi, {{ Auth::user()->name }}</h4>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white">
            <h5><i class="fas fa-info-circle text-primary me-2"></i> Status Pendaftaran</h5>
        </div>
        <div class="card-body">
            <div class="alert 
                @if($santri->status == 'aktif') alert-primary
                @elseif($santri->status == 'terima' && !$santri->bukti_daftar_ulang) alert-warning
                @elseif($santri->status == 'terima' && $santri->bukti_daftar_ulang) alert-success
                @elseif($santri->status == 'tolak') alert-danger
                @else alert-warning
                @endif">
                <strong>Status:</strong>
                {{ strtoupper($santri->status) }}
                <br>
                <small>
                    @if($santri->status == 'aktif')
                        🎉 Selamat! NIS Anda: <strong>{{ $santri->nis }}</strong>
                    @elseif($santri->status == 'terima' && !$santri->bukti_daftar_ulang)
                        🎉 Anda diterima. Silakan daftar ulang.
                    @elseif($santri->status == 'terima' && $santri->bukti_daftar_ulang)
                        ⏳ Bukti daftar ulang diproses admin.
                    @elseif($santri->status == 'tolak')
                        ❗ Maaf, Anda tidak lolos seleksi.
                    @else
                        ⏳ Data Anda sedang diverifikasi.
                    @endif
                </small>
            </div>
            <p><strong>Nomor Pendaftaran:</strong> {{ $santri->nomor_pendaftaran }}</p>
            <p><strong>Nomor Induk Santri:</strong> {{ $santri->nis }}</p>
        </div>
    </div>

    @if ($santri->info)
        <div class="alert alert-info shadow-sm mb-4">
            <i class="fas fa-envelope me-2"></i> <strong>Pesan Admin:</strong> {{ $santri->info }}
        </div>
    @endif

    {{-- Pengumuman --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5><i class="fas fa-bullhorn text-warning me-2"></i> Pengumuman</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach(App\Models\Pengumuman::latest()->take(5)->get() as $info)
                    <li class="list-group-item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalPengumuman{{ $loop->index }}">
                            📢 {{ $info->judul }}
                        </a>
                    </li>

                    <!-- Modal -->
                    <div class="modal fade" id="modalPengumuman{{ $loop->index }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>{{ $info->judul }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @if($info->img)
                                        <img src="{{ asset('storage/' . $info->img) }}" class="img-fluid mb-3">
                                    @endif
                                    <p>{{ $info->isi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
