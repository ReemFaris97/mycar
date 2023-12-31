<?php

namespace App\Http\Controllers\website;

use App\Notification;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('website.profile.profile',compact('user'));
    }

    public function notifications(){
        Notification::whereUserId(auth()->id())->update(['is_read'=>1]);
        $notifications = Notification::whereUserId(auth()->id())->get()->reverse();
        return view('website.profile.notifications',compact('notifications'));
    }

    public function deleteNotificaiton(Request $request){
        $notification = Notification::find($request->id);
        if($notification){
            $notification->delete();
            return response()->json([
                'status'=>true,
                'title'=>__('web.success'),
                'message'=>__('web.deleted_successfully')
            ]);
        }
    }

    public function editProfile(){
        $user = auth()->user();
        return view('website.profile.edit_profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $rules = [
            'name'=>'nullable|string|max:191',
            'phone'=>"required|max:11",
            'region'=>'required',
            'address'=>"nullable|string",
        ];
        $this->validate($request,$rules);
        $user = auth()->user();
        $inputs = $request->all();
        $user->update($inputs);
        session()->flash('success',__('web.profile_updated_successfully'));
        return back();
    }


//    ---------------------------------------------------------------------

//    ------------ My Orders Routes Actions -------------------------------

    public function getMyOrders(){
        $new_orders = Order::whereUserId(auth()->id())
            ->whereStatus('new')->get()->reverse();

        $waiting_orders = Order::whereUserId(auth()->id())
            ->where('status','waiting')
            ->orWhere('status','accepted')
            ->orWhere('status','prepare')
            ->orWhere('status','onWay')->get()->reverse();

        $finished_orders = Order::whereUserId(auth()->id())
            ->where('status','refused')
            ->orWhere('status','delivered')
            ->orWhere('status','completed')->get()->reverse();
        return view('website.profile.my_orders',compact('new_orders','waiting_orders','finished_orders'));
    }


}
