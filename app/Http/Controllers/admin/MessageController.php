<?php

namespace App\Http\Controllers\admin;

use App\Chat;
use App\Http\Controllers\Controller;
//use App\Http\Resources\MessageResource;
use App\Message;
use App\Http\Traits\PusherOperation;
use App\Http\Traits\FCMOperation;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Gate;

use App\Notification;
use App\Device;
use App\Libraries\firebase;



class MessageController extends Controller
{

    public function index($chat_id)
    {

        $messages = Message::where('chat_id',$chat_id)->paginate(500);

//        $messages = new MessageResource($messages);

//        return response()->json($messages);
    }

    public function store(Request $request,$chat_id)
    {

        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'chat_id'=>$chat_id,
        ]);
        $message->load(['user']);

        $chat = Chat::find($chat_id);
        $receiver_id = $chat->user_id;
        if($receiver_id){
            $tokens = Device::where('user_id',$receiver_id)->pluck('device');

            $firebase = new firebase();
            $firebase->sendMessage(['dg1F0uwBjSU:APA91bGAoO52SAOsk9imw23KPv51T9Fr5YwXLQZhsOOAFh9EoXHfCzntr48sg9PCzWtHwXKYo3j3RSmx9LIV6oXt1Jtf1bsNK-Ah9ljiN8y6a2jHQ4f-0wQzpk76xq1-oa544r_LdhSs'],$message->body,null,"here is the user image");
            return response()->json([
                    'status'=>true,
                    'title'=>"نجاح",
                    'message'=>"تم الإرسال بنجاح"
                ]
            );
        }



//        $this->sendNotification($message,$chat_id);
//        $users_id = Message::find($message['id'])->channel->messages->pluck('user_id');
//        $users = User::WhereIn('id',$users_id)->get();

//        foreach ($users as $user)
//        {
//            $message = Message::find($message['id']);
//            if ($user->id != $message->user_id)
//            {
//                $data=['title'=>'هناك رسالة جديدة','content'=>$message->body,'chat_id'=>$message->chat_id, 'channel_name'=>$message->channel_name(), 'total_message'=>$message->channel->total_message_pages(),'type'=>'chat'];
//                if ($user->fcm_token_android != null)
//                {
//                    $this->notifyByFirebase('هناك رسالة جديدة',$message->body,[$user->fcm_token_android],$data,0);
//                }
//
//                if ($user->fcm_token_ios != null)
//                {
//                    $this->notifyByFirebase('هناك رسالة جديدة',$message->body,[$user->fcm_token_android],$data,0);
//                }
//            }
//        }


    }

    public function test(Request $request,$chat_id){
        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'chat_id'=>$chat_id,
        ]);
        $message->load(['user']);

        $chat = Chat::find($chat_id);

            $firebaseObj = new firebase();
            $firebaseObj->sendMessage(['dtH8SvSCYxs:APA91bEelHTT_Hd96Ej5EPmLObg_uNcCZ8SZ3VyIryfb0OaASn9W07GpMS3oHisWT-O0BReQ8gELAuH5o616dRISXBSN1BH5dPCUuTib69kRZcqNLDmFQocmt0ulpHjnKAzqPxAGhduy'],$message->body,null,"here is the user image");

            return "success";


    }
}
