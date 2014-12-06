<?php
/**
 * Default
 */



//$uri = get_stylesheet_directory_uri();
//$path = get_stylesheet_directory();
//dd(Config::get('assets.url'));
//dd(Config::get('assets.css.url'));
//dd(get_theme_root_uri());


// DON'T DO THIS IN PRODUCTION!
//add_action( 'wp_print_styles', function() {
//	if ( is_admin() ) return;
//	global $wp_styles, $wp_scripts;
//	echo '<table border="1" cellspacing="5">';
//	echo '<tr><th colspan="2">Styles</th><tr>';
//	echo '<tr><th>Handle</th><th>Url</th><tr>';
//	if ( $wp_styles instanceof \WP_Styles) {
//		foreach( $wp_styles->queue as $id ) {
//			printf(
//				'<tr><td>%s</td><td>%s</td></th>',
//				$id,
//				$wp_styles->registered[$id]->src
//			);
//		}
//	}
//	echo '<tr><th colspan="2">Scripts</th><tr>';
//	echo '<tr><th>Handle</th><th>Url</th><tr>';
//	if ( $wp_scripts instanceof \WP_Scripts) {
//		foreach( $wp_scripts->queue as $id ) {
//			printf(
//				'<tr><td>%s</td><td>%s</td></th>',
//				$id,
//				$wp_scripts->registered[$id]->src
//			);
//		}
//	}
//	echo '</table>';
//}, 99 );





add_action( 'brain_loaded', function() {

	Brain\Routes::add( '/route/{name}/{page}', 'some_route', 1, array(
		'requirements' => array( 'name' => '[a-zA-Z-_]+', 'page' => '.+' ),
		'methods' => array( 'GET' ),
		'defaults' => array( 'page' => '1', 'foo' => 'bar' ),
	) )
	->bindToMethod('Controller', 'index');

});



class Controller {


	public function index($args, $request)
	{
		dd($args);
	}
}
