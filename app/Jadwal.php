<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    
    public function siswa()
    {
        return $this->belongsToMany('App\Siswa','absensi', 'jadwal_id', 'siswa_id'); 
    }

    public function kelas()
    {
    return $this->belongsTo('App\Kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi');
    }
}
