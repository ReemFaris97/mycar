<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


/* Login Routes ..*/
Route::group(['prefix'=>"dashboard",'namespace'=>'admin'], function () {
    route::get('/', 'LoginController@getAdminLogin')->name('admin.login');
    Route::post('/', 'LoginController@login')->name('admin.postLogin');


//    // Password Reset Routes...
//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('administrator.password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('administrator.password.email');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('administrator.password.reset.token');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('administrator.password.reset');

});

//Route::get('roles/createSuperAdmin', function () {
//
//    // get the user you want to give him role . NOTE: (Role is a group of abilities)
//    $user = auth()->user();
//    //    $user->retract('admin');
//
//    // assign the * ability to this user ........
//    $user->assign('*');
//
//    // allow this ability to has the permission of everything...
//    Bouncer::allow('*')->everything();
////        $user->allow('users_manage');
//
//    return "ok";
//});
Route::group(['prefix'=>"dashboard",'namespace'=>'admin','middleware'=>'admin'], function (){

    route::get('/home','HomeController@index')->name('homePage');

//    route::resource('admins','AdminsController');
//    route::post('admins/suspendOrActive','AdminsController@suspendOrActivate')->name('admins.suspendOrActivate');
//    route::post('admins/suspendWithReason','UsersController@suspendWithReason')->name('admins.suspendWithReason');


    route::resource('cities','CitiesController');
    route::post('cities/suspendOrActivate','CitiesController@suspendOrActivate')->name('cities.suspendOrActivate');

    route::resource('companies','CompaniesController');
    route::post('companies/suspendOrActivate','CompaniesController@suspendOrActivate')->name('companies.suspendOrActivate');

    route::resource('models','ModelsController');
    route::post('models/suspendOrActivate','ModelsController@suspendOrActivate')->name('models.suspendOrActivate');

    route::resource('roles','RolesController');
    route::post('role/delete','RolesController@delete')->name('role.delete');

    route::resource('admins','AdminsController');
    route::post('admins/suspendOrActive','AdminsController@suspendOrActivate')->name('admins.suspendOrActivate');
    route::post('admins/suspendWithReason','AdminsController@suspendWithReason')->name('admins.suspendWithReason');

    route::resource('parts','PartsController');
    Route::post('get-company_models','PartsController@getCompanyModels')->name('getAjaxCompanyModels');

    route::resource('users','UsersController');
    route::post('users/suspendOrActivate','UsersController@suspendOrActivate')->name('users.suspendOrActivate'); // used here only for activate..
    route::post('users/suspendWithReason','UsersController@suspendWithReason')->name('users.suspendWithReason');
    Route::post('get/cities','UsersController@getCities')->name('getAjaxCities');

    route::resource('suppliers','SuppliersController');
    route::post('suppliers/suspendOrActivate','SuppliersController@suspendOrActivate')->name('suppliers.suspendOrActivate'); // used here only for activate..
    route::post('suppliers/suspendWithReason','SuppliersController@suspendWithReason')->name('suppliers.suspendWithReason');
    Route::post('get/cities','SuppliersController@getCities')->name('getAjaxCities');

    route::resource('instructions','InstructionsController');

    Route::group(['prefix'=>'settings','as'=>'setting.'],function (){
        Route::get('/{slug}','SettingController@index')->name('index');
        Route::post('/','SettingController@Store')->name('store');
    });














//    route::get('notifications','NotificationsController@index')->name('notifications.index');
//    route::post('notification/delete','NotificationsController@delete')->name('notification.delete');


//    Route::post('user/update/token', function (Request $request) {
//
//        $user = \App\User::whereId($request->id)->first();
//
//        if ($request->token) {
//            $data = \App\Device::where('device', $request->token)->first();
//            if ($data) {
//                $data->user_id = $user->id;
//                $data->save();
//            } else {
//
//                $data = new \App\Device;
//                $data->device = $request->token;
//                $data->user_id = $user->id;
//                $data->type = 'web';
//                $data->save();
//            }
//        }
//
//    })->name('user.update.token');


    route::post('/logout','LoginController@logout')->name('admin.logout');

});



Route::get('/home', 'HomeController@index')->name('home');
