<?php

namespace App\Http\Controllers\admin;

use App\Department;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function Orders(Request $request)
    {


        $technicals = User::whereRole('technical')->get();
        $departments = Department::all();

        $query = Order::query();

        if($request->has('technical_id') && $request->technical_id != null){
             $query = $query->where('technical_id',$request->technical_id);

        }
        if($request->has('dept_id') && $request->dept_id != null){
            $query = $query->where('dept_id',$request->dept_id);
        }

        if($request->has('status') && $request->status != null){
            $query = $query->where('status',$request->status);
        }
        if($request->has('from') && $request->from != null){
            $from = date('Y-m-d', strtotime($request->from));
            $query = $query->whereDate('created_at','>=',$from);
        }

        if($request->has('to') && $request->to != null){
            $to = date('Y-m-d', strtotime($request->to));
            $query = $query->whereDate('created_at','<=',$to);
        }

        $orders = $query->orderBy('created_at')->get();

        return view('admin.reports.orders',compact('orders','technicals','departments'));
    }
}
