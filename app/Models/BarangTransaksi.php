<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangTransaksi extends Model
{
    use HasFactory;

    protected $table = 'barang_sirs_transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = [
        'tgl_transaksi',
        'inventory_id',
        'barang_id',
        'unit_id',
        'jml_masuk',
        'jml_keluar',
        'ket',
        'user',
        'as_barang',
        'status_barang'
    ];

    public function barangsimrs()
    {
        return $this->belongsTo(BarangSIMRS::class, 'inventory_id', 'inventory_id');
    }

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_id', 'unit_id');
    }
}
