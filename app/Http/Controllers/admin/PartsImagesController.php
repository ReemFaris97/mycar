<?php

namespace App\Http\Controllers\admin;

use App\PartImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $part_image = PartImages::findOrFail($id);
        return view('admin.partImages.edit',compact('part_image'));
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
        $part_image = PartImages::findOrFail($id);
        $rules = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'code'=>'required|string|max:191',
            'number'=>'required|string|max:191',
            'image'=>'sometimes|image',
        ];
        $this->validate($request,$rules);
        $inputs = $request->all();
        if($request->has('image') && $request->image != null){
            deleteImg($part_image->image);
            $inputs['image'] = uploader($request,'image');
        }
        $part_image->update($inputs);
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
        $partImage = PartImages::find($id);
        if($partImage){
            deleteImg($partImage->image);
            $partImage->delete();
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>"تم الحذف بنجاح"
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>"القطعة غير موجودة او تم حذفها من قبل"
            ]);
        }
    }
}
