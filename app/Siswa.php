<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['id'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
