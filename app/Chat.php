<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable = ['user_id'];
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function lastMessage()
    {
        $message = Message::where('chat_id',$this->id)->orderBy('id','desc')->first();
        if (!$message)
        {
            $message['body'] = "لا يوجد رسائل";
            $message['created_at'] = "00/00/00";
            return $message;
        }

        return $message;
    }

    public function total_message_pages()
    {
        $messages = $this->messages->count();
        if ($messages == 0) return 0 ;
        $pagniation = $this->paginateNumber;
        return ceil($messages/$pagniation);
    }


    public function channel_name()
    {
        return 'Chat.'.$this->id;

    }





}
