<?php namespace App\Controllers;

use Illuminate\Support\Facades\View;

/**
 * HomeController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class HomeController extends BaseController{

	public $var = '123';

	public function getIndex($id = '')
	{
		$var = 'bruno';

		return  View::make('master', compact('var'));
//
//		$view = View::make('master', compact('var'));
//		echo (string)$view;
	}

} 