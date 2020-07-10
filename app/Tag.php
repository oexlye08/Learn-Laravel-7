<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function gets()
    {
        return $this->belongsToMany(Get::class);
    }
}
