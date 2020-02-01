<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kids extends Model
{
  protected $fillable = [
      'name', 'p_id', 'id','tag_id',
  ];
}
