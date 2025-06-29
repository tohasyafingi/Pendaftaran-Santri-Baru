@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Pendaftaran Santri Baru</h2>

    {{-- SweetAlert Trigger --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session("error") }}',
                confirmButtonColor: '#d33',
            });
        </script>
    @endif

    <form id="santriForm" method="POST" action="{{ route('santri.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- STEP INDICATOR --}}
        <div class="mb-4">
            <div id="step-indicator">
                <span class="step active">1</span>
                <span class="step">2</span>
                <span class="step">3</span>
            </div>
        </div>

        {{-- STEP 1 --}}
        <div class="step-form" id="step-1">
            <h4>Data Diri</h4>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <button type="button" class="btn btn-primary" onclick="validateStep1()">Lanjut</button>
        </div>

        {{-- STEP 2 --}}
        <div class="step-form d-none" id="step-2">
            <h4>Data Orang Tua / Wali</h4>
            <div class="mb-3">
                <label>Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
            </div>
            <div class="mb-3">
                <label>Pendidikan Ayah</label>
                <input type="text" name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
            </div>
            <div class="mb-3">
                <label>Pendidikan Ibu</label>
                <input type="text" name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
            </div>
            <div class="mb-3">
                <label>Alamat Orang Tua</label>
                <textarea name="alamat_orangtua" id="alamat_orangtua" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>No HP Orang Tua</label>
                <input type="text" name="no_hp_orangtua" id="no_hp_orangtua" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Wali (opsional)</label>
                <input type="text" name="nama_wali" id="nama_wali" class="form-control">
            </div>
            <div class="mb-3">
                <label>Hubungan dengan Wali</label>
                <input type="text" name="hubungan_wali" id="hubungan_wali" class="form-control">
            </div>

            <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Kembali</button>
            <button type="button" class="btn btn-primary" onclick="validateStep2()">Lanjut</button>
        </div>

        {{-- STEP 3 --}}
        <div class="step-form d-none" id="step-3">
            <h4>Upload Berkas</h4>
            <div class="mb-3">
                <label>Pas Foto (jpg/png)</label>
                <input type="file" name="pas_foto" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label>Scan Kartu Keluarga</label>
                <input type="file" name="kk" class="form-control" accept="application/pdf,image/*">
            </div>
            <div class="mb-3">
                <label>Scan Akta Kelahiran</label>
                <input type="file" name="akta_kelahiran" class="form-control" accept="application/pdf,image/*">
            </div>

            <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Kembali</button>
            <button type="submit" class="btn btn-success">Daftar</button>
        </div>
    </form>
</div>

{{-- STYLE --}}
<style>
    #step-indicator .step {
        display: inline-block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        background-color: #ccc;
        color: white;
        margin-right: 10px;
    }

    #step-indicator .active {
        background-color: #007bff;
    }

    .step-form {
        display: none;
    }

    .step-form:not(.d-none) {
        display: block;
    }

    .is-invalid {
        border-color: #dc3545;
    }
</style>

{{-- SCRIPT --}}
<script>
    function nextStep(step) {
        document.querySelectorAll('.step-form').forEach(el => el.classList.add('d-none'));
        document.getElementById('step-' + step).classList.remove('d-none');
        document.querySelectorAll('#step-indicator .step').forEach((el, i) => {
            el.classList.toggle('active', i + 1 === step);
        });
    }

    function validateStep1() {
        const fields = ['nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'email', 'alamat'];
        if (!validateFields(fields)) return;

        const email = document.getElementById('email').value;
        const no_hp = document.getElementById('no_hp').value;

        const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        const phoneValid = /^[0-9]{10,15}$/.test(no_hp);

        if (!emailValid) {
            Swal.fire('Format Email Salah', 'Harap isi email yang valid.', 'warning');
            return;
        }

        if (!phoneValid) {
            Swal.fire('Format No HP Salah', 'Harap isi nomor HP 10–15 digit angka.', 'warning');
            return;
        }

        nextStep(2);
    }

    function validateStep2() {
        const fields = ['nama_ayah', 'nama_ibu', 'no_hp_orangtua'];
        if (!validateFields(fields)) return;

        const no_hp = document.getElementById('no_hp_orangtua').value;
        if (!/^[0-9]{10,15}$/.test(no_hp)) {
            Swal.fire('Format No HP Orang Tua Salah', 'Gunakan 10–15 digit angka.', 'warning');
            return;
        }

        nextStep(3);
    }

    function validateFields(fieldIds) {
        let isValid = true;
        fieldIds.forEach(id => {
            const el = document.getElementById(id);
            if (!el || el.value.trim() === '') {
                el.classList.add('is-invalid');
                isValid = false;
            } else {
                el.classList.remove('is-invalid');
            }
        });
        if (!isValid) {
            Swal.fire('Form Belum Lengkap', 'Harap lengkapi semua isian wajib.', 'warning');
        }
        return isValid;
    }

    document.addEventListener('DOMContentLoaded', () => nextStep(1));
</script>
@endsection
