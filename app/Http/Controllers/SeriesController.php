<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function show(Serie $serie)
    {
        // $abc = Serie::where('slug', $slug)-> firstOrFail();

        return view('series.create', compact('serie'));
    }
}
