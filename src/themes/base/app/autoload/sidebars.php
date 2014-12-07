<?php
/**
 * ----------------------------------------
 * Sidebars
 * ----------------------------------------
 */

$appPLugin = \Framework\Plugins\AppIntegration\Includes\AppIntegration::getInstance();

add_action('widgets_init', function () use ($appPLugin)
{

	register_sidebar(array(

		'name'         => __('Main Sidebar', $appPLugin->get_plugin_name()),

		'id'           => 'sidebar-1',

		'description'  => __('Widgets in this area will be shown on all posts and pages.',
			$appPLugin->get_plugin_name()),

		'before_title' => '<h1>',

		'after_title'  => '</h1>',

	));

});