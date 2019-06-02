<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['order_id','supplier_id','total'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function supplier(){
        return $this->belongsTo(User::class,'supplier_id');
    }


}
