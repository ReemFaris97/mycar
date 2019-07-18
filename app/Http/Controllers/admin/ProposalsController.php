<?php

namespace App\Http\Controllers\admin;

use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::all()->reverse();
        return view('admin.proposals.index',compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proposals.create');
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
       Proposal::create($inputs);
       session()->flash('success','تمت الإضافة بنجاح');
       return redirect()->route('proposals.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('admin.proposals.show',compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('admin.proposals.edit',compact('proposal'));
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
        $proposal = Proposal::findOrFail($id);
        $rules = [
            'ar_name'=>'required|string|max:191',
            'en_name'=>'required|string|max:191',
            'image'=>'sometimes|image',
        ];
        $this->validate($request,$rules);
        $inputs = $request->all();

        if($request->has('image') && $request->image != null){
            deleteImg($proposal->image);
            $inputs['image']= uploader($request,'image');
        }
        $proposal->update($inputs);
        session()->flash('success','تم تعديل بيانات المقترح بنجاح');
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
        $proposal = Proposal::find($id);
        if($proposal){
            deleteImg($proposal->image);
            $proposal->delete();
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>'تم حذف المقترح بنجاح',

            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'title'=>'خطأ',
                'message'=>'المقترح غير موجود او تم حذفه بالفعل',

            ]);
        }
    }
}
