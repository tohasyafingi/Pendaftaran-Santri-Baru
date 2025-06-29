@extends('backend.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Pengumuman</h4>
        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengumuman
        </a>
    </div>

    @if ($pengumuman->isEmpty())
        <div class="alert alert-info">Belum ada pengumuman yang tersedia.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($pengumuman as $item)
            <div class="col">
                <div class="card h-100 shadow-sm pengumuman-card" 
                    data-bs-toggle="modal" 
                    data-bs-target="#detailModal"
                    data-judul="{{ $item->judul }}"
                    data-isi="{{ strip_tags($item->isi) }}"
                    data-img="{{ $item->img ? asset('storage/' . $item->img) : '' }}"
                    data-tanggal="{{ $item->created_at->format('d M Y') }}"
                    style="cursor: pointer;">

                    @if($item->img)
                        <img src="{{ asset('storage/' . $item->img) }}" class="card-img-top" alt="gambar pengumuman" style="height: 150px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted" style="font-size: 14px;">
                            {{ Str::limit(strip_tags($item->isi), 120) }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                {{ $item->created_at->format('d M Y') }}
                            </small>
                            <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" onsubmit="event.stopPropagation(); return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="event.stopPropagation();">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Pengumuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img id="modal-img" src="" alt="" class="img-fluid rounded mb-3 d-none">
        <p><small id="modal-tanggal" class="text-muted"></small></p>
        <h5 id="modal-judul"></h5>
        <p id="modal-isi" class="mt-3"></p>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        const card = event.relatedTarget;

        document.getElementById('modal-judul').innerText = card.getAttribute('data-judul');
        document.getElementById('modal-isi').innerText = card.getAttribute('data-isi');
        document.getElementById('modal-tanggal').innerText = "Tanggal: " + card.getAttribute('data-tanggal');

        const imgSrc = card.getAttribute('data-img');
        const imgEl = document.getElementById('modal-img');

        if (imgSrc) {
            imgEl.src = imgSrc;
            imgEl.classList.remove('d-none');
        } else {
            imgEl.classList.add('d-none');
        }
    });
});
</script>
@endpush
