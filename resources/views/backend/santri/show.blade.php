@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Santri</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('backend.santri.update', $santri->id) }}">
                    @csrf
                    @method('PUT')



                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nomor_pendaftaran" class="form-label">Nomor Pendaftaran</label>
                            <input type="text" name="nomor_pendaftaran" class="form-control"
                                value="{{ old('nomor_pendaftaran', $santri->nomor_pendaftaran) }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" name="nis" class="form-control" value="{{ old('nis', $santri->nis) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control"
                                value="{{ old('nama_lengkap', $santri->nama_lengkap) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik', $santri->nik) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="L" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ old('tempat_lahir', $santri->tempat_lahir) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $santri->no_hp) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $santri->email) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control">{{ old('alamat', $santri->alamat) }}</textarea>
                        </div>
                    </div>

                    <h5 class="mt-4">Data Orang Tua</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control"
                                value="{{ old('nama_ayah', $santri->nama_ayah) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control"
                                value="{{ old('pekerjaan_ayah', $santri->pekerjaan_ayah) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah</label>
                            <input type="text" name="pendidikan_ayah" class="form-control"
                                value="{{ old('pendidikan_ayah', $santri->pendidikan_ayah) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control"
                                value="{{ old('nama_ibu', $santri->nama_ibu) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control"
                                value="{{ old('pekerjaan_ibu', $santri->pekerjaan_ibu) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                            <input type="text" name="pendidikan_ibu" class="form-control"
                                value="{{ old('pendidikan_ibu', $santri->pendidikan_ibu) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="no_hp_orangtua" class="form-label">No HP Orang Tua</label>
                            <input type="text" name="no_hp_orangtua" class="form-control"
                                value="{{ old('no_hp_orangtua', $santri->no_hp_orangtua) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="alamat_orangtua" class="form-label">Alamat Orang Tua</label>
                            <textarea name="alamat_orangtua"
                                class="form-control">{{ old('alamat_orangtua', $santri->alamat_orangtua) }}</textarea>
                        </div>
                    </div>

                    <h5 class="mt-4">Data Wali</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_wali" class="form-label">Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control"
                                value="{{ old('nama_wali', $santri->nama_wali) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="hubungan_wali" class="form-label">Hubungan Wali</label>
                            <input type="text" name="hubungan_wali" class="form-control"
                                value="{{ old('hubungan_wali', $santri->hubungan_wali) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal_pendaftaran" class="form-control"
                                value="{{ old('tanggal_pendaftaran', $santri->tanggal_pendaftaran) }}">
                        </div>
                    </div>

                    <h5 class="mt-4">Berkas</h5>
                    <div class="row">
                        @foreach (['pas_foto' => 'Pas Foto', 'kk' => 'Kartu Keluarga', 'akta_kelahiran' => 'Akta Kelahiran', 'bukti_daftar' => 'Bukti Daftar', 'bukti_daftar_ulang' => 'Bukti Daftar Ulang'] as $field => $label)
                            <div class="col-md-6 mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <input type="file" name="{{ $field }}" class="form-control">
                                @if($santri->$field)
                                    <div class="mt-2">
                                        <small>File saat ini:</small><br>
                                        <img src="{{ asset('storage/' . $santri->$field) }}" alt="{{ $label }}"
                                            class="img-thumbnail" width="150">
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="info" class="form-label">Kirim Pesan</label>
                            <input type="text" name="info" class="form-control" value="{{ old('info', $santri->info) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="proses" {{ old('status', $santri->status) == 'proses' ? 'selected' : '' }}>
                                    Proses</option>
                                <option value="terima" {{ old('status', $santri->status) == 'terima' ? 'selected' : '' }}>
                                    Terima</option>
                                <option value="tolak" {{ old('status', $santri->status) == 'tolak' ? 'selected' : '' }}>Tolak
                                </option>
                                <option value="aktif" {{ old('status', $santri->status) == 'aktif' ? 'selected' : '' }}>Aktif
                                </option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection