<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nama', 'nomor_identitas', 'alamat', 'no_telepon', 'email'];
    protected $table = 'pasiens';
    public $timestamps = true;
}
