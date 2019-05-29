<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['ar_name','en_name','company_model_id'];

     public function name()
     {
         if (app()->getLocale() == 'ar')
             return $this->ar_name;
         else
             return $this->en_name;
     }

     public function company_model(){
         return $this->belongsTo(CompanyModel::class,'company_model_id');
     }
}
