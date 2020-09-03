<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessor extends Model
{
    ///table name
    protected $table = "lessors";

    //primary key
    public $primaryKey = "id";

    //timeStamp
    public $timestamps = true;

    protected $fillable = [
        'name','phone','address','nida','user_id'
    ];

    public function property(){
        return $this->hasMany(Property::class);
    }
}
