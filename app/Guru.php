<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'jenis_kelamin', 'alamat', 
                            'no_hp', 'foto'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kelas()
    {
        return $this->belongsToMany('App\Kelas', 'jadwal', 'guru_id', 'kelas_id');
    }

}
