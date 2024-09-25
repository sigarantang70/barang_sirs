<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranKategori extends Model
{
    use HasFactory;

    protected $table = 'barang_sirs_anggaran';
    protected $primaryKey = 'anggaran_id';
    protected $fillable = [
        'anggaran_nama',
        'user'
    ];

    public function barang_sirs()
    {
        return $this->hasMany(BarangSIRS::class, 'anggaran_id', 'anggaran_id');
    }
}
