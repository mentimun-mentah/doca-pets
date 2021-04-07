<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreatController extends Controller
{
    public function index()
    {
        return view('treat.index');
    }

    public function show($slug)
    {
        return view('treat.show');
    }
}
