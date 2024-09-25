<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;

class KategoriBarangChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $kategori_barang = DB::table('barang_sirs_transaksi')
                            ->select(DB::raw('kategori_nama, SUM(jml_masuk) as tes'))
                            ->leftJoin('barang_sirs', 'barang_sirs_transaksi.inventory_id', 'barang_sirs.inventory_id')
                            ->join('barang_sirs_kategori', 'barang_sirs.kategori_id', 'barang_sirs_kategori.kategori_id')
                            ->where('status_barang', '1')
                            ->groupBy('barang_sirs.kategori_id', 'kategori_nama')
                            ->get();
        $addData = array();
        $setLabels = array();

        foreach ($kategori_barang as $key) {
            array_push($addData, round($key->tes / $kategori_barang->sum('tes') * 100));
            array_push($setLabels, $key->kategori_nama);
        }

        return $this->chart->donutChart()
            ->setTitle('KATEGORI BARANG')
            ->setsubTitle('dalam %')
            ->addData($addData)
            ->setLabels($setLabels);
    }
}
