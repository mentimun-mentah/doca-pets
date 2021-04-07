<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function show($slug)
    {
        return view('petshow');
    }
}
