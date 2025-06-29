@extends('frontend.layouts.app')

@section('content')

    <main class="main">
        <!-- Hero Section -->
        <section id="home" class="hero section">

            <div class="hero-wrapper">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 hero-content" data-aos="fade-right" data-aos-delay="100">
                            <h1>Selamat Datang</h1>
                            <p>Membentuk generasi muslim yang berakhlak mulia, cerdas, dan berprestasi. Bergabunglah dengan
                                keluarga besar PP Ulumul Qur'an untuk masa depan yang gemilang.</p>
                            <div class="stats-row">

                            </div>
                            <div class="action-buttons">
                                <a href="/pendaftaran" class="btn-primary">Daftar Sekarang</a>
                                <a href="#" class="btn-secondary">Kontak Kami</a>
                            </div>
                        </div>
                        <div class="col-lg-6 hero-media" data-aos="zoom-in" data-aos-delay="200">
                            <img src="assets/front/img/education/showcase-6.webp" alt="Education"
                                class="img-fluid main-image">
                            <div class="image-overlay">
                                <div class="badge-accredited">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <span>Accredited Excellence</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature-cards-wrapper" data-aos="fade-up" data-aos-delay="300">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Innovative Curriculum</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget lacus id
                                        tortor facilisis.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-card active">
                                <div class="feature-icon">
                                    <i class="bi bi-laptop-fill"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Modern Facilities</h3>
                                    <p>Donec gravida risus at sollicitudin luctus. Nullam feugiat odio vitae justo pharetra.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Expert Faculty</h3>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                        curae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="upcoming-event" data-aos="fade-up" data-aos-delay="400">
                <div class="container">
                    <div class="event-content">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">NOV</span>
                        </div>
                        <div class="event-info">
                            <h3>Penerimaan Santri Baru</h3>
                            <p>Join us to explore campus facilities, meet our faculty, and learn about scholarship
                                opportunities.</p>
                        </div>
                        <div class="event-action">
                            <a href="/pendaftaran" class="btn-event">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="jadwal" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Jadwal Pendaftaran</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="about-content" data-aos="fade-up" data-aos-delay="200">

                            <h2>Jadwal Penerimaan Santri Baru</h2>

                            <div class="schedule-table ">
                                <div class="schedule-row">
                                    <div class="schedule-time">1 Juni 2025</div>
                                    <div class="schedule-activity">
                                        <h4>Pembukaan pendaftaran</h4>
                                        <p>Welcome address by Principal and introduction to the event</p>
                                    </div>
                                </div>
                                <div class="schedule-row">
                                    <div class="schedule-time">1 Juni 2025 - 30 Juli 2025</div>
                                    <div class="schedule-activity">
                                        <h4>Proses Penerimaan Santri Baru</h4>
                                        <p>Selected students showcase their scientific innovations</p>
                                    </div>
                                </div>
                                <div class="schedule-row">
                                    <div class="schedule-time">30 Juli 2025</div>
                                    <div class="schedule-activity">
                                        <h4>Penutupan Pendaftaran</h4>
                                        <p>Special lecture on "Future of Quantum Computing" by Dr. Robert Jenkins</p>
                                    </div>
                                </div>
                                <div class="schedule-row">
                                    <div class="schedule-time">1 Agustus 2025 - 7 Agustus 2025</div>
                                    <div class="schedule-activity">
                                        <h4>Verifikasi Berkas</h4>
                                        <p>Live demonstration of student-built robots and automation projects</p>
                                    </div>
                                </div>
                                <div class="schedule-row">
                                    <div class="schedule-time">10 Agustus 2025</div>
                                    <div class="schedule-activity">
                                        <h4>Pengumuman</h4>
                                        <p>Distribution of certificates and recognition of outstanding projects</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-image" data-aos="zoom-in" data-aos-delay="300">
                            <img src="assets/front/img/education/campus-5.webp" alt="Campus" class="img-fluid rounded">

                            <div class="mission-vision" data-aos="fade-up" data-aos-delay="400">
                                <div class="mission">
                                    <h3>Our Mission</h3>
                                    <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                        curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    </p>
                                </div>

                                <div class="vision">
                                    <h3>Our Vision</h3>
                                    <p>Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh
                                        pulvinar a. Cras ultricies ligula sed magna dictum porta.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="informasi" class="admissions section">

            <div class="container section-title" data-aos="fade-up" data-aos-delay="100">
                <h2>Informasi Pendaftaran</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="application-steps">
                            <h3 class="section-subtitle">Alur Pendaftaran</h3>
                            <div class="steps-wrapper">
                                <div class="step-item">
                                    <div class="step-number">01</div>
                                    <div class="step-content">
                                        <h4>Mengisi Formulir Pendaftaran</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                                            nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">02</div>
                                    <div class="step-content">
                                        <h4>Mendapatkan Akun Pendaftaran</h4>
                                        <p>Aenean quis feugiat ligula. Duis hendrerit felis id aliquet cursus. Vestibulum
                                            vel ipsum eu magna blandit volutpat.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">03</div>
                                    <div class="step-content">
                                        <h4>Melengkapi Berkas Pendaftaran</h4>
                                        <p>Pellentesque diam tellus, scelerisque quis sodales vel, dignissim eu justo.
                                            Mauris dictum felis non arcu ullamcorper.</p>
                                    </div>
                                </div>
                                <div class="step-item">
                                    <div class="step-number">04</div>
                                    <div class="step-content">
                                        <h4>Seleksi Berkas</h4>
                                        <p>Curabitur vulputate tellus sapien, id ultrices libero egestas ac. Sed in
                                            vestibulum dui, ac consequat enim.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="tuition-card">
                            <h3 class="section-subtitle">Biaya Pendaftaran</h3>
                            <div class="tuition-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Program</th>
                                            <th>Tuition (per year)</th>
                                            <th>Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Undergraduate</td>
                                            <td>$32,500</td>
                                            <td>$2,800</td>
                                        </tr>
                                        <tr>
                                            <td>Graduate</td>
                                            <td>$38,700</td>
                                            <td>$3,200</td>
                                        </tr>
                                        <tr>
                                            <td>International</td>
                                            <td>$42,300</td>
                                            <td>$4,500</td>
                                        </tr>
                                        <tr>
                                            <td>Online Programs</td>
                                            <td>$26,400</td>
                                            <td>$1,800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="financial-aid">
                                <h4>Financial Aid Available</h4>
                                <p>Over 75% of our students receive some form of financial assistance. Merit scholarships
                                    range from $5,000 to full tuition.</p>
                                <a href="#" class="btn btn-aid">Explore Financial Aid Options</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Admissions Section -->

        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-main-wrapper">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.22019783885!2d109.90060847590385!3d-7.329148172083076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa07e1760886d%3A0xd5e20fe53e38683d!2sDi%20Yayasan%20Pesantren%20Ulumul%20Qur&#39;an%20Al%20-%20Qindiliyah!5e0!3m2!1sid!2sid!4v1750861081983!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="contact-content">
                        <div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Location</h4>
                                    <p>MWC3+87M, Ponpes Ulumul Qur'an, Kalibeber, Kec. Mojotengah, Kab. Wonosobo, Jawa Tengah 56351</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Email</h4>
                                    <p>info@examplecompany.com</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Call</h4>
                                    <p>+62 890 1278 8888</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Open Hours</h4>
                                    <p>Senin-Sabtu: 08.00-16.00</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
                            <h3>Get in Touch</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua consectetur adipiscing.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required="">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required="">
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                        required=""></textarea>
                                </div>

                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>

                                <div class="form-submit">
                                    <button type="submit">Send Message</button>
                                    <div class="social-links">
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Starter Section Section -->
    </main>
@endsection