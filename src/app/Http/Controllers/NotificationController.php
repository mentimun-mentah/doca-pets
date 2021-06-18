<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function fetchMyNotif(Request $request){

    $notifications = DB::table('notifications')
      ->join('replies','replies.id','=','notifications.replies_id')
      ->where('notifications.user_id','=',Auth::user()->id)
      ->orderBy('notifications.id','desc')
      ->select(
        'notifications.id as notifications_id', 'notifications.seen as notifications_seen',
        'notifications.created_at as notifications_created_at', 'replies.balasan as replies_balasan',
        'replies.comment_id as replies_comment_id', 'replies.user_id as replies_user_id'
      )->paginate(5);

    foreach($notifications as $data){
      $user = DB::table('users')
        ->where('users.id','=',$data->replies_user_id)
        ->select(
          'users.name', 'users.fullname'
        )
        ->first();

      $data->doctor = $user;
    }

    return $notifications;
  }

  public function readNotif($id){
    DB::table('notifications')
      ->where('id','=',$id)
      ->update([
        'seen' => 1
      ]);
  }

  public function totalNotif(){
    return DB::table('notifications')
      ->where('seen','=',0)
      ->where('user_id','=',Auth::user()->id)
      ->count(); 
  }

  public function markAllRead(){
    DB::table('notifications')
      ->where('seen','=',0)
      ->where('user_id','=',Auth::user()->id)
      ->update([
        'seen' => 1
      ]);

    return ['status' => 'Success mark all as read'];
  }
}
