<?php

namespace App\Http\Controllers\Kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBantuan;

class JenisBantuanController extends Controller
{
    public function index(Request $request){
        $q_name = $request->q_name;
        $jenis_bantuan = JenisBantuan::orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $jenis_bantuan->where('nama', 'like', '%'.$q_name.'%');
        }

        $jenis_bantuan = $jenis_bantuan->simplePaginate(15);

        return view('apps.admin.jenis_bantuan.index')->with('jenis_bantuan', $jenis_bantuan)
                                                    ->with('q_name', $q_name);
    }
}
