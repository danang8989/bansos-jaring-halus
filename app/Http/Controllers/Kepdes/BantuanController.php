<?php

namespace App\Http\Controllers\kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Penduduk, Bantuan, JenisBantuan};
use Session;

class BantuanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $q_kk = $request->q_kk;
        $q_nik = $request->q_nik;
        $bantuan = Bantuan::orderBy('id', 'asc');
        
        if (!empty($q_nama)) {
            $bantuan->whereIn('penduduk_id', function($query) use($q_nama){
                $query->select('id')->from('penduduks')->where('nama', 'like', '%'.$q_nama.'%');
            });
        }

        if (!empty($q_kk)) {
            $bantuan->whereIn('penduduk_id', function($query) use($q_kk){
                $query->select('id')->from('penduduks')->where('no_kk', 'like', '%'.$q_kk.'%');
            });
        }

        if (!empty($q_nik)) {
            $bantuan->whereIn('penduduk_id', function($query) use($q_nik){
                $query->select('id')->from('penduduks')->where('nik', 'like', '%'.$q_nik.'%');
            });
        }

        $bantuan = $bantuan->simplePaginate(15);

        return view('apps.kepdes.klasifikasi_bantuan.index')->with('bantuan', $bantuan)
                                                ->with('q_nama', $q_nama)
                                                ->with('q_kk', $q_kk)
                                                ->with('q_nik', $q_nik);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        $jenis_bantuan = JenisBantuan::orderBy('nama', 'asc')->get();
        return view('apps.kepdes.klasifikasi_bantuan.create')->with('penduduk', $penduduk)->with('jenis_bantuan', $jenis_bantuan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        $data['status'] = 0;
        
        $bantuan = Bantuan::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('kepdes.bantuan');
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

        return view('apps.kepdes.klasifikasi_bantuan.edit')->with('bantuan', $bantuan)->with('jenis_bantuan', $jenis_bantuan)->with('penduduk', $penduduk);
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
        $data = $request->all();

        $bantuan->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('kepdes.bantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $bantuan = Bantuan::findOrFail($request->id);
        $bantuan->delete();
        
        return redirect()->back();
    }
}
