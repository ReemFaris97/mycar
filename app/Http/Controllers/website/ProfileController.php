<?php

namespace App\Http\Controllers\website;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('website.profile.profile',compact('user'));
    }

    public function notifications(){
        $notifications = Notification::whereUserId(auth()->id())->get()->reverse();
        return view('website.profile.notifications',compact('notifications'));
    }
}
