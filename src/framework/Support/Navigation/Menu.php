<?php  namespace Framework\Support\Navigation;

use Framework\Core\Application;
use Framework\Support\Navigation\Contracts\MenuInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * Menu
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
class Menu implements MenuInterface
{


	/**
	 * @var Application
	 */
	private $app;

	/**
	 * Registered menus
	 * @var array
	 */
	private $menusRegistered = [];

	/**
	 * Defaults configuration
	 * @var array
	 */
	private $defaults = array(
		'theme_location'  => '',
		'menu'            => 'menu',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => false,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	/**
	 * @param Application $app
	 */
	function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menu
	 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
	 *
	 * @param string $name The identifier (slug like)
	 * @param string $description
	 * @param array $args See Wordpress codex to get the options
	 *
	 */
	public function add($name = '', $description = '', array $args = [])
	{
		// register on wp
		$this->registerMenu($name, $description);

		// configure the output
		$this->configureTheOutputMenu($name, $args);

	}

	/**
	 * @param string $name The menu identifier
	 * @return mixed
	 */
	public function render($name)
	{
		if (!isset($this->menusRegistered[$name]))
		{
			throw new NotFoundResourceException("The menu [{$name}] could not be found.");
		}

		return wp_nav_menu($this->menusRegistered[$name]);
	}

	/**
	 * @param $name
	 * @param $description
	 */
	private function registerMenu($name, $description)
	{
		add_action('init', function () use ($name, $description)
		{

			register_nav_menus(array(

				$name => $description,

			));

		});
	}

	/**
	 * @param $name
	 * @param $args
	 */
	private function configureTheOutputMenu($name, $args)
	{
		// overwrite this
		$args['echo'] = false;

		$config = array_merge($this->defaults, $args);

		$this->menusRegistered[$name] = $config;
	}

} 