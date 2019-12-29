<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyDetails extends Model
{
    protected $fillable = ['reply_id','order_details_id','order_id','part_price','total_parts'];

    public function order_details(){
        return $this->belongsTo(OrderDetails::class,'order_details_id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

}
