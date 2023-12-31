<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['ar_name','en_name'];

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function name()
    {
        if (app()->getLocale() == 'ar')
            return $this->ar_name;
        else
            return $this->en_name;
    }

}
