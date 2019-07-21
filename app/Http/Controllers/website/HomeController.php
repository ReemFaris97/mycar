<?php

namespace App\Http\Controllers\website;

use App\Contact;
use App\Proposal;
use App\ProposalComments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function landingPage(){
        return view('website.home.landing');
    }

    public function home(){
        $proposals = Proposal::all()->reverse();
        return view('website.home.index',compact('proposals'));
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

    public function PostSuggestComment(Request $request){
        $proposal = Proposal::find($request->proposal_id);

        if($proposal){

            $proposal->comments()->create($request->all());
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم إضافة تعليقك على المقترح بنجاح"
            ]);
        }
    }
}
