<?php

namespace App\Http\Controllers\admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'image'=>'required|image',
        ];
        $this->validate($request,$rules);
        $inputs = $request->all();
        $inputs['image'] = uploader($request,'image');
        Company::create($inputs);
        session()->flash('success','تمت الإضافة بنجاح');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit',compact('company'));
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
        $rules = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'image'=>'sometimes|image'
        ];

        $company = Company::find($id);
        $this->validate($request,$rules);
        $inputs = $request->all();
        if($request->has('image') && $request->image != null){
            deleteImg($company->image);
            $inputs['image']= uploader($request,'image');
        }
        $company->update($inputs);
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if($company){
            $company->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);
        }
    }
    public function suspendOrActivate(Request $request){

        $company = Company::find($request->id);

        if($request->action == 'suspend'){
            $company->is_active = 0;
            $company->save();
            $title = "نجاح";
            $message = "تم حظر الشركة بنجاح";
            session()->flash('success','تمت حظر الشركة بنجاح');
        }else{
            $company->is_active = 1;
            $company->save();
            $title = 'نجاح';
            $message = 'تم تفعيل الشركة بنجاح';
            session()->flash('success','تمت تفعيل الشركة بنجاح');
        }

        return response()->json([
            'status'=>true,
            'title'=>$title,
            'message'=>$message
        ]);


    }
}
