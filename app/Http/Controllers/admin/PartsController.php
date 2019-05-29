<?php

namespace App\Http\Controllers\admin;

use App\Company;
use App\CompanyModel;
use App\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::all();
        return view('admin.parts.index',compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::whereIsActive(1)->get();
        return view('admin.parts.create',compact('companies'));
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
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'company_model_id'=>"required|exists:company_models,id"
        ];
        $this->validate($request,$roles);
        Part::create($request->all());
        session()->flash('success','تم الإضافة بنجاح');
        return redirect()->route('parts.index');
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
        $part = Part::findOrFail($id);

        $companies = Company::whereIsActive(1)->get();
        $company_models = CompanyModel::whereCompanyId($part->company_model->company->id)->get();
        return view('admin.parts.edit',compact('part','companies','company_models'));
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
        $part = Part::findOrFail($id);
        $roles = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'company_model_id'=>"required|exists:company_models,id"
        ];
        $this->validate($request,$roles);
        $part->update($request->all());
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);
        if($part){
            $part->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);
        }
    }

    public function getCompanyModels(Request $request){
        $models = CompanyModel::whereCompanyId($request->id)->whereIsActive(1)->get();

        //  return $districts;
        return response()->json([
            'status' => true,
            'data' => $models
        ]);
    }
}
