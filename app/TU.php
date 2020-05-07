<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TU extends Model
{
    protected $table = 'tu';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
