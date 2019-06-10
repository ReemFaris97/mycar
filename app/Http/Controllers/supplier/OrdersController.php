<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

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
        $orders = Order::WhereHas('replies', function($query) use ($user) {
            $query->where('supplier_id',$user->id)->where('status','accepted');
        })->get();
        return view('suppliers.orders.received',compact('orders'));
    }


//    done ..
    public function finished(){
        $user = auth()->user();
        $orders = Order::where('status','finished')->orWhere('status','received')->WhereHas('replies', function($query) use($user) {
            $query->where('supplier_id',$user->id)->where('status','finished')->orWhere('status','refused');
        })->get();
        return view('suppliers.orders.finished',compact('orders'));
    }


    public function show($id){
        $order = Order::findOrFail($id);
        return view('suppliers.orders.details',compact('order'));
    }
}
