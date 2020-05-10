<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TU extends Model
{
    protected $table = 'tu';

    protected $fillable = [
        'nip', 'nama', 'jenis_kelamin', 'alamat', 'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
