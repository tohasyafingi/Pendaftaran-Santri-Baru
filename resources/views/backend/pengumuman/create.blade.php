@extends('backend.layouts.app')

@section('content')
    <div class="container mt-4">
        <h4>Tambah Pengumuman</h4>

        <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar (opsional)</label>
                <input type="file" name="img" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Kirim kepada Santri dengan Status</label>
                <select name="status_santri" class="form-control" required>
                    <option value="semua">Semua</option>
                    <option value="proses">Proses</option>
                    <option value="terima">Terima</option>
                    <option value="tolak">Tolak</option>
                    <option value="aktif">Aktif</option>
                </select>

            </div>

            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
    </div>
@endsection