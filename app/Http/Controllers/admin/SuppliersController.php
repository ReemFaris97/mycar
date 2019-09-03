<?php

namespace App\Http\Controllers\admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('suppliers_manage')) {
            return abort(401);
        }
        $suppliers = User::whereType('supplier')->get()->reverse();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('suppliers_manage')) {
            return abort(401);
        }

        return view('admin.suppliers.create');
    }


    public function store(Request $request)
    {

        $roles = [
            'name'=>'required|string|max:191',
            'phone'=>'required|numeric|unique:users,phone',
            'password'=>'required|string|confirmed|max:55',
            'licence_number'=>"required|numeric|unique:users,phone",
            'commission'=>"required|numeric|max:99",
            'licence_image'=>'required|mimes:jpg,jpeg,gif,png',
            'address'=>'required|string|max:191',
        ];


        $this->validate($request,$roles);

        $inputs = $request->all();
        $inputs['type'] = 'supplier';
        $inputs['password'] = Hash::make($request->password);
        $inputs['licence_image'] = uploader($request,'licence_image');
        User::create($inputs);
        session()->flash('success','تم الإضافة بنجاح');
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('suppliers_manage')) {
            return abort(401);
        }
        $supplier = User::findOrFail($id);
        return view('admin.suppliers.details',compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('suppliers_manage')) {
            return abort(401);
        }
        $supplier = User::findOrFail($id);
        return view('admin.suppliers.edit',compact('supplier'));

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
        $user = User::findOrFail($id);

        $roles = [
            'name'=>'required|string|max:191',
            'phone'=>'required|numeric|unique:users,phone,'.$user->id,
            'password'=>'nullable|string|confirmed|max:55',
            'licence_number'=>"required|numeric|unique:users,phone",
            'commission'=>"required|numeric|max:99",
            'licence_image'=>'sometimes|mimes:jpg,jpeg,gif,png',
            'address'=>'required|string|max:191',
        ];


        $this->validate($request,$roles);
        $inputs = $request->except('password');

        if($request->password != null){
            $inputs['password']= Hash::make($request->password);
        }

        if($request->has('licence_image') && $request->licence_image != null){
            deleteImg($user->licence_image);
            $inputs['licence_image']= uploader($request,'licence_image');
        }

        $user->update($inputs);
        session()->flash('success','تم تعديل بيانات المورد بنجاح');
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

    public function acceptJoinRequest(Request $request){
        $user = User::find($request->id);
        if($user){
            $user->is_accepted = 1;
            $user->save();
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>'تم قبول المورد بنجاح'
            ]);
        }
    }
    

    public function getWalletPage($id){
        $supplier = User::find($id);
        return view('admin.suppliers.wallet',compact('supplier'));
    }
    public function postSupplierMoney(Request $request,$id){
        $transaction = new Transaction();
        $transaction->value = $request->value;
        $transaction->type = $request->type;
        $transaction->user_id = $id;
        $transaction->save();
        session()->flash('success','تم تصفية الحساب بنجاح');
        return redirect()->back();

    }
}
