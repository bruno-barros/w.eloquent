<?php
/**
 * ----------------------------------------
 * Sidebars
 * ----------------------------------------
 */

$appPlugin = \Framework\Plugins\AppIntegration\Includes\AppIntegration::getInstance();

add_action('widgets_init', function () use ($appPlugin)
{

	register_sidebar(array(

		'name'         => __('Main Sidebar', $appPlugin->get_plugin_name()),

		'id'           => 'sidebar-1',

		'description'  => __('Widgets in this area will be shown on all posts and pages.',
			$appPlugin->get_plugin_name()),

		'before_title' => '<h1>',

		'after_title'  => '</h1>',

	));

});