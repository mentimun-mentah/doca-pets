<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  use HasFactory;

  /**
   * Fields that are mass assignable
   *
   * @var array
   */
  protected $fillable = ['user_id','replies_id','seen'];

  public function user(){
      return $this->belongsTo('App\Models\User');
  }

  public function reply(){
      return $this->belongsTo('App\Models\Replies');
  }

}
