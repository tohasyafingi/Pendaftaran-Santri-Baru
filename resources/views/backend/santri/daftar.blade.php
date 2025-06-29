@extends('backend.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Santri Baru</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Santri</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Santri Baru
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. Daftar</th>
                            <th>NIK</th>
                            <th>JK</th>
                            <th>TTL</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Ayah</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($santris as $santri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $santri->nama_lengkap }}</td>
                            <td>{{ $santri->nomor_pendaftaran }}</td>
                            <td>{{ $santri->nik }}</td>
                            <td>{{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $santri->tempat_lahir }}, {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $santri->no_hp }}</td>
                            <td>{{ $santri->email }}</td>
                            <td>{{ $santri->nama_ayah }}</td>
                            <td>{{ $santri->alamat }}</td>
                            <td>{{ $santri->status }}</td>
                            <td>
                                {!! $santri->pas_foto ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                {!! $santri->kk ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                                {!! $santri->akta_kelahiran ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('backend.santri.detail', $santri->id) }}">Detail</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('backend.santri.destroy', $santri->id) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <td colspan="12" class="text-center">Belum ada data santri</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. Daftar</th>
                            <th>NIK</th>
                            <th>JK</th>
                            <th>TTL</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Ayah</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Berkas</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
