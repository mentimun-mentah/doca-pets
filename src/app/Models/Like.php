<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = ['replies_id','user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function reply(){
        return $this->belongsTo('App\Models\Replies');
    }

}
