<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nama', 'nomor_identitas', 'alamat', 'no_telepon', 'email', 'tanggal_lahir', 'jenis_kelamin'];
    protected $table = 'pasiens';
    public $timestamps = true;

    /**
     * Get the rekam medis for the pasien
     */
    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class);
    }
}
