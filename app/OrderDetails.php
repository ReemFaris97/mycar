<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id','part_id','image','quantity','city_id','description'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function part(){
        return $this->belongsTo(Part::class,'part_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }



}
