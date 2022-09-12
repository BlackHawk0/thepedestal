<?php

/**
 * [omnivus_customize_register auto refresh for custom logo]
 * @param  [type] $wp_customize [array]
 * @return [type]               [array]
 */
function omnivus_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
}
add_action( 'customize_register', 'omnivus_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function omnivus_customize_preview_js() {
	wp_enqueue_script( 'omnivus-customizer', OMNIVUS_ROOT_JS . '/customizer.js', array( 'customize-preview' ), OMNIVUS_VERSION, true );
}
add_action( 'customize_preview_init', 'omnivus_customize_preview_js' );