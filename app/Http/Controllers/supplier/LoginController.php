<?php

namespace App\Http\Controllers\supplier;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Traits\UserOperation;

class LoginController extends Controller
{
    use UserOperation;
    public function getSupplierLogin()
    {
        if (auth()->check() && auth()->user()->type =='supplier') {
            return redirect(route('supplier.home'));
        }
        return view('supplier.auth.login');
    }

    public function postPhoneNumber(Request $request){

        $rules = [
            'phone'=>'required|numeric',
        ];
        $this->validate($request,$rules);
        $user = User::wherePhone($request->phone)->first();
        if($user && $user->type == 'supplier'){

          $code =  $this->generateLoginCode($user);

            session()->flash('code_sent','تم ارسال الكود بنجاح');
            return view('supplier.auth.code_login',compact('user'));
        }
        else
            session()->flash('loginError','الرقم غير موجود');
            return redirect()->back();
    }

    public function login(Request $request)
    {
        // Validation Rules ...
        $rules = ['code' => 'required','phone'=>'required'];
        $this->validate($request,$rules);
        $user = User::wherePhone($request->phone)->first();
        if($user){
            if($user->login_code == $request->code){
                // Login and "remember" the given user...
                Auth::loginUsingId($user->id, true);
                return redirect()->route('supplier.home');
            }else{
                session()->flash('code_error','عفواً الكود الذي ادخلته غير صحيح');
                return  view('supplier.auth.code_login',compact('user'));
            }
        }
        else{
            session()->flash('loginError','هذا الرقم غير موجود');
            return redirect()->route('supplier.login');
        }
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect(url('/supplier'));
    }
}
