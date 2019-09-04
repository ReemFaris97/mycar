<?php

namespace App\Http\Controllers\admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('cities_manage')) {
            return abort(401);
        }
        $cities = City::all();

        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('cities_manage')) {
            return abort(401);
        }
        return view('admin.cities.create');
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
            'delivery_price'=>'required|numeric'
        ];
        $this->validate($request,$rules);
        City::create($request->all());
        session()->flash('success','تمت الإضافة بنجاح');
       return redirect()->route('cities.index');
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
        if (!Gate::allows('cities_manage')) {
            return abort(401);
        }
        $city = City::findOrFail($id);
        return view('admin.cities.edit',compact('city'));
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
            'delivery_price'=>'required|numeric'
        ];

        $this->validate($request,$rules);
        $city = City::find($id)->update($request->all());
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function suspendOrActivate(Request $request){

        $city = City::find($request->id);

        if($request->action == 'suspend'){
            $city->is_active = 0;
            $city->save();
            $title = "نجاح";
            $message = "تم حظر المدينة بنجاح";
            session()->flash('success','تمت حظر المدينة بنجاح');
        }else{
            $city->is_active = 1;
            $city->save();
            $title = 'نجاح';
            $message = 'تم تفعيل المدينة بنجاح';
            session()->flash('success','تمت تفعيل المدينة بنجاح');
        }

        return response()->json([
            'status'=>true,
            'title'=>$title,
            'message'=>$message
        ]);


    }

    public function getCities(Request $request){

        $cities = City::whereCountryId($request->id)->whereIsActive(1)->get();

        //  return $districts;
        return response()->json([
            'status' => true,
            'data' => $cities
        ]);

    }
}
