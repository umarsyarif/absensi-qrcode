<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Jadwal extends Pivot
{
    protected $table = 'jadwal';

    protected $fillable = ['id', 'mapel_id', 'guru_id', 'kelas_id'];
    
    public function siswa()
    {
        return $this->belongsToMany('App\Siswa','absensi', 'jadwal_id', 'siswa_id'); 
    }

    public function kelas()
    {
    return $this->belongsToMany('App\Kelas')->using('App\Jadwal');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
