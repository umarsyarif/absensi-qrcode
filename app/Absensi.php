<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [ 'siswa_id', 'jadwal_id', 'status'];

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }
}
