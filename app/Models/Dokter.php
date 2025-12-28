<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['nama', 'spesialisasi', 'nomor_lisensi', 'no_telepon', 'email', 'alamat'];
    protected $table = 'dokters';
    public $timestamps = true;

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}

