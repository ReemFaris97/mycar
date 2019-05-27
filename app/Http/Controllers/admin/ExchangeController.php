<?php

namespace App\Http\Controllers\admin;

use App\Exchange;
use App\Exchange_details;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Device;
use App\Libraries\firebase;
use App\Notification;


class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(auth()->user()->role !='technical'){
            $exchanges = Exchange::all()->reverse();
            return view('admin.exchanges.index',compact('exchanges'));
        }else{
            return abort(401);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'super' || auth()->user()->role == 'technical'){
            $products = Product::all();
            $technicals = User::whereRole('technical')->whereIsActive(1)->get();
            return view('admin.exchanges.create',compact('products','technicals'));
        }
        else{
            return abort(401);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $data = [
            'order_id'=>$request->order_id,
            'technical_id' =>$request->technical_id,
            'date'   =>$request->date,
            'description'   =>$request->description,
            'products'   =>$request->products,
            'qtys'   =>$request->products,

        ];

        $rules = [
            'order_id'=>'required|string|exists:orders,id',
            'technical_id'=>'required|string',
            'date'=>"required|date|after_or_equal:today",
            'description'=>"required|string",
            'products'=>"required|array|min:1",
            'qtys'=>"required|array|min:1",
        ];

        $messages = [
            'bill_number.required'=>"رقم الفاتورة مطلوب",
            'date.required'=>"تاريخ الفاتورة مطلوب",
            'date.date'=>"أدخل صيغة تاريخ صحيحة",
            'products.required'=>"برجاء إختيار منتجات",
            'products.min'=>"برجاء إختيار منتجات للفاتورة",
        ];

        $valResult = Validator::make($data,$rules,$messages);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['status'] = 'wait';


        if($valResult->passes()){
                $order = Order::find($request->order_id);
//            if($order->has('exchange')){
//                session()->flash('error','رقم الطلب لديه أمر صرف بالفعل');
//                return redirect()->back();
//            }

            $products = $request->products;
            $qtys = $request->qtys;

            $exchange = Exchange::create($data);

            for($i = 0; $i< count($products); $i++ ){
                $exchange_details = new Exchange_details();
                $exchange_details->exchange_id = $exchange->id;
                $exchange_details->product_id = $products[$i];
                $exchange_details->qty = $qtys[$i];
                $exchange_details->save();
            }


            //-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS...........
            $title = 'أمر صرف';
            $body = 'تم إنشاء أمر صرف جديد من قبل المسؤول ' . auth()->user()->name ;
            $icon =  getimg(auth()->user()->image);
            $image = getimg(auth()->user()->image);
            $click_action =route('notifications.index');
            $username = auth()->user()->name;

            //Get devices ....
            $ids = User::where('role','super')->orWhere('role','warehouse_admin')->where('id','!=',auth()->id())->get()->pluck('id');
//
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

            session()->flash('success','تم أمر الصرف بنجاح');
            return redirect()->back();
        }else{
            $errors = $valResult->messages();
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->role != 'dept_admin' || auth()->user()->role !='coordinator') {
            $exchange = Exchange::find($id);
            if ($exchange) {
                return view('admin.exchanges.details', compact('exchange'));
            } else {
                return abort(404);
            }
        }
        else{
            return abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function refuseWithReason(Request $request){

       $exchange = Exchange::find($request->id);
       if($exchange){
            $exchange->status = 'refused';
            $exchange->refuse_reason = $request->reason;
            $exchange->save();


//-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS...........
           $title = 'رفض طلب صرف';
           $body = 'تم رفض أمر الصرف رقم  ' . $exchange->id ." من قبل المسؤول ". auth()->user()->name . " وسبب الرفض  " . $request->reason;
           $icon =  getimg(auth()->user()->image);
           $image = getimg(auth()->user()->image);
           $click_action =route('notifications.index');
           $username = auth()->user()->name;



           //Get devices ....
           $ids = User::where('role','super')->orWhere('role','warehouse_admin')
               ->where('id','!=',auth()->id())->get()->pluck('id');
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

           $technical_row = [
               'user_id'=>$exchange->technical_id,
               'title' =>$title,
               'body'=>" تم رفض أمر الصرف الخاص بك رقم  ". $exchange->id ." من قبل المسؤول  ".auth()->user()->name ." وسبب الرفض ".$request->reason,
               'icon'=>$icon,
               'image'=>$image,
               'click_action'=>$click_action
           ];


           Notification::insert($notification_rows);
           Notification::insert($technical_row);

           $technical_devices = Device::where('user_id',$exchange->technical_id)->get()->pluck('device');

           $firebase = new firebase();
           $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
           $firebase->sendNotify($technical_devices,$title," تم رفض أمر الصرف الخاص بك رقم  ". $exchange->id ." من قبل المسؤول  ".auth()->user()->name ." وسبب الرفض ".$request->reason,$icon,$image,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم رفض أمر الصرف بنجاح",
            ]);
       }else{

           return response()->json([
               'status'=>true,
               'title'=>"خطأ",
               'message'=>"هناك خطأ ما",
           ]);
       }
    }


    public function getAjaxProductQty(Request $request){
        $product = Product::find($request->id);
        return response()->json([
            'data'=>$product->qty
        ]);
    }

    public function accept(Request $request){

        $exchange = Exchange::find($request->exchange_id);
        $exchange->status = 'accepted';
        if($exchange->save()){
            $ids = $request->rowsId;
            $qtys = $request->qtys;

            for($i = 0; $i< count($ids); $i++ ){
                $details = Exchange_details::find($ids[$i]);
                $details->qty = $qtys[$i];
                $details->save();
            }


//-------------- SEND NOTIFICATIONS USING FIREBASE TOKENS...........
            $title = 'موافقة على أمر صرف';
            $body = 'تم الموافقة على  أمر الصرف رقم  ' . $exchange->id ." من قبل المسؤول ". auth()->user()->name;
            $icon =  getimg(auth()->user()->image);
            $image = getimg(auth()->user()->image);
            $click_action =route('notifications.index');
            $username = auth()->user()->name;


            //Get devices ....
            $ids = User::where('role','super')->orWhere('role','warehouse_admin')
                ->where('id','!=',auth()->id())->get()->pluck('id');
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

            $technical_row = [
                'user_id'=>$exchange->technical_id,
                'title' =>$title,
                'body'=>" تم الموافقة أمر الصرف الخاص بك رقم  ". $exchange->id ." من قبل المسؤول  ".auth()->user()->name,
                'icon'=>$icon,
                'image'=>$image,
                'click_action'=>$click_action
            ];


            Notification::insert($notification_rows);
            Notification::insert($technical_row);

            $technical_devices = Device::where('user_id',$exchange->technical_id)->get()->pluck('device');

            $firebase = new firebase();
            $firebase->sendNotify($devices,$title,$body,$icon,$image,$click_action,$username);
            $firebase->sendNotify($technical_devices,$title," تم الموافقة أمر الصرف الخاص بك رقم  ". $exchange->id ." من قبل المسؤول  ".auth()->user()->name,$icon,$image,$click_action,$username);
//--------------- END NOTIFICATIONS ---------------------------------

            session('success','تمت الموافقة على أمر الصرف بنجاح');
            return redirect()->back();
        }

    }



}
