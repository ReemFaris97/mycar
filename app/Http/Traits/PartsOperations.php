<?php


namespace App\Http\Traits;


use App\Part;

trait PartsOperations
{

    public function AddPart($request){
        $part['ar_name'] = $request->part_ar_name;
        $part['en_name'] = $request->part_en_name;
        $part['image'] = uploader($request,'image');
        if($request->has('code') && $request->code !=null) {
            $part['code'] = $request->code;
        }
        $part['company_model_id'] = $request->company_model_id;
        $part['sub_category_id'] = $request->sub_category_id;
        $part = Part::create($part);
        return $part;
    }

    public function AddPartImages($request,$part){
        $ar_names=  $request->ar_name;
        $en_names=  $request->en_name;
        $codes = $request->codes;
        $numbers = $request->numbers;
        $images = $request->images;
        foreach ($images as $image)
        for ($i=0;$i < count($ar_names);$i++){
            $part->part_images()->create([
                'ar_name'=>$ar_names[$i],
                'en_name'=>$en_names[$i],
                'code'=>$codes[$i],
                'image'=>arrayUploader($request,'images',$i),
                'number'=>$numbers[$i],
            ]);
        }

    }
}
