<?php

namespace App\Http\Controllers\website;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function landingPage(){
        return view('website.home.landing');
    }

    public function home(){
        return view('website.home.index');
    }

    public function about(){
        return view('website.home.about');
    }
    public function terms(){
        return view('website.home.terms');
    }
    public function contact(){
        return view('website.home.contact');
    }
    public function postContact (Request $request){

        Contact::create($request->all());
        return response()->json([
            'status'=>true,
            'title'=>"نجاح",
            'message'=>"تم إرسال رسالتك بنجاح"
        ]);
    }
}
