<?php

namespace App\Http\Controllers\admin;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index(){
        $notifications = Notification::whereUserId(auth()->id())->get()->reverse();

        foreach ($notifications as $notify){
            $notify->is_read = 1;
            $notify->save();
        }

        return view('admin.notifications.index',compact('notifications'));
    }

    public function delete(Request $request){
        $notify = Notification::find($request->id);
        $notify->delete();
        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>"تم حذف الإشعار بنجاح",
        ]);
    }
}
