<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessee extends Model
{
    //table name
    protected $table = "lessees";

    //primary key
    public $primaryKey = "id";

    //timeStamp
    public $timestamps = true;

    protected $fillable = [
        'apartment_id','name','phone','address','nida'
    ];


    public function apartment(){
        return $this->hasMany(Apartment::class);
    }
}
