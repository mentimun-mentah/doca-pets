<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['no_str', 'sertif', 'surat_izin'];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
