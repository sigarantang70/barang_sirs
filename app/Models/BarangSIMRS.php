<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSIMRS extends Model
{
    use HasFactory;
    
    protected $table = 'rs_inventory';

    public function barangsirs()
    {
        return $this->hasMany(BarangSIRS::class, 'inventory_id', 'inventory_id');
    }

    public function barangtransaksi()
    {
        return $this->hasMany(BarangTransaksi::class, 'inventory_id', 'inventory_id');
    }
}
