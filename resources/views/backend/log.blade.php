@extends('backend.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"><i class="fas fa-clipboard-list me-2 text-primary"></i>Log Aktivitas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Log Aktivitas</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Log Aktivitas
        </div>
        <div class="card-body">
            @if($logs->isEmpty())
                <div class="alert alert-info">Belum ada aktivitas.</div>
            @else
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered table-striped table-hover align-middle">
                        <thead class="table-light text-center align-middle">
                            <tr>
                                <th style="width: 40px;">No</th>
                                <th>Deskripsi</th>
                                <th style="width: 90px;">Event</th>
                                <th style="width: 100px;">Model</th>
                                <th style="width: 130px;">Oleh</th>
                                <th style="min-width: 250px;">Detail</th>
                                <th style="width: 140px;">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $log->description }}</td>
                                <td class="text-center">
                                    <span class="badge 
                                        {{ $log->event === 'created' ? 'bg-success' : ($log->event === 'updated' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ ucfirst($log->event) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ class_basename($log->subject_type) }}</td>
                                <td class="text-center">{{ $log->causer->name ?? 'Sistem' }}</td>
                                <td style="font-size: 13px;">
                                    @php
                                        $props = $log->properties;
                                        $old = $props['old'] ?? [];
                                        $attributes = $props['attributes'] ?? [];

                                        $filterKeys = function($array) {
                                            return collect($array)->reject(function($value, $key) {
                                                return in_array($key, ['created_at', 'updated_at']);
                                            })->toArray();
                                        };

                                        $oldFiltered = $filterKeys($old);
                                        $attributesFiltered = $filterKeys($attributes);
                                    @endphp

                                    @if($log->event === 'updated')
                                        @if(is_array($oldFiltered) && count($oldFiltered) && is_array($attributesFiltered) && count($attributesFiltered))
                                            <ul class="list-unstyled mb-0" style="max-height: 120px; overflow-y: auto;">
                                                @foreach($attributesFiltered as $key => $newValue)
                                                    <li>
                                                        <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong>:
                                                        <span class="text-danger">{{ is_array($oldFiltered[$key] ?? null) ? json_encode($oldFiltered[$key]) : ($oldFiltered[$key] ?? '-') }}</span>
                                                        <i class="fas fa-arrow-right mx-1 text-secondary"></i>
                                                        <span class="text-success">{{ is_array($newValue) ? json_encode($newValue) : $newValue }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <small class="text-muted fst-italic">Detail perubahan tidak tersedia.</small>
                                        @endif
                                    @elseif($log->event === 'created')
                                        @if(is_array($attributesFiltered) && count($attributesFiltered))
                                            <ul class="list-unstyled mb-0" style="max-height: 120px; overflow-y: auto;">
                                                @foreach($attributesFiltered as $key => $value)
                                                    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <small class="text-muted fst-italic">Tidak ada data detail.</small>
                                        @endif
                                    @elseif($log->event === 'deleted')
                                        @if(is_array($oldFiltered) && count($oldFiltered))
                                            <ul class="list-unstyled mb-0" style="max-height: 120px; overflow-y: auto;">
                                                @foreach($oldFiltered as $key => $value)
                                                    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <small class="text-muted fst-italic">Tidak ada data detail.</small>
                                        @endif
                                    @else
                                        <small class="text-muted fst-italic">Tidak ada detail.</small>
                                    @endif
                                </td>
                                <td class="text-center">{{ $log->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light text-center align-middle">
                            <tr>
                                <th>No</th>
                                <th>Deskripsi</th>
                                <th>Event</th>
                                <th>Model</th>
                                <th>Oleh</th>
                                <th>Detail</th>
                                <th>Waktu</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                {{-- Pagination Laravel dihapus karena pakai datatables --}}
            @endif
        </div>
    </div>
</div>
@endsection
