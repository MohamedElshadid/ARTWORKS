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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('palettes', 'PaletteAPIController');
Route::get('/view' ,'PaletteAPIController@Palettes');
Route::get('/viewMinPalettes' ,'PaletteAPIController@viewMinPalettes');
Route::get('review', 'PaletteAPIController@getReviews');
Route::post('addtocart', 'PaletteAPIController@addtocart');
Route::get('getpallatecart','PaletteAPIController@getpallatecart');
Route::post('removefromcart','PaletteAPIController@removefromcart');

Route::group(['middleware'=>['api']], function () {
    Route::post('add-order' ,'OrderController@store');

});
