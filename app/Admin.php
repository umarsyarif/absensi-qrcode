<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    //protected $guarded = ['id'];
    protected $fillable = ['user_id', 'kelas_id', 'jenis_kelamin', 'alamat', 
                            'no_hp', 'foto'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
