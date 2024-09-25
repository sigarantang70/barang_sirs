<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{UnitKerja, Printer};
use Alert;

class PrinterController extends Controller
{
    public function RekapPrinter()
    {
        $merk = Printer::select('merk')->GroupBy('merk')->get();
        return view('printer.rekap_printer', ['merk'=>$merk]);
    }

    public function index()
    {
        $printer = Printer::orderBy('updated_at', 'desc')->get();
        return view('printer.daftar_printer', ['printer'=>$printer]);
    }

    public function formCreate()
    {
        $unit_kerja = UnitKerja::where('status_unit', '1')->orderBy('unit_nama', 'asc')->get();
        return view('printer.tambah_printer', ['unit_kerja'=>$unit_kerja]);
    }

    public function create(Request $request)
    {
        $simpanprinter = Printer::create([
            'merk'=>$request->merk,
            'tipe'=>$request->tipe,
            'tahun'=>$request->tahun,
            'bmn_no'=>$request->bmn_no,
            'bmn_file'=>$request->bmn_file,
            'mac'=>$request->mac,
            'ip'=>$request->ip,
            'printer_file'=>$request->bmn_file,
            'unit_id'=>$request->unit_id,
            'lokasi'=>$request->lokasi,
            'status'=>$request->status
            //'user' => Auth::user()->email,
        ]);

        if($simpanprinter){
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Alert::error('Gagal', 'Simpan Data');
        }

        return redirect('/daftar_printer');
    }

    public function formEdit($id)
    {
        $unit_kerja = UnitKerja::where('status_unit', '1')->orderBy('unit_nama', 'asc')->get();
        $editprinter = Printer::find($id);
        return view('printer.edit_printer', ['editprinter'=>$editprinter, 'unit_kerja'=>$unit_kerja]);
    }

    public function UpdatePrinter(Request $request)
    {
        $printer_id = $request->printer_id;
        $updateprinter = Printer::find($printer_id);
        $updateprinter->update([
            'merk'=>$request->merk,
            'tipe'=>$request->tipe,
            'tahun'=>$request->tahun,
            'bmn_no'=>$request->bmn_no,
            'bmn_file'=>$request->bmn_file,
            'mac'=>$request->mac,
            'ip'=>$request->ip,
            'printer_file'=>$request->bmn_file,
            'unit_id'=>$request->unit_id,
            'lokasi'=>$request->lokasi,
            'status'=>$request->status
        ]);

        if($updateprinter){
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Alert::error('Gagal', 'Simpan Data');
        }

        return redirect('/daftar_printer');

    }
}
