<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use HasFactory;

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['judul', 'slug', 'photo', 'deskripsi', 'lokasi'];

}
