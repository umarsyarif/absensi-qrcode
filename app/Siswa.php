<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    //protected $guarded = ['id'];
    protected $fillable = ['user_id', 'kelas_id', 'jenis_kelamin', 'alamat', 
                            'no_hp', 'nama_ibu', 'no_hp_ibu', 'nama_ayah', 'no_hp_ayah', 'foto'];

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

    public function absensi()
    {
        return $this->hasMany('App\Absensi');
    }
}
