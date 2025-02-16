<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $guarded = ['id'];

    public function penduduk(){
        return $this->hasMany(Penduduk::class);
    }
}
