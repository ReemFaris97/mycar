<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class financialController extends Controller
{
    public function index(){
        $data['total'] = Order::where('supplier_id',auth()->id())->sum('total');
        $data['supplier_percent'] = Order::where('supplier_id',auth()->id())->sum('supplier_percent');
//         don't forget the transactions
        return view('suppliers.financial.index',compact('data'));
    }
}
