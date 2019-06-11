<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['order_id','supplier_id','total','status'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    public function supplier(){
        return $this->belongsTo(User::class,'supplier_id');
    }

    public function reply_details(){
        return $this->hasMany(ReplyDetails::class,'reply_id');
    }

    public function total(){
        $total = $this->reply_details()->sum('total_parts');
        return $total;
    }
    public function updateTotal(){
        $this->total = $this->reply_details()->sum('total_parts');
        $this->save();
    }



}
