<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\{Konsumsi, Penduduk};

class KonsumsiController extends Controller
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
        $konsumsi = Konsumsi::orderBy('id', 'asc');
        
        if (!empty($q_nama)) {
            $konsumsi->whereIn('penduduk_id', function($query) use($q_nama){
                $query->select('id')->from('penduduks')->where('nama', 'like', '%'.$q_nama.'%');
            });
        }

        if (!empty($q_kk)) {
            $konsumsi->whereIn('penduduk_id', function($query) use($q_kk){
                $query->select('id')->from('penduduks')->where('no_kk', 'like', '%'.$q_kk.'%');
            });
        }

        if (!empty($q_nik)) {
            $konsumsi->whereIn('penduduk_id', function($query) use($q_nik){
                $query->select('id')->from('penduduks')->where('nik', 'like', '%'.$q_nik.'%');
            });
        }

        $konsumsi = $konsumsi->simplePaginate(15);

        return view('apps.admin.klasifikasi_konsumsi.index')->with('konsumsi', $konsumsi)
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
        return view('apps.admin.klasifikasi_konsumsi.create')->with('penduduk', $penduduk);
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
        $konsumsi = Konsumsi::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.konsumsi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsumsi $konsumsi)
    {   
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        return view('apps.admin.klasifikasi_konsumsi.edit')->with('konsumsi', $konsumsi)->with('penduduk', $penduduk);
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
        $konsumsi = Konsumsi::findOrFail($request->id); 
        $data = $request->all();

        $konsumsi->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.konsumsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $konsumsi = Konsumsi::findOrFail($request->id);
        $konsumsi->delete();
        
        return redirect()->back();
    }
}
