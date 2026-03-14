<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view("login");
    }

    public function processLogin(Request $request)
    {
        $tgl_lahir_input = $request->tahun . '-' . $request->bulan . '-' . $request->tanggal;

        $user = DB::table('tbl_jemaat')
            ->join('jemaat', 'users.id_jemaat', '=', 'jemaat.id_jemaat')
            ->where('users.username', $request->username)
            ->where('jemaat.tgl_lahir', $tgl_lahir_input)
            ->where('users.status_acc', 'aktif')
            ->select('users.*', 'jemaat.nama_lengkap')
            ->first();

        if ($user) {
            // Set Session sesuai kebutuhan Laravel
            Session::put('login', true);
            Session::put('id_user', $user->id_user);
            Session::put('username', $user->username);
            Session::put('nama_lengkap', $user->nama_lengkap);

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('message', ':: ulangi dgn username dan password yg benar');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }

}