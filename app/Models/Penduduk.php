<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $guarded = ['id'];

    public function dusun(){
        return $this->belongsto(Dusun::class);
    }
}
