<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Get extends Model
{
    protected $fillable = ['title', 'slug', 'body']; //gunakan saat yang menginput adalah user (alasan keamanan)
    // protected $guard =[]; //gunakan saat yang menginput anda sendiri
}
