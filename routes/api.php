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

Route::group(['prefix' => 'v1/cms', 'namespace' => 'App\Http\Controllers'], function () {
    
    Route::resource('clients', 'ClientController')->except(['create']);
    Route::resource('contacts', 'ContactController')->except(['create', 'edit', 'update']);
    Route::resource('portfolios', 'PortfolioController')->except(['create']);
    Route::resource('products', 'ProductController')->except(['create']);
    Route::resource('teams', 'TeamController')->except(['create']);
    Route::resource('testimonials', 'TestimonialController')->except(['create']);
});    

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\LandingPage'], function () {
    Route::resource('clients', 'ClientController')->only(['index']);
    Route::resource('contacts', 'ContactController')->only(['index', 'store']);
    Route::resource('portfolios', 'PortfolioController')->only(['index']);
    Route::resource('products', 'ProductController')->only(['index']);
    Route::resource('teams', 'TeamController')->only(['index']);
    Route::resource('testimonials', 'TestimonialController')->only(['index']);
    Route::resource('information', 'InformationController')->only(['index']);
});    
