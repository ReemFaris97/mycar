<?php

namespace App\Http\Controllers\website;

use App\Chat;
use App\Device;
use App\Libraries\firebase;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function store(Request $request,$chat_id)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'chat_id'=>$chat_id,
        ]);
        $message->load(['user']);

        $chat = Chat::find($chat_id);
        $admin_ids = User::whereType('admin')->pluck('id');
//        $receiver_id = $chat->user_id;

            $tokens = Device::whereIn('user_id',$admin_ids)->pluck('device');

            $firebase = new firebase();
            $firebase->sendMessage($tokens,$message->body,null,"here is the user image",auth()->id());
            return response()->json([
                    'status'=>true,
                    'title'=>"نجاح",
                    'message'=>"تم الإرسال بنجاح"
                ]
            );
        }

}
