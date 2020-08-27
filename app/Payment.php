<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
      ///table name
      protected $table = "payments";

      //primary key
      public $primaryKey = "id";

      //timeStamp
      public $timestamps = true;

      protected $fillable = [
          'invoice_id','paid','channel','date','reference','balance','status','remarks'
      ];

      public function apartment(){
          return $this->belongsTo(Invoice::class);
      }
}
