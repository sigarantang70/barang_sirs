<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSIRS extends Model
{
    use HasFactory;
    
    protected $table = 'barang_sirs';
    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'tgl_barang',
        'inventory_id',
        'user',
        'anggaran_id',
        'kategori_id',
    ];

    public function barangkategori()
    {
        return $this->belongsTo(BarangKategori::class, 'kategori_id', 'kategori_id');
    }

    public function barangsimrs()
    {
        return $this->belongsTo(BarangSIMRS::class, 'inventory_id', 'inventory_id');
    }

    public function barangtransaksi()
    {
        return $this->hasMany(BarangTransaksi::class,  'id', 'id_barang');
    }

    public function anggarankategori()
    {
        return $this->belongsTo(AnggaranKategori::class,  'anggaran_id', 'anggaran_id');
    }
}