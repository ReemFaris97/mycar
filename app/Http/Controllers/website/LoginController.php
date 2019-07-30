<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function checkPhoneOrRegister(Request $request){
        return $request->all();
    }
}
