<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Company;
use App\CompanyModel;
use App\Part;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\PartsOperations;
use Illuminate\Support\Facades\Gate;

class PartsController extends Controller
{
    use PartsOperations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('products_manage')) {
            return abort(401);
        }
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
        if (!Gate::allows('products_manage')) {
            return abort(401);
        }
        $companies = Company::whereIsActive(1)->get();
        $categories = Category::all();
        return view('admin.parts.create',compact('companies','categories'));
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
            'sub_category_id'=>'required|numeric|exists:sub_categories,id',
            'part_ar_name'=>'required|string|max:191',
            'part_en_name'=>'required|string|max:191',
            'company_model_id'=>"required|exists:company_models,id",
            'image'=>'required|image',
            'ar_name'=>'sometimes|array',
            'en_name'=>'sometimes|array',
            'numbers'=>'sometimes|array',
            'codes'=>'sometimes|array',
            'code'=>'nullable|string',
            'images'=>'sometimes|array',
            'images.*'=>"image",
        ];
        $this->validate($request,$roles);

        $part = $this->AddPart($request);


        if($request->has('otherParts') && $request->otherParts == 'on'){
            $this->AddPartImages($request,$part);
        }



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
        if (!Gate::allows('products_manage')) {
            return abort(401);
        }
        $part = Part::findOrFail($id);
        return view('admin.parts.details',compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('products_manage')) {
            return abort(401);
        }
        $part = Part::findOrFail($id);
        $subCategories = collect();
        $models = collect();
        $categories = Category::all();
        if($part->subCategory){
            $subCategories = SubCategory::where('category_id',$part->subCategory->category->id)->get();
        }
        $companies = Company::whereIsActive(1)->get();

        if($part->company_id != null){
            $models = CompanyModel::where('company_id',$part->company_model->company->id)->get();
        }

        return view('admin.parts.edit',compact('part','categories','subCategories','companies','models'));
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
            'sub_category_id'=>'required|numeric|exists:sub_categories,id',
            'part_ar_name'=>'required|string|max:191',
            'part_en_name'=>'required|string|max:191',
            'company_model_id'=>"required|exists:company_models,id",
            'image'=>'sometimes|image',
            'ar_name'=>'sometimes|array',
            'en_name'=>'sometimes|array',
            'numbers'=>'sometimes|array',
            'codes'=>'sometimes|array',
            'code'=>'nullable|string',
            'images'=>'sometimes|array',
            'images.*'=>"image",
        ];

        $this->validate($request,$roles);
        $this->updatePart($request,$part);
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
