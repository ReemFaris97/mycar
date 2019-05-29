<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Database\Role;
use Validator;
use App\User;
use App\City;
//use App\Chat;
use Illuminate\Support\Facades\Gate;

class AdminsController extends Controller
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

        $query = User::select()->whereHas('roles', function ($q) {
            $q->where('name', '!=', '*');
        })->with('roles');

        $admins = $query->get();

        return view('admin.admins.index')->with(compact('admins'));

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

        $cities = City::whereIsActive(1)->get();
        $roles = Role::get();

        $roles = $roles->reject(function ($q) {
            return $q->name == 'owner' || $q->name === '*';
        });
        return view('admin.admins.create')->with(compact('roles','cities'));
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
                'name'=>'string|required|max:191',
                'phone'=>"string|required|max:191,unique:users,phone",
                'email'=>'string|required|max:191,unique:users,phone',
                'password'=>"required|confirmed",
                'image'=>'nullable|sometimes|image'
            ];

            $this->validate($request,$roles);

            $inputs = $request->all();
            $inputs['password']= Hash::make($request->password);
            $inputs['type'] = 'admin';
        if($request->has('image'))
            $inputs['image'] = uploader($request,'image');


                $user = User::create($inputs);


                foreach ($request->input('roles') as $role) {
                    if ($role && $role != "") {
                        $user->assign($role);
                    }
                }

//                Chat::create(['user_id'=>$user->id]);
                session()->flash('success','تمت إضافة المدير المساعد بنجاح');
                return redirect()->route('admins.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $admin = User::find($id);
        return view('admin.admins.details')->with(compact('admin'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $cities = City::whereIsActive(1)->get();
        $admin = User::find($id);
        $roles = Role::get();


        $roles = $roles->reject(function ($q) {
            return $q->name == 'owner' || $q->name === '*';
        });
        return view('admin.admins.edit',compact('admin','cities','roles'));
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
        $user = User::find($id);
        if($user){
            $validate = Validator::make(['phone'=>$request->phone],['phone' => 'sometimes|string|max:255|unique:users,phone,' .$id,],['phone.unique'=>"هذا الهاتف مسجل من قبل"]);
            if($validate->passes()){

                    $user->name = $request->name;
                    $user->phone = $request->phone;

                    if($request->has('password') && $request->password !=""){
                        $user->password = Hash::make($request->password);
                    }



                    if($request->has('image')){
                        deleteImg($user->image);
                        $user->image = uploader($request,'image');
                    }

                    if($user->save()){
                        foreach ($request->input('roles') as $role) {
                            if ($role && $role != "") {
                                $user->assign($role);
                            }
                        }
                        session()->flash('success','تمت تعديل المدير المساعد بنجاح');
                        return redirect()->route('admins.index');
                    }

            }
            else{
                $errors = $validate->messages();
                return redirect()->back()->withInput()
                    ->withErrors($errors);
            }

        }
        else{
            return abort(404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function suspendOrActivate(Request $request){

        $user = User::find($request->id);

        if($request->action == 'activate'){
            $user->is_active = 1;
            $user->save();
            $title = 'نجاح';
            $message = 'تم تفعيل المستخدم بنجاح';
        }else{
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
        session()->flash('success','تم حظر المساعد بنجاح');
        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>'تم حظر المستخدم بنجاح'
        ]);

    }
}
