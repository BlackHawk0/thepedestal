<?php 
/**
 * Plugin Name: Omnivas Core
 * Description: This is a helper plugin for Omnivas theme.
 * Plugin URI: https://techbird.org/omnivus
 * Author: TechBird
 * Author URI: https://techbird.org
 * Version: 1.2.0
 * License: GPL2
 * Text Domain: themecore
 */

/**
 * CONSTANT FOR DIR
 *  @param string $[name] name of the constant
 *  @param string directory url
 */
define('THEMECORE_DIR', plugin_dir_url( __FILE__ ));
define('THEMECORE_JS', plugins_url( '/assets/js', __FILE__ ));
define('THEMECORE_CSS', plugins_url( '/assets/css', __FILE__ ));
define('THEMECORE_IMG', plugins_url( '/assets/img', __FILE__ ));

/**
 * INITIALIZE
 */
if ( !defined('ABSPATH') ) {
	exit;
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * ENQUEUE SCRIPTS
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */
function themecore_toolkit_scripts() {
	wp_enqueue_style( 'themecore-widgets',THEMECORE_CSS . '/widgets.css', '', '1.0.0', 'all' );
	wp_enqueue_style( 'themecore-overwrite', THEMECORE_CSS . '/overwrite.css', '', '1.0.0', 'all' );
	wp_enqueue_style( 'themecore', THEMECORE_CSS . '/core-inline.css', '', '1.0.0', 'all' );

	/*------------------------
		REGISTER CSS
	-------------------------*/
	wp_register_style( 'owl-carousel', THEMECORE_CSS . '/owl.carousel.css', '', '1.0.0', 'all' );
	wp_register_style( 'easyTicker', THEMECORE_CSS . '/easy-ticker.css', '', '1.0.0', 'all' );

	/*------------------------
		REGISTER SCRIPTS
	-------------------------*/
	wp_register_script( 'owl-carousel', THEMECORE_JS . '/owl.carousel.min.js', array('jquery'),'2.0.0', true );
	wp_register_script( 'easyTicker', THEMECORE_JS . '/easy-ticker.min.js', array('jquery','jquery-effects-core'),'1.0.0', true );

	/*------------------------
		REGISTER SINGLE SCRIPTS
	--------------------------*/
	wp_register_script( 'instafeed', THEMECORE_JS . '/instafeed.min.js', array('jquery'),'1.0.0', true );
	wp_register_script( 'ajaxchimp', THEMECORE_JS . '/ajaxchimp.js', array('jquery'),'1.0.0', true );
	
	/*------------------------
		CALL SCRIPTS
	--------------------------*/
	wp_enqueue_script( 'appear', THEMECORE_JS . '/appear.js',array('jquery'),'1.0.0',true );
	wp_enqueue_script( 'masonry', array('jquery' , 'imagesloaded') );
	wp_enqueue_script( 'isotope', THEMECORE_JS . '/isotope.pkgd.min.js',array('jquery'),'1.0',true );
	wp_enqueue_script( 'themecore', THEMECORE_JS . '/active.js', array( 'jquery','appear','owl-carousel' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'themecore_toolkit_scripts',10 );

/**
 * Admin Enqueue scripts Backend
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 * @param  string $hook get for the posts id
 */
function themecore_admin_enqueue_scripts($hook) {
	
	wp_enqueue_style( 'admin-style', THEMECORE_CSS . '/admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'widget-admin', THEMECORE_JS . '/widget-admin.js',array('jquery'), '1.1.0',true );

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if ( "post.php" == $hook  ) {
        $post_format = get_post_format($post_id);
		wp_enqueue_script( 'themecore-admin', THEMECORE_JS . '/admin.js',array('jquery'), '1.0.0',true );
        wp_localize_script("themecore-admin","post_format",array("format"=>$post_format));
    }elseif( "post-new.php" == $hook ){
		wp_enqueue_script( 'themecore-admin', THEMECORE_JS . '/admin.js',array('jquery'), '1.0.0',true );
    	wp_localize_script("themecore-admin","post_format",array("format"=>'none'));
    }

}
add_action( 'admin_enqueue_scripts', 'themecore_admin_enqueue_scripts' );

if ( file_exists( dirname(__FILE__).'/post/post.php' ) ) {
	require_once(dirname(__FILE__).'/post/post.php');
}

/*---------------------------
	FRAMEWORK
----------------------------*/
if ( is_plugin_active( 'cmb2/init.php' ) ) {
    require_once( dirname(__FILE__) . '/framework/metabox.php' );
}
if (file_exists( dirname(__FILE__) . '/framework/csf/cs-framework.php')) {
	require_once( dirname(__FILE__) . '/framework/csf/cs-framework.php' );
}

/*---------------------------
	WIDGETS
-----------------------------*/
if ( file_exists( dirname(__FILE__) . '/widgets/widgets.php' ) ) {
	require_once( dirname(__FILE__) . '/widgets/widgets.php' );
}