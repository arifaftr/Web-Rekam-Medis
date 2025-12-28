<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama', 'dosis', 'harga', 'stok'];
    protected $table = 'obats';
    public $timestamps = true;
}
