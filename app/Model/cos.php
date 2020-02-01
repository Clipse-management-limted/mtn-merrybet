<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class cos extends Model
{
  protected $fillable = [
      'name', 'phone','email','gender','social_handle'
  ];

}
