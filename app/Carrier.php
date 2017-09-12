<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public function pathline()
    {
        return $this->hasOne('App\Pathline');
    }
}
