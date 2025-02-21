<?php

namespace App\Http\Controllers\Kepdes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dusun;
use Session;

class DusunController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_name = $request->q_name;
        $dusun = Dusun::orderBy('id', 'asc');
        
        if (!empty($q_name)) {
            $dusun->where('nama', 'like', '%'.$q_name.'%');
        }

        $dusun = $dusun->simplePaginate(15);

        return view('apps.kepdes.dusun.index')->with('dusun', $dusun)
                                                    ->with('q_name', $q_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.kepdes.dusun.create');
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
        $dusun = Dusun::create($data);

        Session::flash('flash_message', 'Data telah ditambah');
        return redirect()->route('kepdes.dusun');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dusun $dusun)
    {   
        return view('apps.kepdes.dusun.edit')->with('dusun', $dusun);
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
        $dusun = Dusun::findOrFail($request->id); 
        $data = $request->all();

        $dusun->update($data);

        Session::flash('flash_message', 'Data telah diubah');
        return redirect()->route('kepdes.dusun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $dusun = Dusun::findOrFail($request->id);
        $dusun->delete();
        
        return redirect()->back();
    }
}
