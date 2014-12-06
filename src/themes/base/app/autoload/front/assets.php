<?php
/**
 * Assets management
 */

//\Brain\Assets::addFrontStyle( 'optimized-styles' )
//	// ensure the url is correct
//	->src( $uri . '/my-styles.css' )
//	// replace following with real ids of the style you merged
//	->provide([ 'style1', 'style2', 'style3', 'style4' ])
//	// ensure the path is correct
//	->ver( @filemtime( $path . '/my-styles.css' ) ? : NULL );

add_action('brain_loaded', function ()
{
	$cssUrl = Config::get('assets.css.url');

	\Brain\Assets::addFrontStyle('layout-front')
		->src( $cssUrl . '/layout.css')
		->ver(1);

	//	Brain\Assets::addStyle( 'my-style' )
	//
	//		->src( Config::get('assets.css.url').'/layout.css' )

	//		->deps( 'wp-color-picker' )

	//		->provide( [ 'dashicons', 'admin-bar', 'bootstrap', 'fontawesome' ] )

	//		->ver( filemtime( '/srv/www/wp/wp-content/themes/my/style.css' ) )

	//		->after( 'body { height: 100%; }' )

	//		->media( 'screen' )

	//		->condition( function( WP_Query $query, $user ) {
	//
	//			return $query->is_page( 'special-page' ) && user_can( $user, 'edit_pages' );
	//
	//		})

});

