<?php



/**
 * Setting Name
 * @param $name
 * @return mixed
 */
function getsetting($name)
{
    $setting=\App\Setting::where('name',$name)->first();
    return $setting->value();

}

function popup($name, $validator = null,$custom = null)
{
    $ms = 1000;
    if ($validator != null) {

        return alert()->error($validator->errors()->first())->autoclose($ms);

    }

    if ($name == 'add') {
        return alert()->success('تم الاضافه بنجاح')->autoclose($ms);
    } elseif ($name == 'update') {
        return alert()->success('تم التعديل بنجاح')->autoclose($ms);
    }elseif ($name == 'delete'){
        return alert()->success('تم الحذف بنجاح')->autoclose($ms);
    }elseif ($name == 'custom'){
        return alert()->success($custom)->autoclose($ms);
    }

}

/**
 * Upload Path
 * @return string
 */
function uploadpath()
{
    return 'photos';
}

/**
 * Get Image
 * @param $filename
 * @return string
 */
function getimg($filename)
{
    $base_url = url('/');
    return $base_url.'/storage/'.$filename;
}

/**
 * Upload an image
 * @param $img
 */
function uploader($request,$img_name)
{
    $path = \Storage::disk('public')->putFile(uploadpath(), $request->file($img_name));
    return $path;
}

function uploader_base_64($image)
{
    $name = time().'_'.auth()->id().'_form_image.jpg';
    $img1 = str_replace('data:image/jpeg;base64,','',$image);
    $img2 = str_replace(' ','+',$img1);
    $data = base64_decode($img2);
    \Storage::disk('photos')->put($name,$data);
    return $name;
}


function arrayUploader($request,$img_name,$i)
{
    $path = \Storage::disk('public')->putFile(uploadpath(), $request->file($img_name)[$i]);
    return $path;
}

function statuss($status = null)
{
    $collect = [
        'new'=>'جديد',
        'prepared'=>'قيد التجهيز',
        'delivered'=>'تم التوصيل',
        'canceled'=>'تم الالغاء'
    ];
    if($status == null)
        return $collect;

    return $collect[$status];
}


function multiUploader($request,$img_name,$model,$onId=null){
    foreach ($request[$img_name] as $image){
        $filename = rand(99999, 99999999) . $image->getClientOriginalName();
        $path = \Storage::disk('public')->putFile(uploadpath(), $image);
        $model->create(['image'=>$path]+$onId);
    }
    return true;
}

function deleteImg($img_name)
{
     \Storage::disk('public')->delete(uploadpath(),$img_name);
    return True;
}




function status()
{
    $array = [
        '1'=>'مفعل',
        '0'=>'غير مفعل',
    ];
    return $array;
}




function roles()
{
    $array = [
        'client'=>'عميل',
        'owner'=>'صاحب منشأة',
    ];
    return $array;
}


function cities()
{
    $cities = App\City::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $cities;
}


function trades()
{
    $cities = App\Trade::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $cities;
}


function products()
{
    $cities = App\Product::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $cities;
}

function sub_categories()
{
    $cities = App\SubCategory::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $cities;
}



function user_firms()
{
    $user_firms = App\Firm::whereUserId(user()->id)->get()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $user_firms;
}



function countries()
{
    $countries = App\Country::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $countries;
}

function regions()
{
    $countries = App\Region::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $countries;
}

function users()
{
    $countries = App\User::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['name']];
    });
    return $countries;
}
function permissions()
{
    $countries = App\Permission::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['title']];
    });
    return $countries;
}


function categories()
{
    $countries = App\Category::all()->mapWithKeys(function ($item) {
        return [$item['id'] => $item['ar_name']];
    });
    return $countries;
}




function GenerateCode() {
    $code = str_random(6); // better than rand()
    // call the same function if the barcode exists already
    if (UniqueCode($code)) {
        return GenerateCode();
    }
    // otherwise, it's valid and can be used
    return $code;
}

function UniqueCode($code)
{
    return \App\Coupon::where('code',$code)->first();
}

function fcm_server_key(){
return 'AAAAcpst4io:APA91bH_dDGXtXWw-Yfe1O7gu8bpQVSSqjawh5ai_5K2qco_KDHip2H6yqtTxbW3p4Iqnwd9QxLZvpWHyFBFxaVlzgKVmCTcytus-dv6RoJrGkG98XpqvvCQ9AtyzDli-1T83Iam0aVX';
}

function user(){
    return auth()->user();
}

function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
    // Calculate the distance in degrees
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

    // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
    switch($unit) {
        case 'km':
            $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
            break;
        case 'mi':
            $distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
            break;
        case 'nmi':
            $distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
    }
    return round($distance, $decimals);
}


function check_null($var)
{
    if(isset($var))
    {
        if(!is_null($var))return $var;
        if(is_int($var)) return 0 ;
        return "";
    }
    return "";

}


 function except_values($collection,$arr)
{
    $collection = $collection->map(function ($item) use($arr) {
        return collect($item)->except($arr)->toArray();
    });
    return $collection;
}

function slug($name)
{
    return $name.'-'.str_random(30);
}
