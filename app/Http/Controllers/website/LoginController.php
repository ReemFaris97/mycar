<?php

namespace App\Http\Controllers\website;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UserOperation;

class LoginController extends Controller
{
    use UserOperation;

    public function checkPhoneOrRegister(Request $request){
        $user = User::wherePhone($request->phone)->first();
        if($user){
            $this->generateLoginCode($user);
            return response()->json([
                'status'=>true,
                'title'=>__('web.success'),
                'phone'=>$request->phone,
                'message'=>__('web.login_code_sent_successfully')
            ]);
        }
        else{
            $user = User::create(['phone'=>$request->phone]);
            $this->generateLoginCode($user);
            return response()->json([
                'status'=>true,
                'title'=>__('web.success'),
                'phone'=>$request->phone,
                'message'=>__('web.user_registered_successfully')
            ]);
        }
    }

    public function checkLoginCode(Request $request){
        return $request->all();
    }
}
