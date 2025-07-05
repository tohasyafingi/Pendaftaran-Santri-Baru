@extends('frontend.layouts.app')

@section('content')
    <div class="container my-5">
        <h3 class="text-center mb-4">Daftar Ulang Santri</h3>

        <form method="POST" action="{{ route('santri.daftar_ulang.proses') }}" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">Informasi Daftar Ulang</div>
                <div class="card-body">
                    <p>Transfer ke rekening:</p>
                    <ul>
                        <li><strong>Bank:</strong> BRI</li>
                        <li><strong>No Rekening:</strong> 1234 5678 9012 3456</li>
                        <li><strong>Atas Nama:</strong> Pondok Pesantren</li>
                    </ul>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Upload Bukti Pembayaran</div>
                <div class="card-body">

                    @if($santri->bukti_daftar_ulang)
                        {{-- <p>Bukti pembayaran sebelumnya:</p> --}}
                        @if(in_array(pathinfo($santri->bukti_daftar_ulang, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                            <img src="{{ asset('storage/' . $santri->bukti_daftar_ulang) }}" alt="Bukti Pembayaran"
                                class="img-fluid mb-3" style="max-height: 400px;">
                        @elseif(pathinfo($santri->bukti_daftar_ulang, PATHINFO_EXTENSION) == 'pdf')
                            <embed src="{{ asset('storage/' . $santri->bukti_daftar_ulang) }}" type="application/pdf" width="100%"
                                height="500px" />
                        @endif
                        <hr>
                    @endif

                    <input type="file" name="bukti_daftar_ulang" class="form-control" accept=".jpg,.jpeg,.png,.pdf" {{ $santri->bukti_daftar_ulang ? '' : 'required' }}>
                    @if($santri->bukti_daftar_ulang)
                        <small class="text-muted">Jika ingin mengganti, upload file baru.</small>
                    @endif
                </div>
            </div>


            <button type="submit" class="btn btn-success btn-lg">Kirim Bukti Daftar Ulang</button>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        // VALIDASI FORM
        document.getElementById('formDaftarUlang').addEventListener('submit', function (e) {
            const inputFile = this.querySelector('[name="bukti_daftar_ulang"]');
            if (!inputFile.files.length) {
                e.preventDefault();
                alert('⚠️ Harap upload bukti pembayaran terlebih dahulu.');
            }
        });
    </script>
@endpush