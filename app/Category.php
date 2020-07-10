<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function gets()
    {
        // return $this->hasMany(Get::class, 'nama_field');  <<<<<< di gunakan apabila nama filed nya bukan 'category_id'
        return $this->hasMany(Get::class);
    }
}
