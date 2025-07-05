<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Pengumuman extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $logName = 'Pengumuman';
    protected static $logOnlyDirty = true;
    protected $fillable = ['judul', 'img', 'isi'];

    public function santris()
    {
        return $this->belongsToMany(Santri::class, 'pengumuman_santri');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*'])
            ->useLogName('Pengumuman')
            ->logOnlyDirty();
    }
}
