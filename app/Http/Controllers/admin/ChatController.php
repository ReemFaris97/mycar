<?php

namespace App\Http\Controllers\admin;

use App\Chat;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Gate;
class ChatController extends Controller
{
    /**
     * Display a listing of the Contact Messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('chat_manage')) {
            return abort(401);
        }
        $channel = Chat::where('id',$id)->first();
        return view('admin.Chat.show')->with('channel',$channel);
    }

    /**
     * Display a listing of the Contact Messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('chat_manage')) {
            return abort(401);
        }
        $channels = Chat::orderBy('id','desc')->paginate(10);
        return view('Admin.Chat.index')->with('channels',$channels);
    }


}
