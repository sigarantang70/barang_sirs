<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApprovalController extends Controller
{
    public function daftarApproval()
    {
        $unit = DB::table('rs_unit_kerja')->orderBy('unit_nama')->get();
        $daftar_helpdesk = DB::table('helpdesk_sirs')->orderBy('status', 'asc')->orderBy('waktu_pengajuan', 'desc')->get(); 
        $daftar_petugas = DB::table('helpdesk_petugas')->join('users', 'helpdesk_petugas.user_id', '=', 'users.id')->select('helpdesk_petugas.date_updated', 'users.email')->get();
        return view('admin.pages.daftar_approval')->with(['unit'=>$unit, 'daftar_helpdesk'=>$daftar_helpdesk, 'daftar_petugas'=>$daftar_petugas]);
    }

    public function prosesTambahApprove(Request $request)
    {   
        $id_helpdesk = $request->input('id_helpdesk');
        DB::table('helpdesk_sirs')->where('id', $id_helpdesk)->update([
            'petugas' => $request->input('petugas'),
            'status' => '1',
            'waktu_respon' => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/daftar_approval')->with(['notif'=>'success', 'pesan'=>'Berhasil Simpan Data']);
    }

}
