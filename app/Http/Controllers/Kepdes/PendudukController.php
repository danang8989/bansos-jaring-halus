<?php

namespace App\Http\Controllers\Kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Dusun, Penduduk};
use Session;

class PendudukController extends Controller
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
        $penduduk = Penduduk::orderBy('id', 'asc');
        
        if (!empty($q_nama)) {
            $penduduk->where('nama', 'like', '%'.$q_nama.'%');
        }

        if (!empty($q_kk)) {
            $penduduk->where('no_kk', 'like', '%'.$q_kk.'%');
        }

        if (!empty($q_nik)) {
            $penduduk->where('nik', 'like', '%'.$q_nik.'%');
        }

        $penduduk = $penduduk->simplePaginate(15);

        return view('apps.kepdes.penduduk.index')->with('penduduk', $penduduk)
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
        $dusun = Dusun::orderBy('nama', 'asc')->get();
        return view('apps.kepdes.penduduk.create')->with('dusun', $dusun);
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
        $penduduk = Penduduk::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('kepdes.penduduk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(penduduk $penduduk)
    {   
        $dusun = Dusun::orderBy('nama', 'asc')->get();
        return view('apps.kepdes.penduduk.edit')->with('penduduk', $penduduk)->with('dusun', $dusun);
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
        $penduduk = Penduduk::findOrFail($request->id); 
        $data = $request->all();

        $penduduk->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('kepdes.penduduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $penduduk = Penduduk::findOrFail($request->id);
        $penduduk->delete();
        
        return redirect()->back();
    }
}
