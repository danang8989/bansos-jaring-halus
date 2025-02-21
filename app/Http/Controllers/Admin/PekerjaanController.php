<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Penduduk, Pekerjaan};
use Session;
class PekerjaanController extends Controller
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
        $pekerjaan = Pekerjaan::orderBy('id', 'asc');
        
        if (!empty($q_nama)) {
            $pekerjaan->whereIn('penduduk_id', function($query) use($q_nama){
                $query->select('id')->from('penduduks')->where('nama', 'like', '%'.$q_nama.'%');
            });
        }

        if (!empty($q_kk)) {
            $pekerjaan->whereIn('penduduk_id', function($query) use($q_kk){
                $query->select('id')->from('penduduks')->where('no_kk', 'like', '%'.$q_kk.'%');
            });
        }

        if (!empty($q_nik)) {
            $pekerjaan->whereIn('penduduk_id', function($query) use($q_nik){
                $query->select('id')->from('penduduks')->where('nik', 'like', '%'.$q_nik.'%');
            });
        }

        $pekerjaan = $pekerjaan->simplePaginate(15);

        return view('apps.admin.klasifikasi_pekerjaan.index')->with('pekerjaan', $pekerjaan)
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
        return view('apps.admin.klasifikasi_pekerjaan.create')->with('penduduk', $penduduk);
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
        $pekerjaan = Pekerjaan::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.pekerjaan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {   
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        return view('apps.admin.klasifikasi_pekerjaan.edit')->with('pekerjaan', $pekerjaan)->with('penduduk', $penduduk);
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
        $pekerjaan = Pekerjaan::findOrFail($request->id); 
        $data = $request->all();

        $pekerjaan->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.pekerjaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pekerjaan = Pekerjaan::findOrFail($request->id);
        $pekerjaan->delete();
        
        return redirect()->back();
    }
}
