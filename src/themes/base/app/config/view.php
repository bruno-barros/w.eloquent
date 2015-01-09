<?php

$paths = require SRC_PATH . '/bootstrap/paths.php';

return [

	/**
	 * --------------------------------------------------------------------
	 * View Storage Paths
	 * --------------------------------------------------------------------
	 * Most templating systems load templates from disk. Here you may specify
	 * an array of paths that should be checked for your views. Of course
	 * the usual Laravel view path has already been registered for you.
	 */
	'paths'      => [
		$paths['theme'],
		$paths['theme'] . '/app/views',
	],

	/**
	 * ---------------------------------------------------------------------
	 * Pagination View
	 * ---------------------------------------------------------------------
	 *
	 * This view will be used to render the pagination link output, and can
	 * be easily customized here to show any view you like. A clean view
	 * compatible with Twitter's Bootstrap is given to you by default.
	 *
	 * @see \Weloquent\Support\Pagination::render()
	 */
	'pagination' => null,

	/**
	 * --------------------------------------------------------------------------
	 *  Views filters/actions hooks
	 * --------------------------------------------------------------------------
	 *
	 * The way Blade engine intercepts the templates requested by WordPress is
	 * using filters. These are the core filters, but you can add more filters
	 * made by plugins if you want to render as Blade views.
	 * ATTENTION: if you remove these filters the Blade engine could not
	 * do the job accordingly.
	 *
	 */

	'view_actions' => [
		'template_include',
	],

	'view_filters' => [
		'index_template',
		'comments_template',
		'bp_template_include',// Listen for Buddypress include action
	],

];