<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pathline extends Model
{
    public function Carrier()
    {
        return $this->belongsTo('App\Carrier');
    }
    public function trainings()
    {
        return $this->belongsToMany('App\training');
    }
}
