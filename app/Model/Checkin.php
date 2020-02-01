<?php

namespace App\Model;
use App\Model\mtncotumer;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
  protected $fillable = [
      'acti_id', 'platoon','phone','og','code','reg','groups'

      ];

      public function userinfo()
 {
     return $this->belongsTo(mtncotumer::class,'reg','reg');
 }
}
