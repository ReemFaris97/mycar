<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public $timestamps = false;

    protected $fillable = ['order_id','delivery_id','delivery_type','address','lat','lng','value'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
