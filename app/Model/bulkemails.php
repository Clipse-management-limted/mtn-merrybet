<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class bulkemails extends Model
{
    protected $fillable = [
    'id','attend','EMAIL','CUSTOMER_NAME','STATUS_SentUnsent','ivcode','TICKET_CATEGORY','PHONE'
  ];

}
