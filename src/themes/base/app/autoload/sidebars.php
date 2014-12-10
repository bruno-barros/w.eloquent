<?php
/**
 * ----------------------------------------
 * Sidebars
 * ----------------------------------------
 */

$appPlugin = \Weloquent\Plugins\AppIntegration\Includes\AppIntegration::getInstance();


add_action('widgets_init', function () use ($appPlugin)
{

	register_sidebar(array(

		'name'         => __('Main Sidebar', $appPlugin->get_plugin_name()),

		'id'           => 'sidebar-1',

		'description'  => __('Widgets in this area will be shown on all posts and pages.',
			$appPlugin->get_plugin_name()),

		'class' => '',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => "</aside>\n",

		'before_title' => '<h3 class="widget-title">',

		'after_title'  => '</h3>',

	));

});