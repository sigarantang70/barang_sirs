<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKategori extends Model
{
    use HasFactory;

    protected $table = 'barang_sirs_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'kategori_nama',
        'user'
    ];
    
    public function barangsirs()
    {
        return $this->hasMany(BarangSIRS::class, 'kategori_id', 'kategori_id');
    }
}