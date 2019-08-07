<?php

namespace App\Http\Controllers\website;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getWizard(){
        $companies = Company::all();

        return view('website.order.wizard',compact('companies'));
    }
}
