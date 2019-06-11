<?php

namespace App\Http\Traits;

use App\Order;
use App\Reply;
use App\User;
use Illuminate\Http\Request;

trait Orders_operations
{
    /**
     * Update Existing Setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function AcceptReply($request,$reply){
        $order = Order::find($request->order_id);
        $supplier =User::find($reply->supplier_id);
        // update replies status ...
        $reply->update(['status'=>"accepted"]);
        $replies = Reply::whereOrderId($request->order_id)->where('supplier_id','!=',$supplier->id);
        $replies->update(['status'=>'refused']);
//         update order statsus  ...
        $orderUdates['winner_reply_id'] = $reply->id ;
        $orderUdates['supplier_id'] = $reply->supplier_id ;
        $orderUdates['app_percentage'] = $supplier->commission ;
        $orderUdates['total'] = $reply->total;
        $orderUdates['supplier_percent'] = $this->calcSupplierPercent($reply->total,$supplier->commission);
        $order->update($orderUdates);
//      make transactions  .....
        $supplier->make_transaction($orderUdates['supplier_percent'],'wait');

    }

    private function calcSupplierPercent($total,$percent){
        return  $total - ($total * ($percent/100));
    }


}
