<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('/image', 'ImageController');


$cb_routes = function(){
	Route::get('/share/{section?}/{page?}', function(){
		return Redirect::to('/');
	});
	
	Route::controller('/', 'ChadBishopController');
};

Route::group(array("domain" => "chadbishop.com"), $cb_routes);
Route::group(array("domain" => "chadbishop.local"), $cb_routes);

$lb_routes = function(){
	Route::get('/share/portfolio/NovemberSunset.html', function(){
		return Redirect::to('/pages/sunset-at-the-beach');
	});

	Route::get('/share/{section?}/{page?}', function(){
		return Redirect::to('/');
	});

	Route::controller('/', 'LightBridgeController');
};

Route::group(array("domain" => "ltbrdg.com"), $lb_routes);
Route::group(array("domain" => "ltbrdg.local"), $lb_routes);