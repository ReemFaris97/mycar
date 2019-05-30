<?php

namespace App\Http\Controllers\admin;

use App\Instructions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstructionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructions = Instructions::all();
        return view('admin.instructions.index',compact('instructions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $rules = [
            'ar_title'=>'required|string|max:191',
            'en_title'=>'required|string|max:191',
            'ar_description'=>'required|string|max:255',
            'en_description'=>'required|string|max:255',
            'image'=>"required|image",
        ];

       $this->validate($request,$rules);
       $inputs = $request->all();
       $inputs['image'] = uploader($request,'image');
       Instructions::create($inputs);
       session()->flash('success','تم الإضافة بنجاح');
       return redirect()->route('instructions.index');

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
        $ins = Instructions::findOrFail($id);
        return view('admin.instructions.edit',compact('ins'));
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
        $ins = Instructions::findOrFail($id);
        $rules = [
            'ar_title'=>'required|string|max:191',
            'en_title'=>'required|string|max:191',
            'ar_description'=>'required|string|max:255',
            'en_description'=>'required|string|max:255',
            'image'=>"sometimes|image",
        ];

        $this->validate($request,$rules);
        $inputs = $request->all();
        if($request->image){
            deleteImg($ins->image);
            $inputs['image'] = uploader($request,'image');
        }
        $ins->update($inputs);
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->route('instructions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ins = Instructions::find($id);
        if($ins){
            deleteImg($ins->image);
            $ins->delete();
            return response()->json([
                'status'=>true,
                'title'=>"نجاح",
                'message'=>"تم الحذف بنجاح"
            ]);

        }
    }
}
