<?php

namespace App\Http\Controllers\website;

use App\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function updateUserToken(Request $request){
        $user = \App\User::whereId($request->id)->first();

        if ($request->token) {
            $data = \App\Device::where('device', $request->token)->first();
            if ($data) {
                $data->user_id = $user->id;
                $data->save();
            } else {
                $data = new Device();
                $data->device = $request->token;
                $data->user_id = $user->id;
                $data->type = 'web';
                $data->save();
            }
        }
    }
}
