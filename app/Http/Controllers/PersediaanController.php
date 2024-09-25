<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    AnggaranKategori,
    BarangKategori,
    BarangKeluar,
    BarangMasuk,
    BarangSIMRS,
    BarangSIRS,
    BarangTransaksi,
    UnitKerja
};
Use Alert;
Use DB;
Use Auth;
Use App\Charts\KategoriBarangChart;
use App\Exports\BarangTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PersediaanController extends Controller
{
    public function RekapPersediaan(KategoriBarangChart $KategoriBarangChart)
    {
        $barang = BarangSIRS::count();

        $barangmasuk = BarangTransaksi::where('status_barang', '1')->sum('jml_masuk');

        $barangkeluar = BarangTransaksi::where('status_barang', '2')->sum('jml_keluar');

        $persediaan = DB::select("
            SELECT
                barang_sirs_transaksi.inventory_id,
                inventory_nm,
                inventory_harga_beli,
                SUM(jml_masuk) as barang_masuk,
                COALESCE(SUM(jml_keluar), 0) as barang_keluar,
                SUM(jml_masuk)-COALESCE(SUM(jml_keluar), 0) as selisih
            FROM
                barang_sirs_transaksi
            LEFT JOIN
                rs_inventory
                ON barang_sirs_transaksi.inventory_id = rs_inventory.inventory_id
            GROUP BY
                barang_sirs_transaksi.inventory_id, inventory_nm, inventory_harga_beli
            ORDER BY selisih DESC
            ");

        return view('admin.rekap_persediaan', ['barang'=>$barang, 'barangmasuk'=>$barangmasuk, 'barangkeluar'=>$barangkeluar, 'persediaan'=>$persediaan, 'KategoriBarangChart'=>$KategoriBarangChart->build()]);
    }
    
    public function KategoriAnggaran()
    {
        $kategori_anggaran = AnggaranKategori::all();
        return view('admin.kategori_anggaran', ['kategori_anggaran'=>$kategori_anggaran]);
    }

    public function createKategoriAnggaran(Request $request)
    {
        $simpananggaran = AnggaranKategori::create([
            'anggaran_nama' => $request->anggaran_nama,
            'user' => Auth::user()->email,
        ]);

        if ($simpananggaran) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/kategori_anggaran');
    }

    public function updateKategoriAnggaran(Request $request, $id)
    {
        $ubahanggaran = AnggaranKategori::find($id);
        $ubahanggaran->update([
            'anggaran_nama' => $request->anggaran_nama,
            'user' => Auth::user()->email,
        ]);

        if ($ubahanggaran) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/kategori_anggaran');
    }
    
    public function KategoriBarang()
    {
        $barang_kategori = BarangKategori::all();
        return view('admin.kategori_barang', ['barang_kategori'=>$barang_kategori]);
    }

    public function createKategoriBarang(Request $request)
    {
        $simpankategori = BarangKategori::create([
            'kategori_nama' => $request->kategori_nama,
            'user' => Auth::user()->email,
        ]);


        if ($simpankategori) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/kategori_barang');
    }

    public function updateKategoriBarang(Request $request, $id)
    {
        $ubahkategori = BarangKategori::find($id);
        $ubahkategori->update([
            'kategori_nama' => $request->kategori_nama,
            'user' => Auth::user()->email,
        ]);

        if ($ubahkategori) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/kategori_barang');
    }

    public function daftarBarang()
    {
        $kategori_anggaran = AnggaranKategori::all();
        $barang_kategori = BarangKategori::orderBy('updated_at', 'desc')->get();
        $barang_nama = BarangSIMRS::orderBy('inventory_nm', 'asc')->get();
        $persediaan = BarangSIRS::orderBy('updated_at', 'desc')->get();
        return view('admin.daftar_barang', ['barang_kategori'=>$barang_kategori, 'barang_nama'=>$barang_nama, 'persediaan'=>$persediaan, 'kategori_anggaran'=>$kategori_anggaran]);
    }

    public function createBarang(Request $request)
    {
        $simpabarang = BarangSIRS::create([
            'tgl_barang' => $request->tgl_barang,
            'inventory_id' => $request->inventory_id,
            'anggaran_id' => $request->anggaran_id,
            'kategori_id' => $request->kategori_id,
            'user' => Auth::user()->email,
        ]);

        if ($simpabarang) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/daftar_barang');
    }

    public function updateBarang(Request $request, $id)
    {
        $simpabarang = BarangSIRS::find($id);
        $simpabarang->update([
            'tgl_barang' => $request->tgl_barang,
            'inventory_id' => $request->inventory_id,
            'anggaran_id' => $request->anggaran_id,
            'kategori_id' => $request->kategori_id,
            'user' => Auth::user()->email,
        ]);

        if ($simpabarang) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/daftar_barang');
    }

    public function BarangMasuk()
    {
        $barangmasuk = BarangTransaksi::where('status_barang','1')->orderBy('transaksi_id', 'desc')->get();

        $persediaan = BarangSIRS::all();
        return view('admin.barang_masuk', ['barangmasuk'=>$barangmasuk, 'persediaan'=>$persediaan]);
    }

    public function createBarangMasuk(Request $request)
    {
        $barangmasuk = BarangTransaksi::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'inventory_id' => $request->inventory_id,
            'id_barang' => $request->id_barang,
            'as_barang' => $request->as_barang,
            'jml_masuk' => $request->jml_masuk,
            'ket' => $request->ket,
            'status_barang' => 1,
        ]);

        if ($barangmasuk) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/barang_masuk');
    }

    public function updateBarangMasuk(Request $request, $id)
    {
        $updatebarangmasuk = BarangTransaksi::find($id);
        $updatebarangmasuk->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'as_barang' => $request->as_barang,
            'id_barang' => $request->id_barang,
            'jml_masuk' => $request->jml_masuk,
            'ket' => $request->ket,
            'status_barang' => 1,
        ]);

        if ($updatebarangmasuk) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/barang_masuk');
    }

    public function BarangKeluar()
    {
        $barangmasuk = DB::select("
            SELECT
                barang_sirs_transaksi.inventory_id as id_barang_sirs,
                inventory_nm,
                SUM(jml_masuk)-COALESCE(SUM(jml_keluar), 0) as tes
            FROM
                barang_sirs_transaksi
            LEFT JOIN
                rs_inventory
                ON barang_sirs_transaksi.inventory_id = rs_inventory.inventory_id  
            GROUP BY
                barang_sirs_transaksi.inventory_id, inventory_nm
                ORDER BY id_barang_sirs ASC
            ");

        $barangkeluar = BarangTransaksi::where('status_barang','2')->orderBy('transaksi_id', 'desc')->get();

        $unitkerja = UnitKerja::where('status_unit', '1')->orderBy('unit_nama', 'asc')->get();

        return view('admin.barang_keluar', ['barangmasuk'=>$barangmasuk, 'barangkeluar'=>$barangkeluar, 'unitkerja'=>$unitkerja]);
    }

    public function createBarangKeluar(Request $request)
    {
        $selisih = $request->tes;

        $barangkeluar = BarangTRansaksi::create([
            'tgl_transaksi' => $request->tgl_keluar,
            'inventory_id' => $request->inventory_id,
            'unit_id' => $request->unit_id,
            'jml_keluar' => $request->jml_keluar,
            'ket' => $request->ket,
            'user' => Auth::user()->email,
            'status_barang' => 2,
        ]);

        if ($barangkeluar) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Allert::error('Gagal', 'Simpan Data');
        }

        return redirect('/barang_keluar');
    }

    public function LaporanBarang()
    {
        return view('admin.laporan_barang');
    }

    public function LaporanProses(Request $request)
    {
        $jenis_laporan = $request->jenis_laporan;
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        
        $laporan = DB::select("
                SELECT * FROM barang_sirs_transaksi WHERE status_barang = '$jenis_laporan' AND (tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir') 
            ");


        return Excel::download(new BarangTransaksiExport, 'Barang.xlsx');
    }
}
