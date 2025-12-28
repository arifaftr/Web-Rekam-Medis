<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $fillable = ['pasien_id', 'dokter_id', 'tanggal_kunjungan', 'keluhan', 'diagnosa', 'resep', 'biaya'];
    protected $table = 'rekam_medis';
    public $timestamps = true;

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}

