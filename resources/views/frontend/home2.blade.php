@extends('frontend.baim.app')
@section('content')
    <main>
        <header id="home" class="position-relative text-center text-white">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            <video autoplay muted loop class="w-100" style="object-fit: cover; height: 100vh;">
                <source src="{{ asset('assets/baim/asset/FILE KECIL.mp4') }}" type="video/mp4" />
            </video>
            <div class="position-absolute top-50 start-50 translate-middle text-white z-3">
                <h3 class="display-5 fw-bold">Bikin Pendaftran Lebih Gampang</h3>
                <p class="lead">Yuk! klik tombol di bawah</p>
                <a href="/pendaftaran" class="btn btn-primary btn-lg mt-3">Daftar Sekarang</a>
            </div>
        </header>
        <section id="fitur" class="py-5">
            <div class="container">
                <h3 class="text-center mb-3">Fitur</h3>
                <p class="text-center text-muted mb-4">
                    "Tuntulah ilmu agama dengan giat, lalu jadilah sosok yang lebih bijaksana"
                </p>
                <div class="text-center">
                    <p>
                        Jauh dari rumah memang tidak enak, tapi itu akan menjadi pengalaman yang berharga.
                        Niatkan segala perjuanganmu dalam menuntut ilmu agama untuk mencari ridho Allah.
                    </p>
                </div>
            </div>
        </section>
        <section class="bg-light py-5" id="support">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h6>Informasi</h6>
                        <p>Menyediakan catatan kegiatan santri dan rincian biaya pendaftaran</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Invitation</h6>
                        <p>Layanan tata cara pendaftaran calon santri</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Laporan</h6>
                        <p>Laporan hasil seleksi pendaftaran santri</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="gallery" class="py-5">
            <div class="container">
                <div class="row g-3">
                    @foreach (['kegiatan putra.jpg', 'kegitan putri.jpg', '12651.JPG', 'kegitan puta plajar.jpg', 'pondok (2).jpg', 'pondok (2).jpg'] as $img)
                        <div class="col-md-2">
                            <img src="{{ asset('assets/baim/asset/' . $img) }}" class="img-fluid rounded shadow" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="quote">
            <div class="layar-dalam">
                <p>PENGASUH PONDOK PESANTREN ULUMUL QUR'AN.</p>
            </div>
        </section>
        <section id="ourteam" class="py-5">
            <div class="container text-center">
                <h3>Deskripsi Singkat</h3>
                <p>Beliau adalah pengasuh Pondok Pesantren Ulumul Qur'an:</p>
                <p><strong>K.H Ahmad Muhammad Taubatan Nasuha, Alh., M.Ag.</strong></p>
                <p><strong>Ibuk Nyai H. Umi Cholifah alhz.</strong></p>
            </div>
        </section>
        <section class="py-5 bg-light" id="blog">
            <div class="container">
                <h3 class="text-center">Blog</h3>
                <div class="row">
                    <div class="col-md-12">
                        <p>Pondok Pesantren ini diasuh oleh seorang kyai yang merupakan
                            alumni Pondok Pesantren “An-Nur” Kersan, Tegorejo, Kendal alumni “Al-Anwar”
                            Karangmangu, Sarang, Rembang, dan alumni sekaligus mantan lurah “PPTQ Al-Asy’ariyah”
                            periode 2003-2005 yaitu KH. A.M.T Nasuha Alh., M.Ag.</p>

                        <p>Pada tahun 2001 diberi amanat oleh Mbah Muntaha Alh,
                            untuk membuka pendidikan SMP Filial di Dero Duwur,
                            pada waktu sore dan malamnya beliau berinisiatif untuk
                            dibuat pengajian dan belajar yang arahnya untuk dijadikan pondok pesantren, dan berkembang
                            sampai sekarang.
                        </p>

                        <p>Pada tahun 2007, beliau merintis Pondok Pesantren di Sarimulyo,
                            Kalibeber, atas saran dan istikhoroh Kyai Khos yaitu KH Nor Khamid Alh.
                            “Buatlah Pondok Pesantren pada tanggal 1 Muharram dan resmikan
                            pada tanggal 10 Muharramnya, kelolalah santri dengan telaten dan sabar, walau hanya 1 orang atau
                            9 orang.
                        </p>

                        <p>Pondok Pesantren ‘Ulumul Qur’an berdiri pada tanggal 1 Muharram 1429 H,
                            tepatnya tanggal 10 Januari 2008. Letaknya strategis dan mudah dijangkau
                            karena berada di lingkungan UNSIQ Jawa Tengah dan tepat di belakang MTS N 2 Wonosobo.
                        </p>
                    </div>
                </div>
            </div>
        </section>
{{-- 
        <section class="abuabu" id="blog">

            <div class="blog">
                <h3> Blog</h3>
                <p class="ringkasan">
                <p>Pondok Pesantren ini diasuh oleh seorang kyai yang merupakan
                    alumni Pondok Pesantren “An-Nur” Kersan, Tegorejo, Kendal alumni “Al-Anwar”
                    Karangmangu, Sarang, Rembang, dan alumni sekaligus mantan lurah “PPTQ Al-Asy’ariyah”
                    periode 2003-2005 yaitu KH. A.M.T Nasuha Alh., M.Ag.</p>

                <p>Pada tahun 2001 diberi amanat oleh Mbah Muntaha Alh,
                    untuk membuka pendidikan SMP Filial di Dero Duwur,
                    pada waktu sore dan malamnya beliau berinisiatif untuk
                    dibuat pengajian dan belajar yang arahnya untuk dijadikan pondok pesantren, dan berkembang
                    sampai sekarang.
                </p>

                <p>Pada tahun 2007, beliau merintis Pondok Pesantren di Sarimulyo,
                    Kalibeber, atas saran dan istikhoroh Kyai Khos yaitu KH Nor Khamid Alh.
                    “Buatlah Pondok Pesantren pada tanggal 1 Muharram dan resmikan
                    pada tanggal 10 Muharramnya, kelolalah santri dengan telaten dan sabar, walau hanya 1 orang atau
                    9 orang.
                </p>

                <p>Pondok Pesantren ‘Ulumul Qur’an berdiri pada tanggal 1 Muharram 1429 H,
                    tepatnya tanggal 10 Januari 2008. Letaknya strategis dan mudah dijangkau
                    karena berada di lingkungan UNSIQ Jawa Tengah dan tepat di belakang MTS N 2 Wonosobo.
                </p>
                </p>

            </div>
            <div class="brosur-pendaftaran">
                <h3> Brosur Pendaftaran </h3>
            </div>
        </section> --}}

<section class="py-5">
    <div class="container text-center">
        <h3>Brosur Pendaftaran</h3>
        <div class="row g-3">
            @foreach (['BROSUR 1.png', 'BROSUR 2.png', 'BROSUR 3.png'] as $img)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-top" style="background-image: url('{{ asset('assets/baim/asset/' . $img) }}'); height: 650px; background-size: cover; background-position: center;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4">Alur Pendaftaran</h3>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item">
                <strong>Pengisian Formulir:</strong> Bisa dilakukan online atau manual. Data online otomatis masuk sistem.
            </li>
            <li class="list-group-item">
                <strong>Tes Masuk:</strong> Ujian tulis & wawancara, bisa online untuk calon dari luar kota.
            </li>
            <li class="list-group-item">
                <strong>Wawancara:</strong> Dilakukan untuk santri & wali. Jika offline, wawancara dijadwalkan via WhatsApp/telepon.
            </li>
            <li class="list-group-item">
                <strong>Pengumuman Kelulusan:</strong> Setelah proses seleksi selesai.
            </li>
            <li class="list-group-item">
                <strong>Pembayaran Biaya Administrasi:</strong> Setelah dinyatakan lulus.
            </li>
        </ol>
    </div>
</section>

    </main>
@endsection