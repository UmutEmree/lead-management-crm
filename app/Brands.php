<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    
       protected $fillable = ['name','sector','limit','created_at','updated_at'];

       public function projects(){
       	return $this->hasMany('App\Projects','id','marka_id');
       }

}
