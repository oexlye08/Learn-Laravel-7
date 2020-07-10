<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Get extends Model
{
    protected $fillable = ['title', 'slug', 'body']; //gunakan saat yang menginput adalah user (alasan keamanan)
    // protected $guard =[]; //gunakan saat yang menginput anda sendiri

    public function category()
    {
        // return $this->belongsTo(Category::class, 'nama_field'); <<<<<< di gunakan apabila nama filed nya bukan 'category_id'
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
