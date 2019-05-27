<?php

namespace App\Http\Controllers\admin;

use App\Department;
use App\Device;
use App\notCompleted;
use App\Order;
use App\Refuse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\firebase;
use App\Notification;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(auth()->user()->role == 'technical' || auth()->user()->role == 'dept_admin'){
            return abort(401);
        }
        if($request->has('type') && $request->type == 'all'){
            $orders = Order::where('status','!=','refused')->get()->reverse();
            return view('admin.orders.index',compact('orders'));

        }elseif ($request->has('type') && $request->type == 'refused')  {
            $orders = Order::where('status','=','refused')->get()->reverse();
            return view('admin.orders.index',compact('orders'));
        }
        elseif ($request->has('type') && $request->type == 'incompleted')  {
            $orders = Order::where('status','=','not_completed')->get()->reverse();
            return view('admin.orders.index',compact('orders'));
        }
        else{
            $orders = Order::where('status','!=','refused')->get()->reverse();
            return view('admin.orders.index',compact('orders'));
        }

    }

    public function myOrders(){
        $user = auth()->user();
        if($user->role == 'super' || $user->role =='coordinator'){
            return redirect()->route('orders.index');
        }

        if($user->role == 'technical'){
            $orders = Order::where('technical_id',$user->id)->get()->reverse();
            return view('admin.orders.my_orders',compact('orders'));
        }

        if($user->role == 'dept_admin'){
            $orders = Order::where('user_id',$user->id)->get()->reverse();
            return view('admin.orders.my_orders',compact('orders'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'technical' || auth()->user()->role == 'coordinator'){
            return abort(401);
        }

        $departments = Department::all();
        return view('admin.orders.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|string|max:191',
            'dept_id'=>'required|exists:departments,id',
            'image'=>'nullable|image'
        ];
        $this->validate($request,$rules);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['status'] = 'new';
        if($request->has('image') && $request->image !=null){
            $data['image'] = uploader($request,'image');
        }
        Order::create($data);

//-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
//   notifications data -------------------------------------------------
        $title = 'طلب جديد';
        $body = 'تم إنشاء طلب جديد من المسؤول ' . auth()->user()->name ;
        $icon =  getimg(auth()->user()->image);
        $image = getimg(auth()->user()->image);
        $click_action =route('notifications.index');
        $username = auth()->user()->name;


        //Get devices  ....
        $ids = User::where('role','super')->orWhere('role','coordinator')->where('id','!=',auth()->id())->get()->pluck('id');
        $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//      ann array to collect notification data to store in DB...
            foreach ($ids as $id)
            {
                $row = [
                    'user_id'=>$id,
                    'title' =>$title,
                    'body'=>$body,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];
                $notification_rows[]= $row;
            }

            Notification::insert($notification_rows);
            $firebase = new firebase();
            $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);

//--------------- END NOTIFICATIONS ---------------------------------
            session()->flash('success','تم إرسال الطلب للقسم المختص بنجاح بنجاح');
            return redirect()->route('orders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $order = Order::find($id);
        if($order){
            $technicals = User::whereRole('technical')->get();
            return view('admin.orders.details',compact('order','technicals'));
        }
        else{
            return abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}


    public function addTechnical(Request $request){

        $order = Order::find($request->order_id);
        if($order){
            $order->status = 'pending';
            $order->technical_id = $request->tech_id;
            $order->save();

            //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
            $title = 'طلب جديد';
            $body = 'تم تعيين طلب جديد من المسؤول ' . auth()->user()->name . " للفني " . User::find($request->tech_id)->name . "و في إنتظار الموافقة" ;
            $icon =  getimg(auth()->user()->image);
            $image = getimg(auth()->user()->image);
            $click_action =route('notifications.index');
            $username = auth()->user()->name;

            //Get devices ........
             $ids = User::where('role','super')->where('id','!=',auth()->id())->get()->pluck('id');
            $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//            ann array to collect notification data to store in DB...
            foreach ($ids as $id)
            {
                $row = [
                    'user_id'=>$id,
                    'title' =>$title,
                    'body'=>$body,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];
                $notification_rows[]= $row;
            }

            $rowOfTechnical = [
                'user_id'=>$request->tech_id,
                'title' =>$title,
                'body'=>' تم تعيين طلب جديد لديك من المسؤول ' . auth()->user()->name,
                'icon'=>$icon,
                'image'=>$image,
                'click_action'=>$click_action
            ];

            Notification::insert($notification_rows);
            Notification::insert($rowOfTechnical);

            $technical_devices = Device::where('user_id',$request->tech_id)->get()->pluck('device');
            $firebase = new firebase();
            $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
            $firebase->sendNotify($technical_devices,$title,' تم تعيين طلب جديد لديك من المسؤول ' . auth()->user()->name ,$icon,$image,$click_action,$username);

//--------------- END NOTIFICATIONS ---------------------------------
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>"تم إرسال الطلب للفني بنجاح"
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>"عفواً الطلب غير موجود"
            ]);
        }
    }


    public function changeStatus(Request $request){

        $order = Order::find($request->order_id);

        if($order){
            if($request->status == 'accept'){
                $order->status = 'accepted';
                $order->save();

                //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
                $title = 'قبول طلب من فني';
                $body = 'تمت الموافقة على الطلب رقم  ' . $order->id . 'الخاص بالفني ' . User::find($order->technical_id)->name ." من قبل " . auth()->user()->name ;
                $icon =  getimg(auth()->user()->image);
                $image = getimg(auth()->user()->image);
                $click_action =route('notifications.index');
                $username = auth()->user()->name;

                //  Get devices
                $ids = User::where('role','super')->orWhere('role','coordinator')->where('id','!=',auth()->id())->get()->pluck('id');
                $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//            ann array to collect notification data to store in DB...
                foreach ($ids as $id)
                {
                    $row = [
                        'user_id'=>$id,
                        'title' =>$title,
                        'body'=>$body,
                        'icon'=>$icon,
                        'image'=>$image,
                        'click_action'=>$click_action
                    ];
                    $notification_rows[]= $row;
                }

                $order_user_devices = Device::where('user_id',$order->user_id)->get()->pluck('device');
                $order_user_notify = [
                    'user_id'=>$order->user_id,
                    'title' =>'قبول طلب من فني' ,
                    'body'=>'تم الموافقة على طلبك من قبل الفني ' . User::find($order->technical_id)->name ,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];

                Notification::insert($notification_rows);
                Notification::insert($order_user_notify);

                $firebase = new firebase();
                $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
                $firebase->sendNotify($order_user_devices,$title,'تم الموافقة على طلبك من قبل الفني ' . User::find($order->technical_id)->name ,$icon,$image,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم الموافقة على هذا الطلب بنجاح"
                ]);
            }


            if($request->status == 'refuse'){
               $order->status = 'refused';
               $order->refuse_reason = $request->refuse_reason;
               $order->save();

               // refuse log ..
               $refuse = new Refuse();
               $refuse->user_id = auth()->id();
               $refuse->order_id = $order->id;
               $refuse->refuse_reason = $request->refuse_reason;
               $refuse->save();



                //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
                $title = 'رفض طلب';
                $body = 'تمت رفض الطلب رقم  ' . $order->id . ' الخاص بالفني  ' . User::find($order->technical_id)->name ." من قبل " . auth()->user()->name . " و سبب الرفض " .$request->refuse_reason;
                $icon =  getimg(auth()->user()->image);
                $image = getimg(auth()->user()->image);
                $click_action =route('notifications.index');
                $username = auth()->user()->name;

                //       Get devices
                $ids = User::where('role','super')->orWhere('role','coordinator')->get()->pluck('id');
                $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//            ann array to collect notification data to store in DB...
                foreach ($ids as $id)
                {
                    $row = [
                        'user_id'=>$id,
                        'title' =>$title,
                        'body'=>$body,
                        'icon'=>$icon,
                        'image'=>$image,
                        'click_action'=>$click_action
                    ];
                    $notification_rows[]= $row;
                }

                $order_user_devices = Device::where('user_id',$order->user_id)->get()->pluck('device');
                $order_user_notify = [
                    'user_id'=>$order->user_id,
                    'title' =>'رفض طلب من فني',
                    'body'=>'تم رفض طلبك رقم ' . $order->id ." من قبل الفني " . User::find($order->technical_id)->name . " و سبب الرفض " .$request->refuse_reason,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];

                Notification::insert($notification_rows);
                Notification::insert($order_user_notify);
                $firebase = new firebase();
                $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
                $firebase->sendNotify($order_user_devices,$title,'تم رفض طلبك من قبل الفني ' . User::find($order->technical_id)->name . " و سبب الرفض " .$request->refuse_reason,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم رفض هذا الطلب مع بيان السبب بنجاح"
                ]);
            }



            if($request->status == 'complete'){
                $order->status = 'completed';
                $order->save();

                //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS

                $title = 'إنتهاء طلب';
                $body = 'تمت إنتهاء العمل على الطلب رقم  ' . $order->id . ' الخاص بالفني  ' . User::find($order->technical_id)->name ." من قبل " . auth()->user()->name;
                $icon =  getimg(auth()->user()->image);
                $image = getimg(auth()->user()->image);
                $click_action =route('notifications.index');
                $username = auth()->user()->name;

                //            Get devices
                $ids = User::where('role','super')->orWhere('role','coordinator')->where('id','!=',auth()->id())->get()->pluck('id');
                $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//            ann array to collect notification data to store in DB...
                foreach ($ids as $id)
                {
                    $row = [
                        'user_id'=>$id,
                        'title' =>$title,
                        'body'=>$body,
                        'icon'=>$icon,
                        'image'=>$image,
                        'click_action'=>$click_action
                    ];
                    $notification_rows[]= $row;
                }

                $order_user_devices = Device::where('user_id',$order->user_id)->get()->pluck('device');
                $order_user_notify = [
                    'user_id'=>$order->user_id,
                    'title' =>'إنتهاء طلب',
                    'body'=>'تم الإنتهاء من  طلبك رقم ' . $order->id ." من قبل الفني " . User::find($order->technical_id)->name,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];

                Notification::insert($notification_rows);
                Notification::insert($order_user_notify);
                $firebase = new firebase();
                $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
                $firebase->sendNotify($order_user_devices,$title,'تم الإنتهاء من  طلبك رقم ' . $order->id ." من قبل الفني " . User::find($order->technical_id)->name,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم إنتهائك من العمل على الطلب بنجاح , في انتظار تأكيد القسم"
                ]);
            }


            if($request->status == 'finish'){
                $order->status = 'finished';
                $order->save();

                //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
                $title = 'إكتمال طلب';
                $body = 'تم تأكيد إكتمال طلب وغلقه من قبل ' . auth()->user()->name . " للفني " . User::find($order->technical_id)->name ;
                $icon =  getimg(auth()->user()->image);
                $image = getimg(auth()->user()->image);
                $click_action =route('notifications.index');
                $username = auth()->user()->name;

                //            Get devices
                $ids = User::where('role','super')->where('id','!=',auth()->id())->get()->pluck('id');
                $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//    end notifications data -------------------------------------------------
//            ann array to collect notification data to store in DB...
                foreach ($ids as $id)
                {
                    $row = [
                        'user_id'=>$id,
                        'title' =>$title,
                        'body'=>$body,
                        'icon'=>$icon,
                        'image'=>$image,
                        'click_action'=>$click_action
                    ];
                    $notification_rows[]= $row;
                }

                $rowOfTechnical = [
                    'user_id'=>$order->technical_id,
                    'title' =>$title,
                    'body'=>' تم إكتمال الطلب الخاص بك رقم  ' . $order->id ." من قبل المسؤول  " .auth()->user()->name,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];

                Notification::insert($notification_rows);
                Notification::insert($rowOfTechnical);

                $technical_devices = Device::where('user_id',$order->technical_id)->get()->pluck('device');
                $firebase = new firebase();
                $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
                $firebase->sendNotify($technical_devices,$title,' تم إكتمال الطلب الخاص بك رقم  ' . $order->id ." من قبل المسؤول  " .auth()->user()->name ,$icon,$image,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم تأكيد إنتهاء العمل بنجاح و تم إنهاء الطلب"
                ]);
            }

            if($request->status == 'acceptWithExchange'){
                $order->status = 'accepted';
                $order->save();
                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم الموافقة على الطلب , برجاء إنشاء أمر صرف للطلب"
                ]);
            }

            if($request->status == 'not_completed'){
                $order->status = 'not_completed';
                $order->save();

                // refuse log ..
                $reason = new notCompleted();
                $reason->user_id = auth()->id();
                $reason->order_id = $order->id;
                $reason->in_complete_reason = $request->in_complete_reason;
                if($request->has('image') && $request->image !=null){
                    $reason->image =  uploader($request,'image');
                }
                $reason->save();

                //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS
                $title = 'لم يكتمل';
                $body = 'لم يكتمل الطلب رقم  ' . $order->id . ' الخاص بالفني  ' . User::find($order->technical_id)->name ." من قبل " . auth()->user()->name . " و السبب " .$request->in_complete_reason;
                $icon =  getimg(auth()->user()->image);
                $image = getimg(auth()->user()->image);
                $click_action =route('notifications.index');
                $username = auth()->user()->name;

                //    Get devices
                $ids = User::where('role','super')->orWhere('role','coordinator')->get()->pluck('id');
                $devices = Device::whereIn('user_id',$ids)->get()->pluck('device');

//            ann array to collect notification data to store in DB...
                foreach ($ids as $id)
                {
                    $row = [
                        'user_id'=>$id,
                        'title' =>$title,
                        'body'=>$body,
                        'icon'=>$icon,
                        'image'=>$image,
                        'click_action'=>$click_action
                    ];
                    $notification_rows[]= $row;
                }

                $order_user_devices = Device::where('user_id',$order->user_id)->get()->pluck('device');
                $order_user_notify = [
                    'user_id'=>$order->user_id,
                    'title' =>'عدم اكتمال طلب',
                    'body'=>'لم يكتمل الطلب رقم ' . $order->id ." من قبل الفني " . User::find($order->technical_id)->name . " و سبب عدم الإكتمال " .$request->in_complete_reason,
                    'icon'=>$icon,
                    'image'=>$image,
                    'click_action'=>$click_action
                ];

                Notification::insert($notification_rows);
                Notification::insert($order_user_notify);
                $firebase = new firebase();
                $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
                $firebase->sendNotify($order_user_devices,$title,'تم يكتمل طلبك من قبل الفني ' . User::find($order->technical_id)->name . " و السبب " .$request->in_complete_reason,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

                return response()->json([
                    'status'=>true,
                    'title'=>'نجاح',
                    'message'=>"تم عدم إكتمال هذا الطلب مع بيان السبب بنجاح"
                ]);
            }
        }
        else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>"عفواً الطلب غير موجود"
            ]);
        }
    }



}
