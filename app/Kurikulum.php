<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';

    protected $fillable = [
        'nip', 'nama', 'jenis_kelamin', 'alamat', 'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
