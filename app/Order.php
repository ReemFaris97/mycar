<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =  ['user_id','company_id','company_model_id','city_id','year','parts_type','form_image','structure_number','payment_type','status','completed_status'];

    public function order_details(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function company_model(){
        return $this->belongsTo(CompanyModel::class,'company_model_id');
    }

   public function replies(){
        return $this->hasMany(Reply::class);
   }
   public function city(){
        return $this->belongsTo(City::class);
   }

   public function hasAnyReply(){
        if($this->replies()->count() > 0) return true;
        else return false;
   }

//   public function userMadeReply(){
//        if($this->replies->supplier->where('supplier_id',auth()->id())->count() > 0) return true;
//        else return false;
//   }

}
