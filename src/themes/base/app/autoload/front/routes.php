<?php
/**
 * -------------------------------
 * Routes
 * -------------------------------
 */
add_action('brain_loaded', function ()
{

	Route::add('/laravel', 'laravel_route', 1, array(
		'methods' => array('GET'),
	))
		->bindToMethod('Controller', 'index');

	Route::add('/route/{name}/{page}', 'some_route', 1, array(
		'requirements' => array('name' => '[a-zA-Z-_]+', 'page' => '.+'),
		'methods'      => array('GET'),
		'defaults'     => array('page' => '1', 'foo' => 'bar'),
	))
		->bindToMethod('Controller', 'index');

	Route::add('/sem-categoria/{name}', 'nocat_route', 1, array(
		'requirements' => array('name' => '[a-zA-Z-0-9_]+'),
		'methods'      => array('GET'),
		'defaults'     => array('name' => ''),
	))
		->bindToMethod('App\Controllers\HomeController', 'getIndex');

});


class Controller
{


	public function index($args, $request)
	{
		dd($args);
	}
}
