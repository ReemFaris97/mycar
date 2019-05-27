<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Specialization;

class SpecializationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role != 'super'){
            return abort(401);
        }
        $specializations = Specialization::all();
        return view('admin.specializations.index',compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role != 'super'){
            return abort(401);
        }
        return view('admin.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255',
        ]);

        Specialization::create($request->all());

        session()->flash('success','تم إضافة التخصص بنجاح');
        return redirect()->route('specializations.index');

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
        if(auth()->user()->role != 'super'){
            return abort(401);
        }
        $specialization = Specialization::find($id);
        return view('admin.specializations.edit',compact('specialization'));
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
        $this->validate($request,[
            'name'=>'required|string|max:255',
        ]);

        Specialization::find($id)->update(['name'=>$request->name]);
        session()->flash('success','تم تعديل التخصص بنجاح');
        return redirect()->route('specializations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Specialization::find($request->id)->delete();

        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>"تم حذف التخصص بنجاح"
        ]);

    }
}
