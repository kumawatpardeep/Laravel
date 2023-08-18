<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});






Route::group(['middleware' => 'admin'], function () {
    // Define your admin routes here
   // admin/index/route





});
//admin/login,register,logout
Route::get('admin/login',('App\Http\Controllers\Admin\LoginController@logins'))->name('admin/login');
Route::post('admin/login',('App\Http\Controllers\Admin\LoginController@customLogin'));

Route::get('admin/logOut',('App\Http\Controllers\Admin\LoginController@SignOut'))->name('admin/logOut');

Route::get('admin/register',('App\Http\Controllers\Admin\RegisterController@registers'))->name('admin/register');
Route::post('admin/register',('App\Http\Controllers\Admin\RegisterController@register'));


//cateogray route
Route::get('/cotegory',('App\Http\Controllers\Admin\Categorys@cotegory'))->name('cotegory');
Route::post('/cotegory',('App\Http\Controllers\Admin\Categorys@cotegorys'));

Route::get('/list',('App\Http\Controllers\Admin\Categorys@list'))->name('catorgay/list');
Route::get('update-status/{id}',('App\Http\Controllers\Admin\Categorys@Category_status'))->name('update-status');

Route::get('catorgay/edit/{id}',('App\Http\Controllers\Admin\Categorys@catorgay_edit'))->name('catorgay/edit');
Route::post('catorgay/edit/{id}',('App\Http\Controllers\Admin\Categorys@catorgay_update'));

Route::get('relation/view/{id}',('App\Http\Controllers\Admin\Categorys@categoryView'))->name('relation/view');


Route::get('catorgay/delete/{id}',('App\Http\Controllers\Admin\Categorys@catorgay_delete'))->name('catorgay/delete');

Route::get('/subcatgroy',('App\Http\Controllers\Admin\SubCategorys@getAllData'))->name('subcatgroy');
Route::post('/subcatgroy',('App\Http\Controllers\Admin\SubCategorys@store'));

Route::get('status-update-cat/{id}',('App\Http\Controllers\Admin\SubCategorys@Category_status'))->name('status-update-cat');

Route::get('subCategory/list',('App\Http\Controllers\Admin\SubCategorys@subCategoryDataGet'))->name('subCategory/list');


Route::get('subcatorgay/editss/{id}',('App\Http\Controllers\Admin\SubCategorys@subCategory_edit'))->name('subcatorgay/editss');
Route::post('subcatorgay/editss/{id}',('App\Http\Controllers\Admin\SubCategorys@subCategory_update'));

Route::get('subcatorgay/deletes/{id}',('App\Http\Controllers\Admin\SubCategorys@delete'))->name('subcatorgay/deletes');



