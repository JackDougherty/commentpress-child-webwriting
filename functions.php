<?php /*
===============================================================
CommentPress Nav Below Functions
===============================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
---------------------------------------------------------------
NOTES

Example theme amendments and overrides.

---------------------------------------------------------------
*/




/**
 * Set the content width based on the theme's design and stylesheet.
 * This seems to be a Wordpress requirement - though rather dumb in the
 * context of our theme, which has a percentage-based default width.
 * I have arbitrarily set it to the apparent content-width when viewing
 * on a 1280px-wide screen.
 */
if ( !isset( $content_width ) ) { $content_width = 586; }





/** 
 * @description: augment the CommentPress Default Theme setup function
 * @todo: 
 *
 */
function cpnavbelow_setup( 
	
) { //-->

	/** 
	 * Make theme available for translation.
	 * Translations can be added to the /languages/ directory of the child theme.
	 */
	load_theme_textdomain( 
	
		'commentpress-nav-below', 
		get_stylesheet_directory() . '/languages' 
		
	);

}

// add after theme setup hook
add_action( 'after_setup_theme', 'cpnavbelow_setup' );






/** 
 * @description: override styles by enqueueing as late as we can
 * @todo:
 *
 */
function cpnavbelow_enqueue_styles() {

	// init
	$dev = '';
	
	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		$dev = '.dev';
	}
	
	// add child theme's css file
	wp_enqueue_style( 
	
		'cpnavbelow_css', 
		get_stylesheet_directory_uri() . '/assets/css/style-overrides'.$dev.'.css',
		array( 'cp_reset_css' ),
		'1.0', // version
		'all' // media
	
	);

	// add child theme's js file
	wp_enqueue_script( 
	
		'cpnavbelow_js', 
		get_stylesheet_directory_uri() . '/assets/js/script-overrides.js',
		array( 'cp_common_js' )
		
	);

}

// add a filter for the above
add_filter( 'wp_enqueue_scripts', 'cpnavbelow_enqueue_styles', 110 );






/** 
 * @description: override default setting for comment registration
 * @todo: 
 *
 */
function cpnavbelow_sidebar_tab_order( $order ) {
	
	// ignore what's sent to us and set our own order here
	$cpuea_order = array( 'contents', 'comments', 'activity' );
	
	// --<
	return $cpuea_order;

}

// add a filter for the above
add_filter( 'cp_sidebar_tab_order', 'cpnavbelow_sidebar_tab_order', 21, 1 );






