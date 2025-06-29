@extends('backend.layouts.app')

@push('styles')
<style>
    .fc { font-family: 'Segoe UI', sans-serif; font-size: 13px; }
    .fc-toolbar-title { font-size: 1.25rem; font-weight: 600; color: #212529; }
    .fc .fc-button {
        background-color: #0d6efd; border: none;
        padding: 0.375rem 0.75rem; font-size: 0.75rem;
        border-radius: 0.3rem; color: #fff;
        transition: background-color 0.2s ease-in-out;
    }
    .fc .fc-button:hover { background-color: #0b5ed7; }
    .fc-day-today { background-color: #e9f5ff; }
    .fc-daygrid-day-number {
        font-weight: 500; color: #6c757d;
        font-size: 0.75rem; padding-right: 4px;
    }
    .fc-event {
        background-color: #0d6efd !important; border: none !important;
        color: #fff !important; padding: 2px 5px; border-radius: 4px;
        font-size: 0.7rem;
    }
    .fc-event-title {
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .fc-daygrid-day-frame { padding: 2px 4px; }
</style>
@endpush

@section('content')
<div class="container mt-4">

    {{-- Breadcrumb --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">
            <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard Admin
        </h4>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-4">
        @php
            $boxes = [
                ['label' => 'Total Santri', 'icon' => 'fa-users', 'count' => $totalSantri, 'color' => 'dark'],
                ['label' => 'Diterima', 'icon' => 'fa-user-check', 'count' => $diterima, 'color' => 'success'],
                ['label' => 'Ditolak', 'icon' => 'fa-user-times', 'count' => $ditolak, 'color' => 'danger'],
                ['label' => 'Proses', 'icon' => 'fa-user-clock', 'count' => $proses, 'color' => 'warning'],
            ];
        @endphp
        @foreach ($boxes as $box)
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-{{ $box['color'] }} border-4">
                    <div class="card-body">
                        <h6 class="text-muted">
                            <i class="fas {{ $box['icon'] }} me-2 text-{{ $box['color'] }}"></i>
                            {{ $box['label'] }}
                        </h6>
                        <h3 class="fw-bold text-{{ $box['color'] }}">{{ $box['count'] }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pendaftar & Pengumuman Terbaru --}}
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold">5 Pendaftar Terbaru</div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm align-middle mb-0">
                        <thead>
                            <tr><th>Nama</th><th>Status</th><th>Tanggal</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($pendaftarTerbaru as $santri)
                                <tr>
                                    <td>{{ $santri->nama_lengkap }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-{{ $santri->status == 'terima' ? 'success' : ($santri->status == 'tolak' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($santri->status) }}
                                        </span>
                                    </td>
                                    <td>{{ optional($santri->created_at)->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold">5 Pengumuman Terbaru</div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm align-middle mb-0">
                        <thead>
                            <tr><th>Judul</th><th>Tanggal</th></tr>
                        </thead>
                        <tbody>
                            @forelse ($pengumumanTerbaru as $p)
                                <tr>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ optional($p->created_at)->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="2" class="text-center">Tidak ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Kalender & Log Aktivitas --}}
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold">Kalender</div>
                <div class="card-body">
                    <div id="kalender" style="padding: 10px; border: 1px solid #dee2e6; border-radius: 6px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold">Log Aktivitas Terbaru</div>
                <div class="card-body p-0">
<div class="accordion" id="logAccordion">
    @forelse ($logs as $log)
        @php
            $logId = 'logItem' . $loop->index;
            $collapseId = 'collapse' . $loop->index;
        @endphp
        <div class="accordion-item">
            <h2 class="accordion-header" id="{{ $logId }}">
                <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}">
                    <div class="me-2">
                        <strong class="text-primary">{{ $log->description }}</strong>
                        <span class="badge bg-{{ $log->event === 'created' ? 'success' : ($log->event === 'updated' ? 'warning text-dark' : 'danger') }} ms-2">
                            {{ ucfirst($log->event) }}
                        </span>
                    </div>
                    <div class="ms-auto text-muted small">
                        {{ optional($log->created_at)->format('d M Y H:i') ?? '-' }}
                    </div>
                </button>
            </h2>
            <div id="{{ $collapseId }}" class="accordion-collapse collapse" aria-labelledby="{{ $logId }}"
                data-bs-parent="#logAccordion">
                <div class="accordion-body small">
                    <div class="mb-1">
                        <span class="me-2">Model: <strong>{{ class_basename($log->subject_type) }}</strong></span> |
                        <span class="me-2">Oleh: <strong>{{ $log->causer->name ?? 'Sistem' }}</strong></span>
                    </div>
                    @php
                        $old = $log->properties['old'] ?? [];
                        $new = $log->properties['attributes'] ?? [];
                    @endphp

                    @if ($log->event === 'updated' && count($old) && count($new))
                        <ul class="mt-2 ps-3 small" style="font-size: 0.75rem;">
                            @foreach($new as $key => $newValue)
                                <li>
                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong>:
                                    <span class="text-danger">{{ $old[$key] ?? '-' }}</span>
                                    <i class="fas fa-arrow-right mx-1 text-secondary"></i>
                                    <span class="text-success">{{ $newValue }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @elseif ($log->event === 'created' && count($new))
                        <ul class="mt-2 ps-3 small" style="font-size: 0.75rem;">
                            @foreach($new as $key => $val)
                                <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $val }}</li>
                            @endforeach
                        </ul>
                    @elseif ($log->event === 'deleted' && count($old))
                        <ul class="mt-2 ps-3 small" style="font-size: 0.75rem;">
                            @foreach($old as $key => $val)
                                <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $val }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-muted small fst-italic mt-1">Detail tidak tersedia.</div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-muted py-3">Belum ada log</div>
    @endforelse
</div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('kalender');
        if (calendarEl) {
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                contentHeight: 'auto',
                aspectRatio: 1.7,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                buttonText: {
                    today:    'Hari Ini',
                    month:    'Bulan',
                    list:     'List'
                },
                events: @json($calendarEvents),
            });
            calendar.render();
        }
    });
</script>
@endpush
