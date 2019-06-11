<?php

namespace App\Http\Traits;
use App\Reply;
use App\ReplyDetails;
use Illuminate\Http\Request;

trait Replies_operations
{
    /**
     * Update Existing Setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function CreateReply($id)
    {
        $inputs['order_id'] = $id;
        $inputs['supplier_id'] =auth()->id();
        $inputs['status'] ='new';
        return Reply::create($inputs);
    }

    public function CreateReplyDetails($request,$reply_id,$order_id){
        $ids=  $request->order_details_id;
        $prices = $request->part_price;
        $quantities = $request->quantities;

        for ($i = 0 ; $i <count($ids) ; $i++){
            ReplyDetails::create([
               'reply_id'=>$reply_id,
               'order_details_id'=>$ids[$i],
               'order_id'=> $order_id,
               'part_price'=>$prices[$i],
               'total_parts'=>((int) $prices[$i] * (int)$quantities[$i])
            ]);
        }
    }

}
