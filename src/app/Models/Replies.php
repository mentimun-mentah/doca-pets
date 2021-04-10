<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = ['balasan','comment_id','user_id'];

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
