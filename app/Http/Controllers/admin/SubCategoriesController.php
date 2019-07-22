<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCats = SubCategory::all()->reverse();
        return view('admin.subcategories.index',compact('subCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
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
            'category_id'=>'required|numeric|exists:categories,id',
        ];
        $this->validate($request,$rules);

        SubCategory::create($request->all());
        session()->flash('success','تم الإضافة بنجاح');
        return redirect()->back();
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
        $categories = Category::all();
        $subCat = SubCategory::findOrFail($id);
        return view('admin.subcategories.edit',compact('categories','subCat'));
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
        $subCat = SubCategory::findOrFail($id);
        $rules = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'category_id'=>'required|numeric|exists:categories,id',
        ];
        $this->validate($request,$rules);
        $subCat->update($request->all());
        session()->flash('success','تم التعديل بنجاح');
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
        $subCat = SubCategory::find($id);
        if($subCat){
            $subCat->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'title'=>"خطأ",
                'message'=>"غير موجود او تم حذفه من قبل"
            ]);
        }
    }
}
