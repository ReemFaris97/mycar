<?php

namespace App\Http\Controllers\supplier;

use App\Order;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class financialController extends Controller
{
    public function index(){
        $data['totalSales'] = Order::where('supplier_id',auth()->id())->sum('total');
        $data['netProfit'] = Order::where('supplier_id',auth()->id())->sum('supplier_percent');
        $data['receivedMoney'] = Transaction::where('user_id',auth()->id())->where('type','done')->sum('value');
//         don't forget the transactions
        return view('suppliers.financial.index',compact('data'));
    }
}
