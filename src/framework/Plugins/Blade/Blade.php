<?php  namespace Framework\Plugins\Blade;

	/**
	 * @wordpress-plugin
	 * Plugin Name: Blade
	 * Plugin URI: http://brunobarros.com/
	 * Description: Blade wrapper for Wordpress templates
	 * Version: 1.0.0
	 * Author: Bruno Barros
	 * Author URI: http://www.brunobarros.com/
	 * License: GPLv2
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       app-integration
	 * Domain Path:       /languages
	 */
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\View\Compilers\BladeCompiler;

//use Illuminate\View\Compilers\BladeCompiler as Blade;

/**
 * Blade
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
class BladePlugin
{
	/**
	 * @var App
	 */
	private $app;

	/**
	 * @var array|mixed
	 */
	private $paths = array();

	/**
	 * Constructor
	 */
	function __construct()
	{

		$this->app = App::getFacadeApplication();
		$this->paths = require SRC_PATH . '/config/paths.php';
		// Instantiate main model
		//		$this->main_model = new WP_Blade_Main_Model();

		// Bind to template include action
		add_action('template_include', array($this, 'parse'));

		// Listen for index template filter
		add_filter('index_template', array($this, 'parse'));

		// Listen for page template filter
		add_filter('page_template', array($this, 'parse'));

		// Listen for Buddypress include action
		add_filter('bp_template_include', array($this, 'parse'));

	}


	/**
	 * Return a new class instance.
	 * @return \Framework\Plugins\Blade\Blade { obj } class instance
	 */
	public static function make()
	{

		return new self();
	}

	/**
	 * Handle the compilation of the templates
	 *
	 * @param $template
	 */
	public function parse($template)
	{

//		dd($this->app['config']->get('view')['paths']);
//		dd($paths['storage'].'/views');
//		dd($this->app['path.storage'] . '/views');

		$viewsFromConfig = $this->app['config']->get('view.paths');

		$views = array_merge((array)$viewsFromConfig, (array)$this->paths['public']);
		$cache = $this->paths['storage'].'/views';

//		dd($views);

		$blade = new BladeAdapter($views, $cache);

		return (string)$blade->view()->make($this->prepareFileName($template));
//		die;

//		echo $blade->view()->make('hello');

	}

	private function prepareFileName($template = '')
	{

		$peaces = explode('/', $template);

		$fileName = $peaces[count($peaces)-1];

		return str_replace(array('.blade.php', '.php'), '', $fileName);

	}

}

/**
 * Bootstrap plugin
 */
BladePlugin::make();