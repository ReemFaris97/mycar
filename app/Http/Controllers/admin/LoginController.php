<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function getAdminLogin()
    {

        if (auth()->check() && auth()->user()->role=='admin') {
            return redirect(route('home'));
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        // get inputs ...
        $data = ['provider' => $request->provider, 'password' => $request->password];

        // Validation Rules ...
        $rules = ['provider' => 'required', 'password' => 'required'];

        // validation rules messages ....
        $messages = ['provider.required' => "هذا الحقل مطلوب", 'password.required' => "هذا الحقل مطلوب"];

        $result = Validator::make($data, $rules, $messages);


        // check validation

        if ($result->passes()) {

//            $field = filter_var($request->provider,FILTER_VALIDATE_EMAIL)?'email' :'phone';

            if (Auth::attempt(['email' => $request->provider, 'password' => $request->password])) {

                $user = auth()->user();
//                $user->login_count += 1;
                $user->updated_at = date("Y-m-d H:i:s");
                $user->save();
                if($user->role == 'super' || $user->role == 'coordinator'){
                    return redirect()->route('homePage');
                }
                elseif ($user->role =='warehouse_admin'){
                    return redirect()->route('exchanges.index');
                }

                else{
                    return redirect()->route('orders.myOrders');
                }



            } else {
                session()->flash('loginError', "خطأ في إسم المستخدم أو كلمة المرور");
                return redirect()->back()->withInput();
            }
        } else {
            // Get messages from validator
            $errors = $result->messages();

            // Error, Redirect To User Edit
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }


    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect(url('/dashboard'));
    }
}
