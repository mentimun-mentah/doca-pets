<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
          'judul' => 'required|string|min:3|max:255',
          'subject' => 'required|string|min:5',
        ]);

        $user = Auth::user();

        $user->comments()->create([
          'judul' => $request->judul,
          'subject' => $request->subject
        ]);

        return ['status' => 'Success add comment'];
    }

    public function getAllComment(Request $request)
    {
        $query = Comment::with('user');
        return $query->withCount('replies')->orderBy('id', 'desc')->paginate(6);
    }
}
