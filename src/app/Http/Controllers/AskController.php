<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function index()
    {
        return view('ask.index');
    }

    public function show($id)
    {
        $comment = Comment::with('user')->findOrFail($id);
        return view('ask.show', ['comment' => $comment]);
    }

}
