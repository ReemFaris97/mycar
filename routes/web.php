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

    Route::resource('categories','CategoriesController');
    Route::resource('subcategories','SubCategoriesController');


    route::resource('parts','PartsController');
    Route::post('get-company_models','PartsController@getCompanyModels')->name('getAjaxCompanyModels');

    Route::resource('part-image','PartsImagesController');

    route::resource('users','UsersController');
    route::post('users/suspendOrActivate','UsersController@suspendOrActivate')->name('users.suspendOrActivate'); // used here only for activate..
    route::post('users/suspendWithReason','UsersController@suspendWithReason')->name('users.suspendWithReason');
    Route::post('get/cities','UsersController@getCities')->name('getAjaxCities');

    route::resource('suppliers','SuppliersController');
    route::post('suppliers/suspendOrActivate','SuppliersController@suspendOrActivate')->name('suppliers.suspendOrActivate'); // used here only for activate..
    route::post('suppliers/suspendWithReason','SuppliersController@suspendWithReason')->name('suppliers.suspendWithReason');

    route::post('suppliers/join/accept','SuppliersController@acceptJoinRequest')->name('suppliers.acceptJoinRequest');

    route::get('supplier/{id}/wallet','SuppliersController@getWalletPage')->name('suppliers.wallet');
    route::post('supplier/{id}/wallet','SuppliersController@postSupplierMoney')->name('post.supplier.wallet');


    route::resource('orders','OrdersController');

    Route::resource('return-items','ReturnsController');

//    Reports ............
    route::get('reports/supplier/sales','ReportsController@SupplierSales')->name('report.supplier.sales');
    route::get('reports/supplier/refused','ReportsController@SupplierRefused')->name('report.supplier.refused');
    route::get('reports/customer/orders','ReportsController@CustomerOrders')->name('report.customer.orders');

    route::resource('instructions','InstructionsController');

    route::resource('contacts','ContactsController');
    route::resource('proposals','ProposalsController');


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

//    Ajax Routes ..........
    Route::post('get/subcategories','AjaxController@getSubCategoriesById')->name('ajax.get.subcategories');
    Route::post('get/companymodels','AjaxController@getCompanyModelsById')->name('ajax.get.companymodels');
    Route::post('return-items/change/status','AjaxController@changeReturnRequestStatus')->name('ajax.change.returnStatus');



    route::post('/logout','LoginController@logout')->name('admin.logout');
});


// **************************************************************************************************
//***************************************************************************************************
Route::group(['prefix'=>"suppliers",'namespace'=>'supplier'], function (){
    Route::get('set-locale/{locale}', function ($lang) {
        if (array_key_exists($lang, \Config::get('language'))) {
            \Session::put('locale', $lang);
        }
        return back();
    })->name('lang');

    route::get('/', 'LoginController@getSupplierLogin')->name('supplier.login');
    route::post('/postPhone','LoginController@postPhoneNumber')->name('supplier.postPhone');
    Route::post('/supplierLogin', 'LoginController@login')->name('supplier.postLogin');


});


Route::group(['prefix'=>"suppliers",'namespace'=>'supplier','middleware'=>"supplier"], function (){

    route::get('home','HomeController@index')->name('supplier.home');

    route::get('orders/new','OrdersController@newOrders')->name('supplier.orders.new');
    route::get('orders/waiting','OrdersController@waitingOrders')->name('supplier.orders.waiting');
    route::get('orders/received','OrdersController@received')->name('supplier.orders.received');
    route::get('orders/finished','OrdersController@finished')->name('supplier.orders.finished');

    route::get('orders/show/{id}','OrdersController@show')->name('supplier.orders.show');

//    pricing ---
    Route::post('order/pricing/{id}','OrdersController@pricing')->name('supplier.order.pricing');
    Route::get('order/test/something/{id}','OrdersController@test');

    route::get('financial-dues','financialController@index')->name('supplier.financial.dues');




//
//
//
//    route::get('/fn',function (){
//        return $reply = \App\Reply::find(7)->total();
//    });
    route::post('/logout','LoginController@logout')->name('supplier.logout');
});


//Route::get('/home', 'HomeController@index')->name('home');


// **************************************************************************************************
//***************************************************************************************************

Route::group(['namespace'=>'website'], function (){

    Route::get('/','HomeController@landingPage')->name('web.landing');

    Route::get('/supplier/register','SupplierController@getRegisterPage')->name('web.get.register.supplier');
    Route::post('/supplier/register','SupplierController@RegisterSupplier')->name('web.post.register.supplier');

    Route::get('/home','HomeController@home')->name('web.home');
    Route::post('submit/suggest/comment','HomeController@PostSuggestComment')->name('web.suggest.comment');

    Route::get('/about','HomeController@about')->name('web.about');
    Route::get('/terms','HomeController@terms')->name('web.terms');
    Route::get('/contact','HomeController@contact')->name('web.contact');
    Route::post('/contact','HomeController@postContact')->name('web.contact.post');




});
