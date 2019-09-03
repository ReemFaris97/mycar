<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getProfilePage(){
        $supplier = auth()->user();
        return view('suppliers.profile.edit',compact('supplier'));
    }

    public function updateProfile(Request $request){
        $rules= [
            'name'=>"required|string|max:191",
            'phone'=>"required|numeric|unique:users,phone,".auth()->id(),
            'address'=>"required|string",
            'lat'=>'required',
            'lng'=>'required'
        ];
        $this->validate($request,$rules);
        $user = auth()->user();
        $inputs = $request->all();
        $inputs['image']= uploader($request,'image');
        $user->update($inputs);
        session()->flash('success','تم تعديل الصفحة الشخصية بنجاح');
        return back();
    }
}
