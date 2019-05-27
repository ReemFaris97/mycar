<?php

namespace App\Http\Controllers\admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role !='super'){
            return abort(401);
        }

        $deparments = Department::all();
        return view('admin.departments.index',compact('deparments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role !='super'){
            return abort(401);
        }

        return view('admin.departments.create');
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
        
        Department::create($request->all());

        session()->flash('success','تم إضافة القسم بنجاح');
        return redirect()->route('departments.index');

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
        if(auth()->user()->role !='super'){
            return abort(401);
        }
        $department = Department::find($id);
        return view('admin.departments.edit',compact('department'));
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

        Department::find($id)->update(['name'=>$request->name]);
        session()->flash('success','تم تعديل القسم بنجاح');
        return redirect()->route('departments.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Department::find($request->id)->delete();

        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>"تم حذف القسم بنجاح"
        ]);

    }
}
