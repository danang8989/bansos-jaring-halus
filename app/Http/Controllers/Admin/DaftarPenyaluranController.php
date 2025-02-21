<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Bantuan, Penduduk, JenisBantuan};
use Session;

class DaftarPenyaluranController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_status_penyaluran = $request->q_status_penyaluran;
        $q_jenis_bantuan = $request->q_jenis_bantuan;
        $q_nik = $request->q_nik;
        $bantuan = Bantuan::orderBy('id', 'asc');
        $jenis_bantuan = JenisBantuan::orderBy('nama', 'asc')->get();
        
        if (!empty($q_status_penyaluran)) {
            if ($q_status_penyaluran == 0) {
                $bantuan->where('status', 0);
            }else{
                $bantuan->where('status', 1);
            }
        }

        if (!empty($q_jenis_bantuan)) {
            $bantuan->where('jenis_bantuan_id', 'LIKE', '%'.$q_jenis_bantuan.'%');
        }

        if (!empty($q_nik)) {
            $bantuan->whereIn('penduduk_id', function($query) use($q_nik){
                $query->select('id')->from('penduduks')->where('nik', 'like', '%'.$q_nik.'%');
            });
        }

        $bantuan = $bantuan->simplePaginate(15);

        return view('apps.admin.daftar_penyaluran.index')->with('bantuan', $bantuan)
                                                ->with('jenis_bantuan', $jenis_bantuan)
                                                ->with('q_nik', $q_nik)
                                                ->with('q_jenis_bantuan', $q_jenis_bantuan)
                                                ->with('q_status_penyaluran', $q_status_penyaluran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bantuan $bantuan)
    {   
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        $jenis_bantuan = JenisBantuan::orderBy('nama', 'asc')->get();

        return view('apps.admin.daftar_penyaluran.edit')->with('bantuan', $bantuan)->with('jenis_bantuan', $jenis_bantuan)->with('penduduk', $penduduk);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bantuan = Bantuan::findOrFail($request->id); 
        $data['status'] = 1;
        $data['tanggal_penyaluran'] = date('Y-m-d');

        $bantuan->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.daftar_penyaluran');
    }
}
