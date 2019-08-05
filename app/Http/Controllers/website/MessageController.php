<?php

namespace App\Http\Controllers\website;

use App\Chat;
use App\Device;
use App\Libraries\firebase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function store(Request $request,$chat_id)
    {

        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'chat_id' => $chat_id,
        ]);
        $message->load(['user']);

        $chat = Chat::find($chat_id);
        $receiver_id = $chat->user_id;
        if ($receiver_id) {
            $tokens = Device::where('user_id', $receiver_id)->pluck('device');

            $firebase = new firebase();
            $firebase->sendMessage($tokens, $message->body, null, "here is the user image");
            return response()->json([
                    'status' => true,
                    'title' => "نجاح",
                    'message' => "تم الإرسال بنجاح"
                ]
            );
        }
    }
}
