<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/logins', 'App\Http\Controllers\AuthController@login');

Route::middleware('auth:sanctum')->group( function (){

	Route::post('/user','App\Http\Controllers\AuthController@profile');

Route::post('banner_api','App\Http\Controllers\Api\Banners@banner_api');
Route::post('banner_insert_api','App\Http\Controllers\Api\Banners@banner_insert_api');
Route::post('fetch_banner_api/{id}','App\Http\Controllers\Api\Banners@fetch_banner_api');
Route::post('updated_banner_api/{id}','App\Http\Controllers\Api\Banners@banner_update_api');



Route::post('cms_api','App\Http\Controllers\Api\Cms@cms_api');
Route::post('cms_insert_api','App\Http\Controllers\Api\Cms@store');
Route::post('fetch_cms_api/{id}','App\Http\Controllers\Api\Cms@fetch_cms_api');
Route::post('update_cms_api/{id}','App\Http\Controllers\Api\Cms@update_cms_api');



Route::post('courses_api','App\Http\Controllers\Api\Coursess@courses_api');
Route::post('courses_insert_api','App\Http\Controllers\Api\Coursess@Courses_insert_api');
Route::post('fetchs_coursess_api/{id}','App\Http\Controllers\Api\Coursess@fetch_coursess_api');
Route::post('courses_update_api/{id}','App\Http\Controllers\Api\Coursess@courses_update_api');



Route::post('event_api','App\Http\Controllers\Api\Event@enent_api');
Route::post('event_insert_list','App\Http\Controllers\Api\Event@event_insert_list');
Route::post('fetchs_event_api/{id}','App\Http\Controllers\Api\Event@fetch_event_api');
Route::post('update_event_api/{id}','App\Http\Controllers\Api\Event@update_event_api');



Route::post('trainer_api','App\Http\Controllers\Api\Trainer@trainer_api');
Route::post('trainer_insert_api','App\Http\Controllers\Api\Trainer@trainer_insert_api');

Route::post('fatch_trainer_api/{id}','App\Http\Controllers\Api\Trainer@fetch_api');
Route::post('trainer_update/{id}','App\Http\Controllers\Api\Trainer@api_trainer_update');

Route::delete('delete/{id}','App\Http\Controllers\Api\Trainer@delete_api');



Route::post('category_api','App\Http\Controllers\Api\Categorys@category');


Route::post('subcategory_api','App\Http\Controllers\Api\SubCategorys@subCategory');
Route::post('subcategory_api_add/{category_id}','App\Http\Controllers\Api\SubCategorys@store');

Route::post('/logouts', 'App\Http\Controllers\AuthController@logoutsss');



});



Route::middleware('auth:api')->group(function () {
	Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
	// Your other protected API routes go here...
});










