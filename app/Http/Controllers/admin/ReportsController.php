<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{

    public function SupplierSales(Request $request){
        $suppliers = User::whereType('supplier')->get();

        if($request->has('type') && $request->type == 'initial'){
            $orders = [];
        }
        else{
            $query =Order::orderBy('created_at', 'desc');
            if ($request->has('supplier_id') && $request->supplier_id != null){
                $supplyer_replyes_ids = Reply::where('supplier_id',$request->supplier_id)->pluck('id');
                $query = $query->whereIn('winner_reply_id',$supplyer_replyes_ids);

            }

            if ($request->has('from') && $request->from != null){
                $start = date('Y-m-d', strtotime($request->from));
                $query->whereDate('created_at', '>=' ,  $start);
            }

            if ($request->has('to') && $request->to != null){
                $end = date('Y-m-d', strtotime($request->to));
                $query->whereDate('created_at', '<=' , $end);
            }

            if ($request->has('payment_type') && $request->payment_type != null){
                $query = $query->where('payment_type', $request->payment_type);
            }
            $orders = $query->get();
        }

        return view('admin.reports.supplier_sales_report',compact('suppliers','orders'));
    }
    public function SupplierRefused(Request $request){

        return view('admin.reports.supplier_refused_offers');
    }


    public function CustomerOrders(Request $request){
        $users = User::whereType('user')->get();
        if($request->has('type') && $request->type == 'initial'){
            $orders = [];
        }else{
            $query =Order::orderBy('created_at', 'desc');
            if ($request->has('user_id') && $request->user_id != null){
                $query = $query->where('user_id',$request->user_id);
            }

            if ($request->has('from') && $request->from != null){
                $start = date('Y-m-d', strtotime($request->from));
                $query->whereDate('created_at', '>=' ,  $start);
            }

            if ($request->has('to') && $request->to != null){
                $end = date('Y-m-d', strtotime($request->to));
                $query->whereDate('created_at', '<=' , $end);
            }
            $orders = $query->get();
        }

        return view('admin.reports.customer_orders',compact('users','orders'));
    }

}
