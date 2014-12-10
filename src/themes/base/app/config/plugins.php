<?php
/**
 * Must use plugins
 */

$paths = require SRC_PATH . '/bootstrap/paths.php';

return array(

	/**
	 * Blade engine
	 * @link http://laravel.com/docs/4.2/templates
	 */
	$paths['framework'] . '/Plugins/Blade/blade.php',

	/**
	 * Router, Assets for Word press
	 * @link http://giuseppe-mazzapica.github.io/Brain/
	 */
	$paths['framework'] . '/Plugins/BrainPlugins/brain-plugins.php',

);