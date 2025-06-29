<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('santris')->insert([
                'nomor_pendaftaran'=> 'REG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_lengkap'     => 'Santri Contoh ' . $i,
                'nik'              => str_pad(3201010000000000 + $i, 16, '0', STR_PAD_LEFT),
                'jenis_kelamin'    => $i % 2 === 0 ? 'P' : 'L',
                'tempat_lahir'     => 'Tempat ' . $i,
                'tanggal_lahir'    => '2010-01-' . str_pad(($i % 28) + 1, 2, '0', STR_PAD_LEFT),
                'no_hp'            => '0812345678' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'email'            => "santri{$i}@example.com",
                'alamat'           => 'Alamat Santri No. ' . $i,
                'nama_ayah'        => 'Ayah Santri ' . $i,
            ]);
        }
    }
}
