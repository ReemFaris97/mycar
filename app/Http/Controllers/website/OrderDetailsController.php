<?php

namespace App\Http\Controllers\website;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailsController extends Controller
{
    public function orderDetails($id){
        $order = Order::findOrFail($id);
        return view('website.order.order_details.distributors',compact('order'));
    }
}
