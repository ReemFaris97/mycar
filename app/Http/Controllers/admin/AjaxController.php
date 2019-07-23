<?php

namespace App\Http\Controllers\admin;

use App\CompanyModel;
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
}
