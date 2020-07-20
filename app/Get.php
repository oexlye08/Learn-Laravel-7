<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Get extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail']; //gunakan saat yang menginput adalah user (alasan keamanan)
    // protected $guard =[]; //gunakan saat yang menginput anda sendiri
    protected $with = ['author', 'category', 'tags'];

    public function category()
    {
        // return $this->belongsTo(Category::class, 'nama_field'); <<<<<< di gunakan apabila nama filed nya bukan 'category_id'
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getThumbnail()
    {
        return "/storage/" . $this->thumbnail;
    }
}
