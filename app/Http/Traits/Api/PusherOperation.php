<?php


namespace App\Http\Traits;

use App\Message;
use Pusher\Pusher;

trait PusherOperation
{

    public function sendNotification($message,$channel_id,$is_mobile=null)
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'eu',
            'encrypted' => true
        );
        $pusher = new Pusher(
            'e69109571019ace91508',
            '9014f4bbf0b0e1cfe258',
            '685900',
            $options
        );
        $channel = 'Chat.'.$channel_id;
        $message = Message::find($message['id']);
            $data= [
                'id' => $message->id,
                'body' => $message->body,
                'user_name'=>$message->user->name,
                'user_id'=>$message->user_id,
                'type'=>$message->type,
                'self'=>false,
                'date' => $message->created_at->format('Y-m-d'),

            ];
        $pusher->trigger($channel, 'MessageCreated', $data);
    }
}