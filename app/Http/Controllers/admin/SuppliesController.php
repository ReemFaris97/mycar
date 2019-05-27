<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supply;
use App\Supply_details;
use Validator;
class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'coordinator' || auth()->user()->role == 'dept_admin'){
            return abort(401);
        }
        $supplies = Supply::all()->reverse();
        return view('admin.supplies.index',compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'coordinator' || auth()->user()->role == 'dept_admin'){
            return abort(401);
        }
        $products = Product::all();
        return view('admin.supplies.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'bill_number'=>$request->bill_number,
            'bill_date' =>$request->bill_date,
            'products'   =>$request->products,
        ];

        $rules = [
            'bill_number'=>'required|string|',
            'bill_date'=>"required|date",
            'products'=>"required|array|min:1",
        ];

        $messages = [
            'bill_number.required'=>"رقم الفاتورة مطلوب",
            'bill_date.required'=>"تاريخ الفاتورة مطلوب",
            'bill_date.date'=>"أدخل صيغة تاريخ صحيحة",
            'products.required'=>"برجاء إختيار منتجات",
            'products.min'=>"برجاء إختيار منتجات للفاتورة",
        ];

        $valResult = Validator::make($data,$rules,$messages);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if($valResult->passes()){
            $products = $request->products;
            $qtys = $request->qtys;

            $supply = Supply::create($data);

            for($i = 0; $i< count($products); $i++ ){
                $product = Product::find($products[$i]);
                $price = $product->price;
                $qty = $product->qty;
                $supply_details = new Supply_details();
                $supply_details->supply_id = $supply->id;
                $supply_details->product_id = $products[$i];
                $supply_details->qty = $qtys[$i];
                $supply_details->price = $price;
                $supply_details->total = $qtys[$i] * $price;
                $supply_details->save();
                $product->update(['qty'=>(int)$qtys[$i] +(int) $product->qty ]);

            }


            session()->flash('success','تم إضافة الفاتورة بنجاح');
            return redirect()->back();
        }
        else{
            $errors = $valResult->messages();
            return redirect()->back()->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->role == 'coordinator' || auth()->user()->role == 'dept_admin'){
            return abort(401);
        }

        $supply = Supply::find($id);
        return view('admin.supplies.details',compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $supply = Supply::find($id);
        if($supply){
            $supply->delete();
            return response()->json([
                'status'=>true,
                'title'=>'نجاح',
                'message'=>'تم حذف الفاتورة بنجاح'
            ]);
        }
        else{
            return response()->json([
                'status'=>true,
                'title'=>'خطاً',
                'message'=>'الفاتورة غير موجودة'
            ]);
        }
    }
}
