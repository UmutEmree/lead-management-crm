<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brands;
class Projects extends Model
{
        protected $table = 'projects';
       protected $fillable = ['name','tesekkur_sayfasi','mail_adresi','mail_adresi2',
       'mail_adresi3','mail_adresi4','mail_adresi5','mail_baslik','proje_adi','marka_id','created_at','updated_at'];

      public function brands()
    {
       return $this->belongsTo('App\Brands','marka_id');
    }


      public function leads()
    {
       return $this->hasMany('App\Leads','project_id','id');
    }
}
