<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Message;
use App\Http\Traits\PusherOperation;
use App\Http\Traits\FCMOperation;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Gate;


class MessageController extends Controller
{
    use PusherOperation,FCMOperation;
    public function index($chat_id)
    {
//        if (!Gate::allows('chat_manage')) {
//            return abort(401);
//        }
        $messages = Message::where('chat_id',$chat_id)->paginate(500);

        $messages = new MessageResource($messages);

        return response()->json($messages);
    }

    public function store(Request $request,$chat_id)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'chat_id'=>$chat_id,
        ]);
        $message->load(['user']);

        $message = array_merge($message->toArray(), ['selfMessage' => $message->getSelfMessageAttribute()]);
        $this->sendNotification($message,$chat_id);
        $users_id = Message::find($message['id'])->channel->messages->pluck('user_id');
        $users = User::WhereIn('id',$users_id)->get();

        foreach ($users as $user)
        {
            $message = Message::find($message['id']);
            if ($user->id != $message->user_id)
            {
                $data=['title'=>'هناك رسالة جديدة','content'=>$message->body,'chat_id'=>$message->chat_id, 'channel_name'=>$message->channel_name(), 'total_message'=>$message->channel->total_message_pages(),'type'=>'chat'];
                if ($user->fcm_token_android != null)
                {
                    $this->notifyByFirebase('هناك رسالة جديدة',$message->body,[$user->fcm_token_android],$data,0);
                }

                if ($user->fcm_token_ios != null)
                {
                    $this->notifyByFirebase('هناك رسالة جديدة',$message->body,[$user->fcm_token_android],$data,0);
                }
            }
        }
        return response()->json($message);
    }
}
