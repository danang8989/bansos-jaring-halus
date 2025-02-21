<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $guarded = ['id'];

    public function penduduk(){
        return $this->belongsto(Penduduk::class);
    }

    public function jenisBantuan(){
        return $this->belongsto(JenisBantuan::class);
    }

    public function getPenghasilanPerbulan($id){
        $pekerjaan = Pekerjaan::where('penduduk_id', $id)->first();

        return $pekerjaan->penghasilan_perbulan;
    }

    public function getPekerjaan($id){
        $pekerjaan = Pekerjaan::where('penduduk_id', $id)->first();

        return $pekerjaan->nama;
    }
}
