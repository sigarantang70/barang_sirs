<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\{Helpdesk, Unit};
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user()->email;

            /*
            $hak_akses = DB::table('meta_members')->leftJoin('helpdesk_petugas', 'peg_id', '=', 'helpdesk_petugas.user_id')->select('helpdesk_petugas.id')->get();
            */

            $nama = DB::table('meta_members')->join('users','meta_members.email_address','=','users.email')->get();

            return redirect('/dashboard')->with(['nama'=>$nama]);
        }
        return redirect('/login')->with(['notif'=>'gagal', 'pesan'=>'Login Gagal ...']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); 
    }
}