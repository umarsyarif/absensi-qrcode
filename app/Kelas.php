<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function guru()
    {
        // return $this->belongsToMany('App\guru', 'jadwal','kelas_id' , 'guru_id');
        return $this->belongsToMany('App\Guru')->using('App\Jadwal');
    }

    public function siswa()
    {
        return $this->hasMany('App\Siswa');
    }
}
