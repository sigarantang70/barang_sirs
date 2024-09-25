<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'rs_unit_kerja';

    public function barangtransaksi()
    {
        return $this->hasMany(BarangTransaksi::class, 'unit_id', 'unit_id');
    }

    public function printer()
    {
        return $this->hasMany(Printer::class, 'unit_id', 'unit_id');
    }
}
