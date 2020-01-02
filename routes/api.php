<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user();});

// CITY 
Route::get("/citys" , 'Api\APICityController@index');
Route::get("/city/{id}" , 'Api\APICityController@show');
Route::post("/city" , 'Api\APICityController@create');
Route::put("/city" , 'Api\APICityController@store');
Route::delete("/city/{id}" , 'Api\APICityController@destroy');


// Delivery_time
Route::get("/delivery-times" , 'Api\APITimeSpanController@index');
Route::get("/delivery-times/{id}" , 'Api\APITimeSpanController@show');
Route::post("/delivery-times" , 'Api\APITimeSpanController@create');
Route::delete("/delivery-times/{id}" , 'Api\APITimeSpanController@destroy');

//Attached Span _ city 
Route::get("/city/{city_id}/delivery-times" , 'Api\APICityController@attachTimeSpan');

//Exclude Span , city 
Route::get("/city/{city_id}/exclude" , 'Api\APICityController@exclude');

//Get Time span available
Route::post("city/{city_id}/delivery-dates-times/{number_of_days_to_get}" , 'Api\APICityController@getTimeSpans');
