<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable =['category_id','ar_name','en_name'];

    public function name()
    {
        if (app()->getLocale() == 'ar')
            return $this->ar_name;
        else
            return $this->en_name;
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


}
