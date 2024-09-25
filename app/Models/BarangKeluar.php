<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_sirs_keluar';

    protected $fillable = [
        'tgl_keluar',
        'id_barang',
        'jml_barang_keluar',
        'ket',
        'unit_id',
        'status_barang'
    ];
}
