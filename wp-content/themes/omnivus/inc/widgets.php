<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omnivus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'omnivus' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'omnivus' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'omnivus' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'omnivus' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'omnivus' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add footer widgets here.', 'omnivus' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'omnivus' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add footer widgets here.', 'omnivus' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'omnivus' ),
		'id'            => 'footer-sidebar-4',
		'description'   => esc_html__( 'Add footer widgets here.', 'omnivus' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'omnivus_widgets_init' );
