<?php

namespace App\Http\Controllers\website;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UserOperation;
use Illuminate\Support\Facades\Auth;

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
        $user = User::wherePhone($request->phone)->first();
        if($user){
            if($user->login_code == $request->code){
                // Login and "remember" the given user...
                Auth::loginUsingId($user->id, true);

                return response()->json([
                    'status'=>true,
                    'title'=>__('web.success'),
                    'message'=>__('web.login_successfully')
                ]);

            }else{
                return response()->json([
                    'status'=>false,
                    'title'=>__('web.error'),
                    'message'=>__('web.error_code_false')
                ]);
            }
        }
        else{
            session()->flash('loginError','هذا الرقم غير موجود');
            return redirect()->route('supplier.login');
        }
    }

    public function updateAuthUserRegion(Request $request){
       $user = auth()->user();

       $user->update(['region'=>$request->region]);

       return response()->json([
           'status'=>true,
           'title'=>__('web.success'),
           'url'=>request()->root().'/home' ,
           'message'=>__('web.login_success_done')
       ]);

    }
}
