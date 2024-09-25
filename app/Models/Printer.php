<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $table = 'printer';
    protected $primaryKey = 'printer_id';
    protected $fillable = [
        'merk',
        'tipe',
        'tahun',
        'bmn_no',
        'bmn_file',
        'mac',
        'ip',
        'printer_file',
        'unit_id',
        'lokasi',
        'status'
    ];

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_id', 'unit_id');
    }
}
