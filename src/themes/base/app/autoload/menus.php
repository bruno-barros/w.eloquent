<?php
/**
 * ---------------------------------------------------
 * Register our menus
 * ---------------------------------------------------
 */

Menu::add('primary', 'Primary menu',
	array(
		'theme_location'  => 'primary',
		'menu'            => 'primary',
		'container'       => 'div',
		'container_class' => 'main-menu',
		'container_id'    => '',
		'menu_class'      => 'nav nav-pills nav-stacked',
		'menu_id'         => '',
		'echo'            => false,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new \Framework\Support\Navigation\BootstrapMenuWalker
	));

//add_action('init', function ()
//{
//
//	register_nav_menus(array(
//
//		'primary' => 'Primary menu',
//
//		'footer'  => 'Footer menu',
//
//	));
//
//});