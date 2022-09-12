<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @Package Omnivus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function omnivus_body_classes( $classes ) {

	$header_style    = omnivus_any_data('header_style',$default='header-1');
	$page_meta_array = omnivus_metabox_value('_omnivus_page_metabox');
	$header_style    = isset( $page_meta_array['header_style'] ) ? $page_meta_array['header_style'] : $header_style;

	if('header-1' == $header_style){
		$classes[] = 'header__style__1';
	}elseif ( 'header-2' == $header_style ) {
		$classes[] = 'header__style__2';
	}elseif ( 'header-3' == $header_style ) {
		$classes[] = 'header__style__3';
	}elseif ( 'header-4' == $header_style ) {
		$classes[] = 'header__style__4';
	}elseif ( 'header-5' == $header_style ) {
		$classes[] = 'header__style__5';
	}elseif ( 'header-6' == $header_style ) {
		$classes[] = 'header__style__6';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'omnivus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function omnivus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'omnivus_pingback_header' );
