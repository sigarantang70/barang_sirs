<?php

namespace App\Exports;

use App\Models\BarangTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangTransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = BarangTransaksi::all();
        return $data;
    }
}
