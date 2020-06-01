<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasMany('App\jadwal');
    }
}
