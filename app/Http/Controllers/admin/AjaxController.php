<?php

namespace App\Http\Controllers\admin;

use App\CompanyModel;
use App\ReturnItem;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function getSubCategoriesById(Request $request){

        $subCategories = SubCategory::where('category_id',$request->id)->get();
        return response()->json([
            'status' => true,
            'data' => view('admin.parts.getAjaxSubCategories')->with('subCategories',$subCategories)->render()
        ]);

    }

    public function getCompanyModelsById(Request $request){

        $Models = CompanyModel::where('company_id',$request->id)->get();
        return response()->json([
            'status' => true,
            'data' => view('admin.parts.getAjaxCarModel')->with('Models',$Models)->render()
        ]);

    }

    public function changeReturnRequestStatus(Request $request){
        $returnItem = ReturnItem::find($request->id);
        if($returnItem){
            if($request->action == 'accept'){
                $returnItem->status ='accepted';
                $returnItem->save();
                return response()->json([
                    'status'=>true,
                    'title'=>"نجاح",
                    'message'=>"تم قبول طلب الإسترجاع بنجاح"
                ]);
            }else{
                $returnItem->status ='refused';
                $returnItem->save();
                return response()->json([
                    'status'=>true,
                    'title'=>"نجاح",
                    'message'=>"تم رفض طلب الإسترجاع بنجاح"
                ]);
            }
        }else{
            return response()->json([
                'status'=>false,
                'title'=>"خطأ",
                'message'=>"طلب الإسترجاع ربما تم تغيير حالته من قبل او غير موجود"
            ]);
        }
    }
}
