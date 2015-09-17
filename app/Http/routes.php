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

// Route::get('/', function () {
//     return view('welcome');
// });

// CHADBISHOP ROUTES
$cb_routes = function(){
	// Route::get('/', function () {
	//     return view('welcome');
	// });
	Route::controller('/', 'ChadBishopController');
 //    // default page
 //    Route::any('/', 'CBController@showWelcome');
	// // contact page
 //    Route::get('/contact', 'CBController@showContact');
 //    Route::post('/contact', 'CBController@doContact');
 //    // share pages
 //    Route::get('/quick/{section}/{label}', 'CBController@showQuick');
 //    Route::any('/share/{section}/{label}', 'CBController@showShare');

 //    Route::get('/test', function(){
 //        return View::make('site_cb.test', array());
 //    });
};

Route::group(array("domain" => "chadbishop.com"), $cb_routes);
Route::group(array("domain" => "chadbishop2.local"), $cb_routes);

// LIGHTBRIDGESTUDIO ROUTES
$lb_routes = function(){
 //    // default page
 //    Route::any('/', 'LBSController@showWelcome');
 //    // contact page
 //    Route::get('/contact', 'LBSController@showContact');
 //    Route::post('/contact', 'LBSController@doContact');
 //    // share pages
 //    Route::get('/quick/{section}/{label}', 'LBSController@showQuick');
 //    Route::get('/share/{section}/{label}', 'LBSController@showShare');
	
	// // ADMIN ROUTES
	// Route::get('/login', 'AdminController@showLogin');
	// Route::post('/login', 'AdminController@doLogin');
	
	// Route::get('/admin', 'AdminController@showAdmin')->before('auth');
	// Route::post('/admin', 'AdminController@updateJSON')->before('auth');
	// Route::get('/admin/new', 'AdminController@showPageEdit')->before('auth');
	
	// Route::post('/admin/crud/page', 'AdminController@storePage')->before('auth');
	// Route::delete('/admin/crud/page/{id}' , 'AdminController@deletePage')->before('auth');
	
	// Route::get('/admin/crud/meta/{id}' , 'AdminController@getMeta')->before('auth');
	// Route::put('/admin/crud/meta/{id}' , 'AdminController@putMeta')->before('auth');
    
 //    Route::post('/admin/page_order' , 'AdminController@updatePageOrder')->before('auth');
};

Route::group(array("domain" => "ltbrdg.com"), $lb_routes);
Route::group(array("domain" => "ltbrdg.local"), $lb_routes);