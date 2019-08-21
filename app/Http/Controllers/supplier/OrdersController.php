<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Replies_operations;
use App\Http\Traits\Orders_operations;

class OrdersController extends Controller
{
    use Replies_operations,Orders_operations;

//    done
    public function newOrders(){
        $user = auth()->user();
        $orders = Order::Where('status','waiting')->orWhere('status','new')->
            get()->filter(function ($query) use ($user) {
                 return (!$query->hasAnyReplyByAuthSupplier());
        });
        return view('suppliers.orders.new',compact('orders'));
    }

//    done
    public function waitingOrders(){
        $user = auth()->user();
        $orders = Order::WhereHas('replies', function($query) use ($user) {
            $query->where('supplier_id',$user->id)->whereStatus('new');
        })->get();
        return view('suppliers.orders.waiting',compact('orders'));
    }

//    done
    public function received(){
        $user = auth()->user();
//        $orders = Order::WhereHas('replies', function($query) use ($user) {
//            $query->where('supplier_id',$user->id)->where('status','accepted');
//        })->get();
        $orders = Order::whereSupplierId(auth()->id())->get()->reverse();
        return view('suppliers.orders.received',compact('orders'));
    }


//    done ..
    public function finished(){
        $user = auth()->user();
        $orders = Order::where('status','finished')->orWhere('status','waiting')->WhereHas('replies', function($query) use($user) {
            $query->where('supplier_id',$user->id)->where('status','finished')->orWhere('status','refused');
        })->get();
        return view('suppliers.orders.finished',compact('orders'));
    }


    public function show($id){
        $order = Order::findOrFail($id);
        return view('suppliers.orders.details',compact('order'));
    }


    public function pricing(Request $request,$id){

        $order = Order::find($id);

        if($order->hasAnyReplyByAuthSupplier()){
            return response()->json([
                'status'=>false,
                'title'=>'عفواً',
                'message'=>"تم تسعير هذا الطلب من قبل"
            ]);
        }else {
            $reply = $this->CreateReply($id);
            $this->CreateReplyDetails($request,$reply->id,$id);
            $reply->updateTotal();

            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>"تم إرسال العرض بنجاح"
            ]);
        }

    }

    public function test(Request $request,$id){
        $rules =[
            'order_id'=>'required|exists:orders,id'
        ];
        $reply = Reply::findOrFail($id);

        $this->validate($request,$rules);
        $this->AcceptReply($request,$reply);

    }

    public function changeOrderStatus(Request $request){
        $order = Order::find($request->id);
        $order->status = $request->action;
        $order->save();
        return response()->json([
            'status'=>true,
            'title'=>"نجاح",
            'message'=>"تم تغيير حالة الطلب بنجاح"
        ]);
    }


}
