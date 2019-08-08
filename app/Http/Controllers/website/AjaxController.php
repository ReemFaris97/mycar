<?php

namespace App\Http\Controllers\website;

use App\CompanyModel;
use App\Device;
use App\ModelYears;
use App\Part;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function updateUserToken(Request $request){
        $user = \App\User::whereId($request->id)->first();

        if ($request->token) {
            $data = \App\Device::where('device', $request->token)->first();
            if ($data) {
                $data->user_id = $user->id;
                $data->save();
            } else {
                $data = new Device();
                $data->device = $request->token;
                $data->user_id = $user->id;
                $data->type = 'web';
                $data->save();
            }
        }
    }

    public function getCompanyModelsById(Request $request){
        $Models = CompanyModel::where('company_id',$request->id)->get();
        return response()->json([
            'status'=>true,
            'data' => view('website.order.locationCodesSelect2')->with('Models',$Models)->render()
        ]);
    }

    public function getModelYears(Request $request){
        $years = ModelYears::where('company_model_id',$request->id)->get();

        return response()->json([
            'status'=>true,
            'data' => view('website.order.ModelYears')->with('years',$years)->render()
        ]);
    }

    public function getSubCategories(Request $request){

        $subCategories = SubCategory::where('category_id',$request->id)->get();
        return response()->json([
            'status'=>true,
            'data'=>view('website.order.subCategories')->with('subCategories',$subCategories)->render()
        ]);
    }

    public function getMainParts(Request $request){

        $mainParts = Part::whereParentId(null)->where('sub_category_id',$request->id)->get();
        return response()->json([
            'status'=>true,
            'data'=>view('website.order.mainParts')->with('mainParts',$mainParts)->render()
        ]);
    }

    public function getPartDetails(Request $request){
        $part = Part::whereId($request->id)->with('children')->first();

        return response()->json([
            'status'=>true,
            'data'=>$part
        ]);

    }
}
