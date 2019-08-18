<?php

namespace App\Http\Controllers\website;

use App\Category;
use App\Company;
use App\Order;
use App\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function getWizard(){
        $oldOrders = Order::whereUserId(auth()->id())->get();
        $parts = Part::all();
        $companies = Company::all();
        $categories = Category::all();

        return view('website.order.wizard',compact('companies','oldOrders','parts','categories'));
    }

    public function initiateOrder(Request $request){

        $rules = [
            "order_car_type"=>"required|boolean",
            "parts_type"=>"required|in:original,used,commercial",
            "supplier_id"=>"required|exists:users,id",
            "part_ids"=>"required|array",
            "qtys"=>"required|array",
        ];

        $messages = [
            "parts_type.required"=>"نوع القطع مطلوب ( تجارية - اصلية - تشليح ) ",
            "supplier_id.required"=>"برجاء إختيار موزع لإرسال الطلب",
            "part_ids.required"=>"برجاء إختيار قطع",
            "qtys.required"=>"برجاء إختيار الكمية"
        ];

        if($request->order_car_type == 1){
            $rules['company_id'] = "required|exists:companies,id" ;
            $rules['company_model_id'] = "required|exists:company_models,id" ;
            $rules['year'] = "required|numeric" ;
            $messages['company_id.required'] = "برجاء إختيار الشركة المصنعة";
            $messages['company_model_id.required'] = "برجاء إختيار موديل السيارة";
            $messages['year.required'] = "برجاء إختيار سنة التصنيع";
        }else{
            $rules['structure_number'] = "required_without:form_image" ;
            $rules['form_image'] = "required_without:structure_number" ;

            $messages['structure_number.required_without'] = "يجب وضع رقم الهيكل للسيارة او رفع صورة النموذج المطلوب او كلاهما";
            $messages['form_image.required_without'] = "يجب وضع رقم الهيكل للسيارة او رفع صورة النموذج المطلوب او كلاهما";
        }

            $this->validate($request,$rules,$messages);








//        $valResult = Validator::make($request->all(),$rules);

//        if($valResult->passes()){
//            return "ok";
//            if($request->order_car_type == 1){
////                create order by model
//            }else{
//
//            }
//
//        }else{
//            return  $errors = $valResult->messages();
//            return redirect()->back()->withInput()
//                ->withErrors($errors);
//
//        }



    }
}
