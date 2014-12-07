<?php
/**
 * ---------------------------------------------------
 * Register our menus
 * ---------------------------------------------------
 */

/**
 * On template use:
 * <code>
 * {{ Menu::render('primary') }}
 * // or
 * <?php echo Menu::render('primary')?>
 * </code>
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
		'echo'            => false, // <== always false
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new \Framework\Support\Navigation\BootstrapMenuWalker
	));


/*
 * Default configurations
 */
Menu::add('footer', 'Footer menu');