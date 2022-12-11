<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='cities';
    protected $fillable=[
        'city_name_ar',
        'city_name_en',
        'country_id',
    ];
    public function country(){
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
}
