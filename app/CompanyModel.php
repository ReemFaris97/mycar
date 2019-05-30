<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyModel extends Model
{
    use SoftDeletes;
    protected $fillable =['ar_name','en_name','company_id','is_active'];

    public function name()
    {
        if (app()->getLocale() == 'ar')
            return $this->ar_name;
        else
            return $this->en_name;
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function years(){
        return $this->hasMany(ModelYears::class,'company_model_id');
    }


}
