<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends Model
{
    use SoftDeletes;
    protected $fillable = ['ar_name','en_name','is_active','delivery_price'];


    public function name()
    {
        if (app()->getLocale() == 'ar')
            return $this->ar_name;
        else
            return $this->en_name;
    }

}
