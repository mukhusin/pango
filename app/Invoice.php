<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    ///table name
    protected $table = "invoices";

    //primary key
    public $primaryKey = "id";

    //timeStamp
    public $timestamps = true;

    protected $fillable = [
        'apartment_id','user_id','amount','month','year','status'
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
    public function invoice(){
        return $this->hasOne(Payment::class);
    }
}
