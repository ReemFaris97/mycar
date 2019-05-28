<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $fillable =['ar_name','en_name','company_id','is_active'];

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function years(){
        return $this->hasMany(ModelYears::class,'company_model_id');
    }
}
