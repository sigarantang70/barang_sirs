<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PetugasController extends Controller
{
    public function daftarPetugas()
    {
        $users = DB::table('users')->orderBy('email')->get();
        $daftar_petugas = DB::table('helpdesk_petugas')->join('users', 'helpdesk_petugas.user_id', '=', 'users.id')->select('helpdesk_petugas.date_updated', 'users.email')->get();
        return view('admin.pages.daftar_petugas')->with(['users'=>$users, 'daftar_petugas'=>$daftar_petugas]);
    }

    public function prosesTambahPetugas(Request $request)
    {
        DB::table('helpdesk_petugas')->insert([
            'user_id' => $request->input('user_id'),
            'date_updated' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('/daftar_petugas')->with(['notif'=>'success', 'pesan'=>'Berhasil Simpan Data']);
    }
}
