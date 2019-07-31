<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (!Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $users = User::whereType('user')->get()->reverse();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (!Gate::allows('users_manage')) {
//            return abort(401);
//        }

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $roles = [
            'name'=>'nullable|string|max:191',
            'phone'=>'required|numeric|unique:users,phone',
//            'password'=>'required|string|confirmed|max:55',
            'address'=>'required|string|max:191',
        ];
        $this->validate($request,$roles);
        $inputs = $request->all();
        $inputs['type'] = 'user';
        $inputs['password']= Hash::make($request->password);
        User::create($inputs);
        session()->flash('success','تم الإضافة بنجاح');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        if (!Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $user = User::find($id);
        if($user){
            return view('admin.users.details',compact('user'));
        }
        else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        if (!Gate::allows('users_manage')) {
//            return abort(401);
//        }
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user= User::findOrFail($id);
        $roles = [
            'name'=>'nullable|string|max:191',
            'phone'=>'required|numeric|unique:users,phone,'.$user->id,
//            'password'=>'nullable|string|confirmed|max:55',
            'address'=>'required|string|max:191',
        ];
        $this->validate($request,$roles);


         $inputs = $request->except('password');
        if($request->password != null){
            $inputs['password']= Hash::make($request->password);
        }

        $user->update($inputs);
        session()->flash('success','تم تعديل المستخدم بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            deleteImg($user->image);
            $user->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);
        }
    }


    public function getCities(Request $request){

        $cities = City::whereCountryId($request->id)->whereIsActive(1)->get();

        //  return $districts;
        return response()->json([
            'status' => true,
            'data' => $cities
        ]);

    }


    public function suspendOrActivate(Request $request){

        $user = User::find($request->id);

        if($request->action == 'activate'){
            $user->is_active = 1;
            $user->save();
            $title = 'نجاح';
            $message = 'تم تفعيل المستخدم بنجاح';
            session()->flash('success',$message);
        }
        elseif ($request->action == 'suspend'){
            $user->is_active = 0;
            $user->suspend_reason = $request->reason;
            $user->save();
            $title = 'نجاح';
            $message = 'تم حظر المستخدم بنجاح';
            session()->flash('success',$message);
        }
        else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>'حدث خطأ او المستخدم غير موجود'
            ]);
        }

        return response()->json([
            'status'=>true,
            'title'=>$title,
            'message'=>$message
        ]);

    }

    public function suspendWithReason(Request $request){
        $user = User::find($request->id);
        $user->is_active = 0;
        $user->suspend_reason = $request->suspendReason;
        $user->save();

        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>'تم حظر المستخدم بنجاح'
        ]);

    }
}
