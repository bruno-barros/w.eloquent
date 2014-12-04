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


use Illuminate\Support\Facades\App;


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

		$viewsFromConfig = $this->app['config']->get('view.paths');

		$views = array_merge((array)$viewsFromConfig, (array)$this->paths['public']);
		$cache = $this->paths['storage'].'/views';


		$blade = new BladeAdapter($views, $cache);


		if(! $blade->getCompiler()->isExpired($template))
		{
			return $blade->getCompiler()->getCompiledPath($template);
		}

		$blade->getCompiler()->compile($template);

		return $blade->getCompiler()->getCompiledPath($template);

	}


}

/**
 * Bootstrap plugin
 */
BladePlugin::make();