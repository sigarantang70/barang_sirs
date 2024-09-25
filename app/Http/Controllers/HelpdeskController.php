<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{Helpdesk, Unit};
use Carbon\Carbon;
Use Alert;

class HelpdeskController extends Controller
{
    public function tesAPI()
    {
        $daftar_helpdesk = Helpdesk::all();
        return $daftar_helpdesk;
    }

    public function daftarHelpdesk()
    {
        //ambil semua data helpdesk
        $user = Auth::user()->email;
        $daftar_helpdesk = Helpdesk::where('user', $user)->orderBy('status', 'asc')->orderBy('waktu_pengajuan', 'desc')->get();

        //ambil semua data unit
        $daftar_unit = Unit::all();
        
        return view('admin.pages.daftar_helpdesk')->with(['daftar_unit'=>$daftar_unit, 'daftar_helpdesk'=>$daftar_helpdesk]);
    }

    public function prosesTambahKendala(Request $request)
    {
        if($request->hasFile('foto_kendala')) {
            $filesize = $request->file('foto_kendala')->getSize();
            if ($filesize > 1000000) {
                $notif = 'danger';
                $pesan = 'Gagal Simpan Data. Ukuran File diatas 1Mb';

                return redirect('/daftar_helpdesk')->with(['notif'=>$notif, 'pesan'=>$pesan]);
            }else{
                $file = $request->file('foto_kendala');
                $extension = $file->getClientOriginalExtension();
                $uid = Auth::user()->id;
                $filename = $uid.time().".".$extension;
                $file->move(public_path('foto_kendala'), $filename);
            }
        }else{
            $filename = NULL;
        }

        $helpdesk = new Helpdesk;
        $helpdesk->user = $request->nama_pegawai;
        $helpdesk->user_unit = $request->unit_pegawai;
        $helpdesk->kategori = $request->kategori;
        $helpdesk->uraian = $request->uraian;
        $helpdesk->foto = $filename;
        $helpdesk->status = 0;
        $helpdesk->petugas = 0;
        $helpdesk->waktu_pengajuan = Carbon::now();
        $helpdesk->date_updated = Carbon::now();
        $helpdesk->save();

        $mail_data = [
            'recipient' => 'sigarantang70@gmail.com',
            'fromEmail' => 'faishalnrdsyah@gmail.com',
            'fromName' => 'Helpdesk SIRS',
            'subject' => 'Pengajuan Helpdesk',
            'body' => 'Pengajuan Helpdesk atas nama',
        ];

        \Mail::send('email-template', $mail_data, function($message) use($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        if ($helpdesk) {
            Alert::success('Berhasil', 'Simpan Data');
        }else{
            Alert::error('Gagal', 'Simpan Data');
        }
        
        return redirect('/daftar_helpdesk');
    }

}
