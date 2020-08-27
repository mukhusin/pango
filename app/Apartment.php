<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = ['company_id','name','location','price','currency'];
    public $timestamps = true;
    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function lessee(){
        return $this->hasOne(Lessee::class);
    }
    public function invoice(){
        return $this->hasMany(Invoice::class);
    }

}
