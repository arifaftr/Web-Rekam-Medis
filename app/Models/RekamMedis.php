<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $fillable = ['kode','pasien_id', 'dokter_id', 'tanggal_kunjungan', 'keluhan', 'diagnosa', 'resep', 'biaya'];
    protected $table = 'rekam_medis';
    public $timestamps = true;
    
    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'obat_rekam_medis', 'rekam_medis_id', 'obat_id')->withTimestamps();
    }
}

