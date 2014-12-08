<?php
/**
 * -------------------------------
 * Search form
 * -------------------------------
 */

/**
 * Add HTML5 support
 */
add_theme_support( 'html5', array( 'search-form' ) );

add_filter( 'get_search_form', function(){

	return View::make('partials.searchform');

});