<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Penduduk, Bantuan};

class GrafikBantuanController extends Controller
{
    public function index(){
        // chart berdasarkan waktu
        $date_labels = Bantuan::where('status', 1)->groupBy('tanggal_penyaluran')->get();
        $penduduk_by_date_data = Bantuan::where('status', 1)->selectRaw('tanggal_penyaluran as tanggal_penyaluran, SUM(penduduk_id) as jumlah_penduduk')
                           ->groupBy('tanggal_penyaluran')
                           ->get();

        return response()->json(['message' => 'success', 'date_labels' => $date_labels, 'penduduk_by_date_data' => $penduduk_by_date_data]);

        // chart berdasarkan dusun
    }
}
