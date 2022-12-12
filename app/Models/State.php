<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table='states';
    protected $fillable=[
        'state_name_ar',
        'state_name_en',
        'country_id',
        'city_id',
    ];
    public function country(){
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
    public function city(){
        return $this->belongsTo('App\Models\City','city_id','id');
    }
}
