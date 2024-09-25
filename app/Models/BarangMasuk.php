<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_sirs_masuk';
    protected $fillable = [
        'tgl_masuk',
        'id_barang',
        'jml_barang',
        'ket',
        'as_barang'
    ];
}
