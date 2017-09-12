<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function pathlines()
    {
        return $this->hasMany('App\Pathline');
    }
}
