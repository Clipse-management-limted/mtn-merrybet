<?php

namespace App\Model;
use App\Model\Clients;
use Illuminate\Database\Eloquent\Model;

class Client_Accounts extends Model
{
  protected $fillable = [
      'balance', 'p_id','tag_id'
  ];

  public function event()
{
    return $this->belongsTo( Clients::class,'p_id','p_id');
}
}
