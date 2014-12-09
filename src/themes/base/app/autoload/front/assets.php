<?php
/**
 * ----------------------------------
 * Assets management
 * ----------------------------------
 * @link https://github.com/Giuseppe-Mazzapica/Occipital
 *
 * Brain\Assets::addStyle( 'my-style' )
 *
 * ->src( Config::get('assets.css.url').'/layout.css' )
 *
 * ->deps(['wp-color-picker' ])
 *
 * // replace following with real ids of the style you merged
 * ->provide( [ 'dashicons', 'admin-bar', 'bootstrap', 'fontawesome' ] )
 *
 * ->ver( filemtime( '/srv/www/wp/wp-content/themes/my/style.css' ) )
 *
 * ->after( 'body { height: 100%; }' )
 *
 * ->media( 'screen' )
 *
 * ->isFooter( false )
 *
 * ->condition( function( WP_Query $query, $user ) {
 *
 * return $query->is_page( 'special-page' ) && user_can( $user, 'edit_pages' );
 *
 * });
 */

add_action('brain_loaded', function ()
{
	$env    = App::getFacadeApplication()['env'];
	$ver    = Config::get('assets.ver');
	$cssUrl = Config::get('assets.css.url');
	$jsUrl  = Config::get('assets.js.url');


});

