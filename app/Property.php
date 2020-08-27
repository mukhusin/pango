<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
     //table name
     protected $table = "properties";

     //primary key
     public $primaryKey = "id";
 
     //timeStamp
     public $timestamps = true;
     //owner_id 	name 	address 	licence 	contract_date 	apartment_num 	abbriviation
     protected $fillable = [
         'name','owner_id','address','licence','contract_date','apartment_num','abbriviation'
     ];
 
     public function lessee(){
         return $this->belongsTo(CompanyOwner::class);
     }
     public function apartment(){
         return $this->hasMany(Apartment::class);
     }
}
