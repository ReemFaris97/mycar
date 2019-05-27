<?php

namespace App\Http\Controllers\admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'super' || auth()->user()->role == 'technical'){
            $products = Product::all();
            return view('admin.products.index',compact('products'));
        }
        else{
            return abort(401);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'super' || auth()->user()->role == 'technical'){
            return view('admin.products.create');
        }
        else{
            return abort(401);
        }


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
            'qty'=>"required|numeric|min:1",
            'price'=>"nullable|numeric|min:1",

        ]);

        Product::create($request->all());
        session()->flash('success','تم إضافة المنتج بنجاح');
        return redirect()->route('products.index');
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
        if(auth()->user()->role == 'super' || auth()->user()->role == 'technical'){
            $product = Product::find($id);
            return view('admin.products.edit',compact('product'));
        }else{
            return abort(401);
        }


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
            'qty'=>"required|numeric|min:1",
            'price'=>"nullable|numeric|min:1",
        ]);

        Product::find($id)->update(['name'=>$request->name,'qty'=>$request->qty,'price'=>$request->price,'notes'=>$request->notes]);
        session()->flash('success','تم تعديل المنتج بنجاح');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Product::find($request->id)->delete();

        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>"تم حذف المنتج بنجاح"
        ]);
    }

    public function inventory(){
        if(auth()->user()->role != 'super'){
            return abort(401);
        }
        $products = Product::all();
        return view('admin.products.inventory',compact('products'));
    }

    public function editQuantity(Request $request){

       $product = Product::find($request->id);
       $product->qty = $request->qty;
       $product->save();

        return response()->json([
            'status'=>true,
            'title'=>'نجاح',
            'message'=>"تم تعديل كمية المنتج بنجاح"
        ]);

    }
}
