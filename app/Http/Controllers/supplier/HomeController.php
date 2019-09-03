<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $user = auth()->user();
        $data = [
            'new_orders_count'=>Order::Where('status','waiting')->orWhere('status','new')->
            get()->filter(function ($query) {
                return (!$query->hasAnyReplyByAuthSupplier());
            })->count() ,

            'waiting_orders_count'=>Order::WhereHas('replies', function($query) use ($user) {
                $query->where('supplier_id',$user->id)->whereStatus('new');
            })->get()->count(),

            'received_orders_count'=>Order::whereSupplierId(auth()->id())->get()->count(),

            'finished_orders'=>Order::where('status','finished')->orWhere('status','waiting')->WhereHas('replies', function($query) use($user) {
                $query->where('supplier_id',$user->id)->where('status','finished')->orWhere('status','refused');
            })->get()->count()
        ];
        return view('suppliers.home.home',compact('data'));
    }
}
