<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }
    public function channel_name()
    {
        return 'Chat.'.$this->chat_id;

    }

}
