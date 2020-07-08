<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $nama = "Oki Sulton <br>";
        $umur = "22 <br>";
        $pekerjaan = "Programmer <br>";
        $desk = "Saya adalah seorang programmer mobile adroid developer,
        saat ini saya sedang belajar menggunakan laravel untuk membuat API.";

    return view('contact', compact('nama', 'umur', 'pekerjaan', 'desk'));
    }
}
