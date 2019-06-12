<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function MarkAsRead(){
        if ($this->is_read == 0) {
            $this->forceFill(['is_read' => 1])->save();
        }
    }
}
