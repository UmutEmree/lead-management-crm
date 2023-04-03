<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{

   protected $fillable = ['name','phone','email','status','message','note','utm_medium',
	'utm_source','duyurukayit','project_id','created_at','updated_at'];

	public function project(){
		return $this->belongsTo('projects','project_id');
	}
}
