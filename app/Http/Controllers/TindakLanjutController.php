<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TindakLanjutController extends Controller
{
    public function daftarTindakLanjut()
    {       
        $unit = DB::table('rs_unit_kerja')->orderBy('unit_nama')->get();
        $daftar_helpdesk = DB::table('helpdesk_sirs')->where('status', 1)->where('user', '=', Auth::user()->email)->orderBy('status', 'asc')->orderBy('waktu_pengajuan', 'desc')->get(); 
        $daftar_petugas = DB::table('helpdesk_petugas')->join('users', 'helpdesk_petugas.user_id', '=', 'users.id')->select('helpdesk_petugas.date_updated', 'users.email')->get();
        
        return view('admin.pages.daftar_tindak_lanjut')->with(['unit'=>$unit, 'daftar_helpdesk'=>$daftar_helpdesk, 'daftar_petugas'=>$daftar_petugas]);
    }
}
