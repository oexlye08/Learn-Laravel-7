<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Get extends Model
{
    public function scopeLatestFirst()
    {
        return $this->latest()->first();
    }

    public function scopeLatestGet()
    {
        return $this->latest()->get();
    }
}
