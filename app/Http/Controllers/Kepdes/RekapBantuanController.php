<?php

namespace App\Http\Controllers\Kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BantuanExport;
use App\Models\{Bantuan};

class RekapBantuanController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q_date_from = $request->q_date_from;
        $q_until_date = $request->q_until_date;
        $rekap_bantuan = Bantuan::where('status', 1)->orderBy('id', 'asc');
        
        $rekap_bantuan = $rekap_bantuan->simplePaginate(15);

        return view('apps.kepdes.rekap_bantuan.index')->with('rekap_bantuan', $rekap_bantuan)
                                                    ->with('q_date_from', $q_date_from)
                                                    ->with('q_until_date', $q_until_date);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function download(Request $request)
    {
        return Excel::download(new BantuanExport($request->q_date_from, $request->q_until_date), 'daftar-penyaluran.xlsx');
    }
}
