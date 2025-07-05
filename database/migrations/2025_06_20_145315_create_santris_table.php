<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_pendaftaran', 10)->unique();
            $table->string('nis')->nullable()->unique(); // letakkan di sini langsung

            $table->string('nama_lengkap');
            $table->string('nik');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->text('alamat_orangtua')->nullable();
            $table->string('no_hp_orangtua')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('hubungan_wali')->nullable();

            // Berkas
            $table->string('pas_foto')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('bukti_daftar')->nullable(); 
            $table->string('bukti_daftar_ulang')->nullable(); 

            $table->date('tanggal_pendaftaran')->nullable();
            $table->string('info')->nullable();

            $table->enum('status', ['proses', 'terima', 'tolak', 'aktif'])->default('proses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
