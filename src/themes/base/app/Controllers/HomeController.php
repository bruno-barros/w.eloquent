<?php namespace App\Controllers;

use Corcel\Post;
use Illuminate\Support\Facades\Input;

/**
 * HomeController
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class HomeController extends BaseController{


	public function getIndex($name = '')
	{
		/**
		 * Do whatever you need
		 */
		$model = new Post();
		$post = $model->where('post_name', $name)->first();

		/**
		 * Share data with views and subviews
		 */
		$this->share('myPost', $post);

	}


	public function postIndex()
	{
		dd(Input::all());
	}

} 