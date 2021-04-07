<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AskController extends Controller
{
    public function index()
    {
        return view('ask.index');
    }

    public function show($id)
    {
        return view('ask.show');
    }

}
