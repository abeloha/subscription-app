<?php

use App\Http\Controllers\v1\SubscribersContoller;
use App\Http\Controllers\v1\WebsiteContoller;
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

Route::group([
    'prefix' => 'website'
], function($router) {

    Route::post('create', [WebsiteContoller::class, 'create']);
    Route::post('publish', [WebsiteContoller::class, 'publish']);

});


Route::group([
    'prefix' => 'subscription'
], function($router) {

    Route::post('create', [SubscribersContoller::class, 'create']);

});
