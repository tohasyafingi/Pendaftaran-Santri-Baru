@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Santri Ditolak</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 865px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>JK</th>
                                    <th>TTL</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Ayah</th>
                                    <th>Alamat</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($santris->where('status', 'tolak') as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->nama_lengkap }}</td>
                                        <td>{{ $r->nik }}</td>
                                        <td>{{ $r->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $r->tempat_lahir }}, {{ \Carbon\Carbon::parse($r->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $r->no_hp }}</td>
                                        <td>{{ $r->email }}</td>
                                        <td>{{ $r->nama_ayah }}</td>
                                        <td>{{ $r->alamat }}</td>
                                        <td>
                                            {!! $r->pas_foto ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                            {!! $r->kk ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                            {!! $r->akta_kelahiran ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('backend.santri.detail', $r->id) }}">Detail</a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" action="{{ route('backend.santri.destroy', $r->id) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data santri ditolak</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>JK</th>
                                    <th>TTL</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Ayah</th>
                                    <th>Alamat</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- FontAwesome icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Bootstrap dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endpush
