<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Doctor;
use App\Models\Comment;
use App\Models\Replies;
use App\Models\Like;
use App\Models\Notification;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate([
          'balasan' => 'required|string|min:5',
        ]);
    
        $comment = Comment::findOrFail($id);

        $reply = Replies::create([
          'comment_id' => $comment->id,
          'balasan' => $request->balasan,
          'user_id' => Auth::user()->id
        ]);

        Notification::create([
          'user_id' => $comment->user_id,
          'replies_id' => $reply->id,
        ]);

        return ['status' => 'Success add reply'];
    }  

    public function getAllReplies(Request $request, $id)
    {
        $query = Replies::where('comment_id','=',$id)->with('user')->withCount('likes');
        return $query->orderBy('id', 'desc')->paginate(6);
    }

    public function likeReplies(Request $request, $id)
    {
      $replies = Replies::findOrFail($id);

      $replies->likes()->create([
        'user_id' => Auth::user()->id
      ]);

      $doctor = Doctor::where('user_id',$replies->user_id)->firstOrFail();
      $doctor->total_like = $doctor->total_like + 1;
      $doctor->save();

      return ['status' => 'Success like this reply'];
    }

    public function checkLikeReplies($id)
    {
        return Like::where('replies_id',$id)->where('user_id',Auth::user()->id)->exists();
    }
}
