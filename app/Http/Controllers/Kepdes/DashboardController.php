<?php

namespace App\Http\Controllers\Kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Penduduk, Bantuan, Dusun};

class DashboardController extends Controller
{
    public function index(){
        $daftar_dusun = Dusun::orderBy('nama', 'asc')->get();
        $daftar_belum_tersalurkan = Bantuan::where('status', 0)->get();
        $dusun = Dusun::count();
        $penduduk = Penduduk::count();
        $laki_laki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();
        $disabilitas = Penduduk::where('disabilitas', 1)->count();
        $sudah_tersalurkan = Bantuan::where('status', 1)->count();
        $belum_tersalurkan = Bantuan::where('status', 0)->count();
        return view('apps.kepdes.dashboard')->with('penduduk', $penduduk)
                                           ->with('laki_laki', $laki_laki)
                                           ->with('daftar_belum_tersalurkan', $daftar_belum_tersalurkan)
                                           ->with('dusun', $dusun)
                                           ->with('daftar_dusun', $daftar_dusun)
                                           ->with('perempuan', $perempuan)
                                           ->with('disabilitas', $disabilitas)
                                           ->with('sudah_tersalurkan', $sudah_tersalurkan)
                                           ->with('belum_tersalurkan', $belum_tersalurkan);
    }
}
