<?php

namespace App\Http\Controllers\website;

use App\Category;
use App\Company;
use App\Order;
use App\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getWizard(){
        $oldOrders = Order::whereUserId(auth()->id())->get();
        $parts = Part::all();
        $companies = Company::all();
        $categories = Category::all();

        return view('website.order.wizard',compact('companies','oldOrders','parts','categories'));
    }

    public function initiateOrder(Request $request){
        return $request->all();
    }
}
