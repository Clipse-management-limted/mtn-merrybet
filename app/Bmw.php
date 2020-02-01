<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmw extends Model
{
  protected $fillable = ['qr_code',	'won'];

  public static function shuffle(){
    $lucky = self::awoofers();
    $lucky->hasWon();
    return $lucky;
  }

  public function hasWon(){
    $this->won = true;
    return $this->save();
  }

  public static function winner($key){
    $ticket = Bmw::where('qr_code', $key)->first();
    if ($ticket) {
      return $ticket->hasWon();
    }
    return false;
  }

  public static function lucks(){
    return self::where('won', false)->inRandomOrder()->limit(100)->get();
  }

  public static function awoofers(){
    return self::where('won', false)->inRandomOrder()->first();
  }

  public static function pending(){
    return self::where('won', false)->get();
  }
}
