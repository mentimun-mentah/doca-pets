<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use App\Models\Replies;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate([
          'balasan' => 'required|string|min:5',
        ]);
    
        $comment = Comment::findOrFail($id);

        $comment->replies()->create([
          'balasan' => $request->balasan,
          'user_id' => Auth::user()->id
        ]);

        return ['status' => 'Success add reply'];
    }  

    public function getAllReplies(Request $request, $id)
    {
        $query = Replies::where('comment_id','=',$id)->with('user');
        return $query->orderBy('id', 'desc')->paginate(6);
    }
}
