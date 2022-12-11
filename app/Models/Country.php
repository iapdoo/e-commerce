<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';
    protected $fillable=[
             'country_name_ar',
             'country_name_en',
             'mob',
             'code', //EG KSA
             'logo',
             ];
    public function city(){
        return $this->hasMany('App\Models\City','country_id','id');
    }
}
