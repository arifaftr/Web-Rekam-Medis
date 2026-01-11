<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama', 'dosis', 'harga', 'stok', 'kategori', 'keterangan'];
    protected $table = 'obats';
    public $timestamps = true;

    /**
     * Get the rekam medis for this obat
     */
    public function rekamMedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'obat_rekam_medis', 'obat_id', 'rekam_medis_id')->withTimestamps();
    }
}
