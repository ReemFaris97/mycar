<?php

namespace App\Http\Traits;

use App\Setting;
use App\Settingimage;
use Illuminate\Http\Request;
use Alert;
use DB;
trait SettingOperation
{


    /**
     * Update Existing Setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function RegisterSetting(Request $request)
    {
        Setting::where('name','about')->first()->update([
            'en_value'=>$request->en_value,
            'ar_value'=>$request->ar_value
        ]);
    }

}