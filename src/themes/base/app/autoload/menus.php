<?php
/**
 * ---------------------------------------------------
 * Register our menus
 * ---------------------------------------------------
 */

add_action('init', function ()
{

	register_nav_menus(array(

		'primary' => 'Primary menu',

		'footer'  => 'Footer menu',

	));

});