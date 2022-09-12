<?php

/*---------------------------------------
	DEFINE FILE FOLDER ROOT
-----------------------------------------*/
define( 'OMNIVUS_ROOT', get_template_directory() );
define( 'OMNIVUS_ROOT_URI', get_template_directory_uri() );
define( 'OMNIVUS_ROOT_IMAGE', OMNIVUS_ROOT_URI .'/assets/img' );
define( 'OMNIVUS_ROOT_CSS', OMNIVUS_ROOT_URI .'/assets/css' );
define( 'OMNIVUS_ROOT_JS', OMNIVUS_ROOT_URI .'/assets/js' );
define( 'OMNIVUS_ROOT_FONTS', OMNIVUS_ROOT_URI .'/assets/fonts' );
define( 'OMNIVUS_ROOT_PLUGINS', OMNIVUS_ROOT_URI .'/plugins' );
 
/*----------------------------------------
	THEME VERSION CONTROL
-----------------------------------------*/
define("OMNIVUS_VERSION", "1.1.0");

/*----------------------------------------
	ADD THEME AFTER SETUP FUNCTIONALITY
-----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/setup.php')) {
	require_once(OMNIVUS_ROOT . '/inc/setup.php');
}

/*----------------------------------------
	ADD THEME WIDGET FUNCTIONALITY
-----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/widgets.php')) {
	require_once(OMNIVUS_ROOT . '/inc/widgets.php');
}


/*----------------------------------------
 * IMPLEMENT ALL SCRIPTS
-----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/scripts.php')) {
	require_once(OMNIVUS_ROOT . '/inc/scripts.php');
}
/*----------------------------------------
 * IMPLEMENT GLOBAL STYLE
-----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/global-style.php')) {
	require_once(OMNIVUS_ROOT . '/inc/global-style.php');
}

/*----------------------------------------
 * 	CUSTOM TEMPLATE TAGS FOR THIS THEME.
 ----------------------------------------*/
 if (file_exists( OMNIVUS_ROOT . '/inc/template-tags.php' )) {
 	require_once( OMNIVUS_ROOT . '/inc/template-tags.php' );
 }

/*--------------------------------------
	FUNCTIONS WHICH ENHANCE THE THEME BY HOOKING.
----------------------------------------*/
if (file_exists( OMNIVUS_ROOT . '/inc/template-functions.php' )) {
	require_once( OMNIVUS_ROOT . '/inc/template-functions.php' );
}

/*--------------------------------------
	FUNCTIONS FOR THEME OPTIONS STYEING.
----------------------------------------*/
if (file_exists( OMNIVUS_ROOT . '/inc/style.php' )) {
	require_once( OMNIVUS_ROOT . '/inc/style.php' );
}

/*--------------------------------------
	CUSTOM FUNCTIONS .
----------------------------------------*/
if (file_exists( OMNIVUS_ROOT .'/inc/custom-functions.php' )) {
	require_once( OMNIVUS_ROOT .'/inc/custom-functions.php' );
}
/*--------------------------------------
	CUSTOM NAV WALKER .
----------------------------------------*/
if (file_exists( OMNIVUS_ROOT .'/inc/nav-menu-walker.php' )) {
	require_once( OMNIVUS_ROOT .'/inc/nav-menu-walker.php' );
}
/*--------------------------------------
	THEME OPTON & CUSTOMIZER ADDITIONS.
----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/customizer.php')) {
	require_once( OMNIVUS_ROOT . '/inc/customizer.php' );
}

if ( function_exists( 'cs_framework_init' ) && file_exists( OMNIVUS_ROOT . '/lib/metabox-and-theme-option.php' ) ) {
	require_once( OMNIVUS_ROOT . '/lib/metabox-and-theme-option.php' );
}

/*---------------------------------------
	DEMO CONTENT IMPORTER
----------------------------------------*/
if ( class_exists( 'OCDI_Plugin' ) && file_exists( OMNIVUS_ROOT . '/inc/importer.php' ) ) {
    require_once( OMNIVUS_ROOT . '/inc/importer.php' );
}

/*--------------------------------------
	REQUIRED PLUGINS.
----------------------------------------*/
if (file_exists(OMNIVUS_ROOT . '/inc/required-plugins.php')) {
	require_once( OMNIVUS_ROOT . '/inc/required-plugins.php' );
}