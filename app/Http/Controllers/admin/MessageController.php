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
            $firebase->sendMessage($tokens,$message->body,null,"here is the user image");
            return response()->json([
                    'status'=>true,
                    'title'=>"نجاح",
                    'message'=>"تم الإرسال بنجاح"
                ]
            );
        }

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
