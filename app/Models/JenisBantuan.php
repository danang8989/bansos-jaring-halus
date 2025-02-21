<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    protected $guarded = ['id'];

    public function bantuan(){
        return $this->hasMany(Bantuan::class);
    }
}
