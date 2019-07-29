<?php

namespace App\Http\Controllers\website;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function getRegisterPage(){
        return view('website.supplier.register');
    }

    public function RegisterSupplier(Request $request){
        $roles = [
            'name'=>'required|string|max:191',
            'phone'=>'required|numeric|unique:users,phone',
            'password'=>'required|string|confirmed|max:55',
            'licence_number'=>"required|numeric|unique:users,phone",
            'commission'=>"required|numeric|max:99",
            'licence_image'=>'required|mimes:jpg,jpeg,gif,png',
            'address'=>'required|string|max:191',
        ];

        $this->validate($request,$roles);

        $inputs = $request->all();
        $inputs['type'] = 'supplier';
        $inputs['password'] = Hash::make($request->password);
        $inputs['licence_image'] = uploader($request,'licence_image');
        User::create($inputs);
        session()->flash('success','تم تسجيلك بنجاح ..في انتظار موافقة الإدارة على طلب إنضمامك');
        return redirect()->back();


    }
}
