<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBantuan;
use Session;

class JenisBantuanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_name = $request->q_name;
        $jenis_bantuan = JenisBantuan::orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $jenis_bantuan->where('nama', 'like', '%'.$q_name.'%');
        }

        $jenis_bantuan = $jenis_bantuan->simplePaginate(15);

        return view('apps.admin.jenis_bantuan.index')->with('jenis_bantuan', $jenis_bantuan)
                                                    ->with('q_name', $q_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.admin.jenis_bantuan.create');
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
        $jenis_bantuan = JenisBantuan::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('admin.jenis_bantuan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBantuan $jenis_bantuan)
    {   
        return view('apps.admin.jenis_bantuan.edit')->with('jenis_bantuan', $jenis_bantuan);
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
        $jenis_bantuan = JenisBantuan::findOrFail($request->id); 
        $data = $request->all();

        $jenis_bantuan->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('admin.jenis_bantuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $jenis_bantuan = JenisBantuan::findOrFail($request->id);
        $jenis_bantuan->delete();
        
        return redirect()->back();
    }
}
