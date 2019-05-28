<?php

namespace App\Http\Controllers\admin;

use App\Company;
use App\CompanyModel;
use App\ModelYears;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = CompanyModel::all();
        return view('admin.companies_models.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentYear =  (int) date("Y");
        $companies = Company::whereIsActive(1)->get();
        return view('admin.companies_models.create',compact('companies','currentYear'));
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
            'company_id'=>'required|numeric|exists:companies,id',
            'ar_name'=>'required|string|max:191',
            "en_name"=>"required|string|max:191",
        ];
        $this->validate($request,$rules);
        $years = $request->year;
        $model = CompanyModel::create($request->all());

        foreach ($years as $year){
            $model->years()->create(['company_model_id'=>$model->id,'year'=>$year]);
        }
        session()->flash('success','تم الإضافة بنجاح');
        return redirect()->route('models.index');

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
        $currentYear =  (int) date("Y");
        $companies = Company::whereIsActive(1)->get();
        $model = CompanyModel::findOrFail($id);
        return view('admin.companies_models.edit',compact('currentYear','companies','model'));
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
            'company_id'=>'required|numeric|exists:companies,id',
            'ar_name'=>'required|string|max:191',
            "en_name"=>"required|string|max:191",
        ];
        $this->validate($request,$rules);
            $model = CompanyModel::findOrFail($id);
        $model->update($request->all());
        $years = $request->year;

        foreach ($model->years as $y){
            $year = ModelYears::where('company_model_id',$model->id)->where('year',$y->year)->first();
            if($year){
                $year->delete();
            }
        }
        foreach ($years as $year){
            $model->years()->create(['company_model_id'=>$model->id,'year'=>$year]);
        }
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->route('models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CompanyModel::find($id);
        if($model){
            $model->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);
        }
    }

    public function suspendOrActivate(Request $request){

        $model = CompanyModel::find($request->id);

        if($request->action == 'suspend'){
            $model->is_active = 0;
            $model->save();
            $title = "نجاح";
            $message = "تم حظر الموديل بنجاح";
            session()->flash('success','تمت حظر الموديل بنجاح');
        }else{
            $model->is_active = 1;
            $model->save();
            $title = 'نجاح';
            $message = 'تم الموديل الشركة بنجاح';
            session()->flash('success','تمت الموديل الشركة بنجاح');
        }

        return response()->json([
            'status'=>true,
            'title'=>$title,
            'message'=>$message
        ]);


    }
}
