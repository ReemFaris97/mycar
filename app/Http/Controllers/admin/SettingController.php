<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingController extends Controller
{

    /**
     * Display a listing of the Settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $settings = Setting::where('slug',$slug)->get();
        if (!$settings)
            return redirect('/dashboard');
        $settings_page = $settings->pluck('page')->first();
        return view('admin.setting')
            ->with('settings_page', $settings_page)
            ->with('settings', $settings);
    }

    /**
     * Settings Store
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Store(Request $request)
    {
        $this->RegisterSetting($request);
        Session::flash('success','تم حفظ الاعدادت بنجاح');
        return redirect()->back();
    }

    /**
     * Update Existing Setting
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function RegisterSetting(Request $request){
        $data = $request->all();
        foreach ($data as $key => $value) {
            if($key == '_token' || !$value) continue;
            {
                Setting::where(['name'  => $key])->update(['ar_value' => $value[0],'en_value'=>(isset($value[1]))?$value[1]:$value[0]]);
            }
        }
    }
}
