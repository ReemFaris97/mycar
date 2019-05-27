<?php

namespace App\Http\Controllers\admin;


use App\Department;
use App\Http\Controllers\Controller;

use App\Order;
use App\Product;
use App\Specialization;
use Illuminate\Http\Request;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'departments'=>Department::all()->count(),
            'specials'=>Specialization::all()->count(),
            'products'=>Product::all()->count(),
            'admins'=>User::whereRole('super')->get()->count(),
            'coordinators'=>User::whereRole('coordinator')->get()->count(),
            'dept_admins'=>User::whereRole('dept_admin')->get()->count(),
            'techs'=>User::whereRole('technical')->get()->count(),
            'orders'=>Order::all()->count(),
            'new_orders'=>Order::whereStatus('new')->get()->count(),
            'refused_orders'=>Order::whereStatus('refused')->get()->count(),
            'accepted_orders'=>Order::whereStatus('accepted')->get()->count(),
            'completed_orders'=>Order::whereStatus('finished')->get()->count(),
        ];

        return view('admin.home.home',compact('data'));
    }







}
