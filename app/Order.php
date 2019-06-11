<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable =  ['user_id','company_id','company_model_id','city_id','year','parts_type','form_image','structure_number','payment_type','status','completed_status','winner_reply_id','app_percentage','total','supplier_percent','supplier_id'];

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

   public function hasAnyReplyByAuthSupplier(){
        $countCheck =  $this->replies()->where('supplier_id',auth()->id())->count();
        if($countCheck >0) return 1;
        else return 0;
   }
   public function hasRefusedReplyByAuthSupplier(){
        $checkFinished =  $this->replies()->where('supplier_id',auth()->id())->where('status','finished')->first();
        $checkRefused =  $this->replies()->where('supplier_id',auth()->id())->where('status','refused')->first();
       if($checkRefused) return 1;
       if($checkFinished) return 0;

   }

   public function winner_reply(){
        $reply = Reply::find($this->winner_reply_id);
        if($reply) return $reply;
        else return false;
   }

   public function myReply(){
        return $this->replies()->where('supplier_id',auth()->id())->first();
   }


   public function checkStatusForAdmin(){
//    1 new  // 2 new + has offers ( replies )   // 3 accepted  // 4 received   // 5 finished

        switch ($this->status){
            case 'new' : return '<label class="label label-success"> جديد</label>'; break;
            case 'waiting' :
                if($this->winner_reply_id == null)
                    return '<label class="label label-success"> جديد</label>
                            <label class="label label-warning"> لديه عروض</label> ' ;
                else return '<label class="label label-purple">تم اعتماده</label>' ;
                break;

            case 'received' : return '<label class="label label-pink">تم تسليمه للإدارة</label>' ; break;
            case 'finished' : return '<label class="label label-inverse">إنتهى</label>'; break;
        }
   }



//   public function userMadeReply(){
//        if($this->replies->supplier->where('supplier_id',auth()->id())->count() > 0) return true;
//        else return false;
//   }

}
