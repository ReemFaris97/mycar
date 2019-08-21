<?php

namespace App\Http\Controllers\website;

use App\Delivery;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Orders_operations;

class OrderDetailsController extends Controller
{
    use Orders_operations;
    public function orderDetails($id){
        $order = Order::findOrFail($id);
        if($order->status == 'accepted'){
            return view('website.order.order_details.finished_details',compact('order'));
        }


        return view('website.order.order_details.distributors',compact('order'));
    }

    public function submitDelivery(Request $request){
        $order = Order::find($request->order_id);

        $inputs = $request->all();
        if($request->delivery_type == 'delivery'){
            $inputs['value'] = getsetting('delivery_value');
        }
        $delivery = Delivery::create($inputs);
        $this->AcceptReply($request,$order->supplierReply(),$delivery);
        return redirect()->route('web.order.getPayment',$order->id);
    }


    public function getPaymentPage($id){
        $order = Order::find($id);
        if($order->hasDelivery()){
            return view('website.order.order_details.payment',compact('order'));
        }else{
            return redirect()->route('web.order.submitDelivery');
        }
    }

    public function submitPayment(Request $request){
        $order = Order::find($request->order_id);
        $order->payment_type = $request->payment_type;
        $order->payment_status = 1;
        $order->status = 'accepted';
        $order->save();
        return view('website.order.order_details.done',compact('order'));
    }
}
