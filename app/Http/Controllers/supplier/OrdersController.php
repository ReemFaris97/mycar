<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    public function newOrders(){
        $orders = Order::whereStatus('new')->get()->reverse();
        return view('supplier.orders.new',compact('orders'));
    }

    public function waitingOrders(){
        $user = auth()->user();
        $orders = Order::WhereHas('replies', function($query) use($user) {
            $query->where('supplier_id',$user->id)->whereStatus('new');
        })->get();
        return view('supplier.orders.waiting',compact('orders'));
    }

    public function received(){
        $user = auth()->user();
        $orders = Order::WhereHas('replies', function($query) use($user) {
            $query->where('supplier_id',$user->id)->where('status','accepted');
        })->get();
        return view('supplier.orders.received',compact('orders'));
    }

    public function finished(){
        $user = auth()->user();
        $orders = Order::where('status','finished')->WhereHas('replies', function($query) use($user) {
            $query->where('supplier_id',$user->id)->where('status','finished')->orWhere('status','refused');
        })->get();
        return view('supplier.orders.finished',compact('orders'));
    }




    public function show($id){
        $order = Order::findOrFail($id);
        return view('supplier.orders.details',compact('order'));
    }
}
