<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Santri extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logName = 'Santri';
    protected static $logOnlyDirty = true;
    use HasFactory;

    protected $table = 'santris';

    protected $fillable = [
        'nomor_pendaftaran',
        'nis',
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat',

        'nama_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'alamat_orangtua',
        'no_hp_orangtua',
        'nama_wali',
        'hubungan_wali',

        // Berkas
        'pas_foto',
        'kk',
        'akta_kelahiran',
        'bukti_daftar',
        'bukti_daftar_ulang',

        'tanggal_pendaftaran',
        'info',
        'status',
    ];


    protected $dates = [
        'tanggal_lahir',
        'tanggal_pendaftaran',
    ];

    public function pengumuman()
    {
        return $this->belongsToMany(Pengumuman::class, 'pengumuman_santri');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Santri')
            ->logOnlyDirty();
    }
}
