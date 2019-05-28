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
