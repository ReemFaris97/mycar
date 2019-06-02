<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{

    public function SupplierSales(){
        return view('admin.reports.supplier_sales_report');
    }
    public function SupplierRefused(){
        return view('admin.reports.supplier_refused_offers');
    }

    public function CustomerOrders(){
        return view('admin.reports.customer_orders');
    }

}
