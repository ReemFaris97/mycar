<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ReturnItem extends Model
{
    use SoftDeletes;
    protected $fillable =['user_id','order_id','status'];
    protected $dates=['created_at','updated_at'];


    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