route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

    Route::get('admin/index',('App\Http\controllers\Admin\Index@index'))->name('admin/index');

    //admin/courses/route/add
    Route::get('admin/coursess/add',('App\Http\controllers\Admin\Coursess@add'))->name('admin/coursess/add');
    Route::post('admin/coursess/add',('App\Http\controllers\Admin\Coursess@coursesinsert'))->name('admin/coursess/add');
    
    //admin/courses/list
    Route::get('admin/coursess/list',('App\Http\controllers\Admin\Coursess@list'))->name('admin/coursess/list');
    
    //admin/courses/edit
    Route::get('admin/courdess/edit/{id}',('App\Http\controllers\Admin\Coursess@edit'))->name('admin/courdess/edit');
    Route::post('admin/courdess/edit/{id}',('App\Http\controllers\Admin\Coursess@update'))->name('admin/courdess/edit');
    
    //admin/courses/delete
    Route::get('admin/courdess/delete/{id}',('App\Http\controllers\Admin\Coursess@delete'))->name('admin/courdess/delete');
    Route::get('admin/courdess/customerTarsh',('App\Http\controllers\Admin\Coursess@trash'))->name('admin/courdess/customerTarsh');
    Route::get('admin/courdess/customerTarsh/restore/{id}',('App\Http\controllers\Admin\Coursess@restore'))->name('admin/courdess/customerTarsh/restore');
    Route::get('admin/courdess/forceDelete/{id}',('App\Http\controllers\Admin\Coursess@forceDelete'))->name('admin/courdess/forceDelete');
    
    //admin/trainer/add
    Route::get('admin/trainer/add',('App\Http\controllers\Admin\Trainer@add'))->name('admin/trainer/add');
    Route::post('admin/trainer/add',('App\Http\controllers\Admin\Trainer@trainerInsert'))->name('admin/trainer/add');
    
    //admin/trainer/list
    Route::get('admin/trainer/list',('App\Http\controllers\Admin\Trainer@list'))->name('admin/trainer/list');
    
    //admin/trainer/edit
    Route::get('admin/trainer/edit/{id}',('App\Http\controllers\Admin\Trainer@edit'))->name('admin/trainer/edit');
    Route::post('admin/trainer/edit/{id}',('App\Http\controllers\Admin\Trainer@update'))->name('admin/trainer/edit');
    
    //admin/trainer/delete
    Route::get('admin/trainer/delete/{id}',('App\Http\controllers\Admin\Trainer@delete'))->name('admin/trainer/delete');
    Route::get('admin/trainer/trash',('App\Http\controllers\Admin\Trainer@trash'))->name('admin/trainer/trash');
    
    Route::get('admin/trainer/restore/{id}',('App\Http\controllers\Admin\Trainer@restore'))->name('admin/trainer/restore');
    Route::get('admin/trainer/forceDelete/{id}',('App\Http\controllers\Admin\Trainer@forceDelete'))->name('admin/trainer/forceDelete');
    
    //admin/event/add
    Route::get('admin/event/add',('App\Http\controllers\Admin\Event@add'))->name('admin/event/add');
    Route::post('admin/event/add',('App\Http\controllers\Admin\Event@addEvent'))->name('admin/event/add');
    
    //admin/event/list
    Route::get('admin/event/list',('App\Http\controllers\Admin\Event@list'))->name('admin/event/list');
    
    //admin/event/edit
    Route::get('admin/event/edit/{id}',('App\Http\controllers\Admin\Event@edit'))->name('admin/event/edit');
    Route::post('admin/event/edit/{id}',('App\Http\controllers\Admin\Event@update'))->name('admin/event/edit');
    
    //admin/event/delete
    Route::get('admin/event/delete/{id}',('App\Http\controllers\Admin\Event@delete'))->name('admin/event/delete');
    Route::get('admin/event/trash',('App\Http\controllers\Admin\Event@trash'))->name('admin/event/trash');
    Route::get('admin/event/restore/{id}',('App\Http\controllers\Admin\Event@restore'))->name('admin/event/restore');
    Route::get('admin/event/forceDelete/{id}',('App\Http\controllers\Admin\Event@forceDelete'))->name('admin/event/forceDelete');
    
    //admin/users/add
    Route::get('admin/users/add',('App\http\controllers\Admin\User@add'))->name('admin/users/add');
    Route::post('admin/users/add',('App\http\controllers\Admin\User@addvali'))->name('admin/users/add');
    
    //admin/users/list
    Route::get('admin/users/list',('App\http\controllers\Admin\User@list'))->name('admin/users/list');
    
    //admin/users/edit
    Route::get('admin/users/edit/{id}',('App\Http\Controllers\Admin\User@edit'))->name('admin/users/edit');
    Route::post('admin/users/edit/{id}',('App\Http\Controllers\Admin\User@update'))->name('admin/users/edit');
    
    //admin/users/delete
    Route::get('admin/users/delete/{id}',('App\Http\Controllers\Admin\User@delete'))->name('admin/users/delete');
    
    //admin/baneer/add
    Route::get('admin/banner/add',('App\Http\Controllers\Admin\Banners@add'))->name('admin/banner/add');
    Route::post('admin/banner/add',('App\Http\Controllers\Admin\Banners@addvali'))->name('admin/banner/add');
    
    //admin/banner/list
    Route::get('admin/banner/list',('App\Http\Controllers\Admin\Banners@lists'))->name('admin/banner/list');
    
    //admin/banner/edit
    Route::get('admin/banner/edit/{id}',('App\Http\Controllers\Admin\Banners@edit'))->name('admin/banner/edit');
    Route::post('admin/banner/edit/{id}',('App\Http\Controllers\Admin\Banners@update'))->name('admin/banner/edit');
    
    //admin/banner/delete
    Route::get('admin/banner/delete/{id}',('App\Http\Controllers\Admin\Banners@delete'))->name('admin/banner/delete');
    
    //admin/cms/add
    Route::get('admin/cms/add',('App\Http\Controllers\Admin\Cms@add'))->name('admin/cms/add');
    Route::post('admin/cms/add',('App\Http\Controllers\Admin\Cms@insertadd'))->name('admin/cms/add');
    
    //admin/cms/list
    Route::get('admin/cms/list',('App\Http\Controllers\admin\Cms@list'))->name('admin/cms/list');
    
    Route::get('status-update/{id}',('App\Http\Controllers\Admin\Cms@status'))->name('status-update');

    Route::get('cms/delete/{id}',('App\Http\Controllers\admin\Cms@delete'))->name('cms/delete');

    
    
    //frontend/home/ route
    Route::get('/',('App\Http\controllers\Frontend\Index@index'))->name('/');
    
    //frontend/courses/ route
    Route::get('frontend/courses',('App\Http\controllers\Frontend\Course@courses'))->name('frontend/courses');
    
    //frontend/trainer/ route
    Route::get('frontend/trainer',('App\Http\controllers\Frontend\Trainer@trainer'))->name('frontend/trainer');
    
    //frontend/event/ route
    Route::get('frontend/event',('App\Http\controllers\Frontend\Event@event'))->name('frontend/event');
    
    //frontend/about/route
    Route::get('frontend/about',('App\Http\controllers\Frontend\About@about'))->name('frontend/about');
    
    //frontend/pricing/route
    Route::get('frontend/pricing',('App\Http\controllers\Frontend\Pricing@pricing'))->name('frontend/pricing');
    
    //frontend/contact/route
    Route::get('frontend/contact',('App\Http\controllers\Frontend\Contact@contact'))->name('frontend/contact');
    Route::post('frontend/contact',('App\Http\controllers\Frontend\Contact@contactInsert'))->name('frontend/contact');

    //dropdown route

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


