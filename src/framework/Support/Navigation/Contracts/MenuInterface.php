<?php namespace Framework\Support\Navigation\Contracts;

/**
 * Menu
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
interface MenuInterface
{
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
	public function add($name = '', $description = '', array $args = []);

	/**
	 * @param string $name The menu identifier
	 * @return mixed
	 */
	public function render($name);
}