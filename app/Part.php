<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use SoftDeletes;
    protected $fillable = ['ar_name','en_name','image','code','company_model_id','sub_category_id'];

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

     public function part_images(){
         return $this->hasMany(PartImages::class,'part_id');
     }

     public function subCategory(){
         return $this->belongsTo(SubCategory::class,'sub_category_id');
     }
}
