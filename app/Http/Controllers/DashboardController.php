<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = count(User::where('level', 'pegawai')->get());
        $kepsek = count(User::where('level', 'kepala sekolah')->get());
        $siswa = count(User::where('level', 'siswa')->get());
        $guru = count(User::where('level', 'guru')->get());
        $tu = count(User::where('level', 'tata usaha')->get());
        $kategori = count(Kategori::all());
        $level = Auth::user()->level;
        
        if ($level === 'siswa') {
            $dokumen = count(Dokumen::where('siswa_id', Auth::user()->id)->get());
        } else {
            $dokumen = count(Dokumen::all());
        }

        return view('dashboard', compact(['pegawai', 'guru', 'kepsek', 'siswa', 'tu', 'kategori', 'dokumen', 'level']));
    }
}
