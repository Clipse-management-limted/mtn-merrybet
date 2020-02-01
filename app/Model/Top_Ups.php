<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Top_Ups extends Model
{
  protected $fillable = [
      'staff', 'id','tag_id','amount',
  ];
}
