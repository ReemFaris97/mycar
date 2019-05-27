<?php

namespace App\Http\Controllers\admin;

use App\Department;
use App\Specialization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role != 'super') {
            return abort(401);
        }

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role != 'super') {
            return abort(401);
        }
        $specializations = Specialization::all();
        $departments = Department::all();
        return view('admin.users.create',compact('specializations','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'name' =>$request->name,
            'email'      =>$request->email,
            'phone'      =>$request->phone,
            'job_number'      =>$request->job_number,
            'password'   =>$request->password,
            'password_confirmation'   =>$request->password_confirmation,
            'role'=>$request->role,
            'specialize_id'=>$request->specialize_id,
            "dept_id"=>$request->dept_id,
            'image' => $request->image,
        ];
        $rules = [
            'name' =>'required|string|max:191',
            'email'      =>'nullable|email:max:191|unique:users',
            'phone'      =>'required|string|unique:users',
            'job_number'      =>'required|string|unique:users',
            'password'   =>'required|string|confirmed|max:191',
            'role'=>"required|string|max:191",
            'specialize_id'=>"required_if:role,technical",
            "dept_id"=>"required_if:role,dept_admin",
            'image' => 'nullable|image',

        ];

        $messages = [
            'name.required'=>"الإسم مطلوب",
            'phone.required'=>"رقم الجوال مطلوب",
            'email.required'=>"البريد الإلكتروني مطلوب",
            'password.required'=>"كلمة المرور مطلوبة",
            'name.max'=>"اقصى عدد حروف هو 191 حرف",
            'email.max'=>"اقصى عدد حروف هو 191 حرف",
            'phone.unique'=>"هذا الهاتف مسجل من قبل",
            'job_number.required'=>"رقم الوظيفة مطلوب",
            "role.required"=>"المهمة مطلوبة",
            "specialize_id.required_if"=>"يجب إختيار تخصص للفني",
            "dept_id.required_if"=>"يجب إختيار قسم لمسؤول القسم",
            'image.mimes'=>"يجب ان يكون الملف من النوع JPG, JPEG , PNG",
        ];


        $valResult = Validator::make($data,$rules,$messages);

        if($valResult->passes()){

            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->job_number = $request->job_number;
            $user->password = bcrypt($request->password);

            if($request->image){
                $user->image = uploader($request,'image');
            }
            $user->role = $request->role;

            if($request->role == 'technical'){
                $user->specialize_id = $request->specialize_id;
            }

            if($request->role == 'dept_admin'){
                $user->dept_id = $request->dept_id;
            }

            $user->save();

            session()->flash('success','تم إضافة مستخدم للنظام بنجاح');
            return redirect()->route('users.index');

        }else{
             $errors = $valResult->messages();
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->role != 'super') {
            return abort(401);
        }
        $user = User::find($id);
        return view('admin.users.details',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->role != 'super') {
            return abort(401);
        }

        $specializations = Specialization::all();
        $departments = Department::all();
        $user = User::find($id);
        return view('admin.users.edit',compact('user','specializations','departments'));
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

        $data = [
            'name' =>$request->name,
            'email'      =>$request->email,
            'phone'      =>$request->phone,
            'job_number'      =>$request->job_number,
            'password'   =>$request->password,
            'password_confirmation'   =>$request->password_confirmation,
            'role'=>$request->role,
            'specialize_id'=>$request->specialize_id,
            "dept_id"=>$request->dept_id,
            'image' => $request->image,
        ];
        $rules = [
            'name' =>'required|string|max:191',
            'email'      =>'nullable|email:max:191|unique:users,email,' . $user->id,
            'phone'      =>'required|string|unique:users,phone,' . $user->id,
            'job_number'      =>'required|string|unique:users,job_number,'. $user->id,
            'password'   =>'nullable|string|confirmed|max:191',
            'role'=>"required|string|max:191",
            'specialize_id'=>"required_if:role,technical",
            "dept_id"=>"required_if:role,dept_admin",
            'image' => 'nullable|image',

        ];

        $messages = [
            'name.required'=>"الإسم مطلوب",
            'phone.required'=>"رقم الجوال مطلوب",
            'email.required'=>"البريد الإلكتروني مطلوب",
            'password.required'=>"كلمة المرور مطلوبة",
            'name.max'=>"اقصى عدد حروف هو 191 حرف",
            'email.max'=>"اقصى عدد حروف هو 191 حرف",
            'phone.unique'=>"هذا الهاتف مسجل من قبل",
            'job_number.required'=>"رقم الوظيفة مطلوب",
            "role.required"=>"المهمة مطلوبة",
            "specialize_id.required_if"=>"يجب إختيار تخصص للفني",
            "dept_id.required_if"=>"يجب إختيار قسم لمسؤول القسم",
            'image.mimes'=>"يجب ان يكون الملف من النوع JPG, JPEG , PNG",
        ];
        $valResult = Validator::make($data,$rules,$messages);

        if($valResult->passes()){

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->job_number = $request->job_number;
            $user->password = bcrypt($request->password);

            if($request->image){
                deleteImg($user->image);
                $user->image = uploader($request,'image');
            }
            $user->role = $request->role;

            if($request->role == 'technical'){
                $user->specialize_id = $request->specialize_id;
                $user->dept_id = null;
            }

            if($request->role == 'dept_admin'){
                $user->dept_id = $request->dept_id;
                $user->specialize_id = null;
            }

            $user->save();

            session()->flash('success','تم تعديل المستخدم بنجاح');
            return redirect()->back();

        }
        else{

             $errors = $valResult->messages();
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);
        if($user){
            deleteImg($user->image);
            $user->delete();
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>'تم حذف المستخدم بنجاح'
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>'المستخدم غير موجود'
            ]);
        }
    }

    public function activeOrSuspend(Request $request){



        $user = User::find($request->id);

        if($request->action == 'activate'){
            $user->is_active = 1;
            $user->suspend_reason = $request->reason;
            $user->save();
            $title = 'نجاح';
            $message = 'تم تفعيل المستخدم بنجاح';

        }

            elseif ($request->action == 'suspend'){
                $user->is_active = 0;
                $user->suspend_reason = $request->reason;
                $user->save();
                $title = 'نجاح';
                $message = 'تم حظر المستخدم بنجاح';
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


    public function getProfile(){
        $user = auth()->user();
        return view('admin.users.profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $user = User::find(auth()->id());

        $data = [
            'name' =>$request->name,
            'email'      =>$request->email,
            'phone'      =>$request->phone,
            'password'   =>$request->password,
            'password_confirmation'   =>$request->password_confirmation,
            'image' => $request->image,
        ];
        $rules = [
            'name' =>'required|string|max:191',
            'email'      =>'nullable|email:max:191|unique:users,email,' . $user->id,
            'phone'      =>'required|string|unique:users,phone,' . $user->id,
            'password'   =>'nullable|string|confirmed|max:191',
            'image' => 'nullable|image',

        ];

        $messages = [
            'name.required'=>"الإسم مطلوب",
            'phone.required'=>"رقم الجوال مطلوب",
            'email.required'=>"البريد الإلكتروني مطلوب",
            'password.required'=>"كلمة المرور مطلوبة",
            'name.max'=>"اقصى عدد حروف هو 191 حرف",
            'email.max'=>"اقصى عدد حروف هو 191 حرف",
            'phone.unique'=>"هذا الهاتف مسجل من قبل",
            'image.mimes'=>"يجب ان يكون الملف من النوع JPG, JPEG , PNG",
        ];
        $valResult = Validator::make($data,$rules,$messages);

        if($valResult->passes()){

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            if($request->image){
                deleteImg($user->image);
                $user->image = uploader($request,'image');
            }

            $user->save();
            session()->flash('success','تم تعديل الصفحة الشخصية بنجاح');
            return redirect()->back();
        }
        else{
            $errors = $valResult->messages();
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }
    }
}
