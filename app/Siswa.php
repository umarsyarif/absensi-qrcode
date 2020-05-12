<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    //protected $guarded = ['id'];
    protected $fillable = ['id', 'nama'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jadwal()
    {
        return $this->belongsToMany('App\Jadwal','absensi','siswa_id', 'jadwal_id' );
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
