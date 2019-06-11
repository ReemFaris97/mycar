<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['value', 'reason', 'type', 'user_id','auction_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
