<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $guarded = ['id'];

    public function dusun(){
        return $this->belongsto(Dusun::class);
    }

    public function konsumsi(){
        return $this->hasMany(Konsumsi::class);
    }

    public function pekerjaan(){
        return $this->hasMany(Pekerjaan::class);
    }

    public function bantuan(){
        return $this->hasMany(Bantuan::class);
    }
}
