<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
class ProfileController extends Controller
{
    public function getProfilePage(){
        $user = auth()->user();
        return view('admin.profile.edit',compact('user'));
    }

    public function updateProfile(Request $request){
        $user = auth()->user();
        if($user){
            $validate = Validator::make(['phone'=>$request->phone,'email'=>""],['phone' => 'sometimes|string|max:255|unique:users,phone,' .$user->id,'email' => 'sometimes|email|max:255|unique:users,email,' .$user->id,],['phone.unique'=>"هذا الهاتف مسجل من قبل",'email.unique'=>"هذا البريد مسجل من قبل"]);
            if($validate->passes()){

                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->email = $request->email;

                if($request->has('password') && $request->password !=""){
                    $user->password = Hash::make($request->password);
                }

                if($request->has('image')){
                    deleteImg($user->image);
                    $user->image = uploader($request,'image');
                }

                if($user->save()){
                    session()->flash('success','تمت تعديل الصفحة الشخصية بنجاح');
                    return redirect()->route('admins.index');
                }

            }
            else{
                $errors = $validate->messages();
                return redirect()->back()->withInput()
                    ->withErrors($errors);
            }

        }
        else{
            return abort(404);
        }
    }
}
