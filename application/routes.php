<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'home@index');
Route::controller('register');
Route::controller('login');
Route::controller('news');


Route::group(array('before' => 'auth'), function() {
	// páginas que só serão exibidas para usuários logados
});

Route::group(array('before' => 'admin'), function() {
	Route::controller('test');
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (!Sentry::check()) return Redirect::to('login');
});

Route::filter('ajax', function()
{
	if (!Request::ajax()) return Response::error('404');
});

Route::filter('admin', function ()
{
	if (!Sentry::user()->has_access('is_admin'))
	{
		return Response::error('403');
	}
});

/*
|--------------------------------------------------------------------------
| Events
|--------------------------------------------------------------------------
*/

View::composer('layout.base', function($view)
{
	Asset::add('jquery','js/vendor/jquery-1.8.2.js');
	Asset::add('bootstrap-js','js/vendor/bootstrap.js');
	Asset::add('main-js','js/main.js');

	Asset::add('bootstrap-css','css/bootstrap.css');
	Asset::add('bootstrap-responsive','css/bootstrap-responsive.css','bootstrap-css');
	Asset::add('main-css','css/main.css');
});

View::composer('quiz.base', function($view)
{
	Asset::add('jquery-countdown','js/vendor/jquery.countdown.js','jquery');
});
