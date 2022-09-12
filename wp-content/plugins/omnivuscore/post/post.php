<?php

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
if ( !function_exists('themecore_portfolio') ) {
	function themecore_portfolio() {

		$labels = array(
			'name'               => esc_html__( 'Portfolios', 'themecore' ),
			'singular_name'      => esc_html__( 'Portfolio', 'themecore' ),
			'add_new'            => _x( 'Add New Portfolio', 'themecore', 'themecore' ),
			'add_new_item'       => esc_html__( 'Add New Portfolio', 'themecore' ),
			'edit_item'          => esc_html__( 'Edit Portfolio', 'themecore' ),
			'new_item'           => esc_html__( 'New Portfolio', 'themecore' ),
			'view_item'          => esc_html__( 'View Portfolio', 'themecore' ),
			'search_items'       => esc_html__( 'Search Portfolios', 'themecore' ),
			'not_found'          => esc_html__( 'No Portfolios found', 'themecore' ),
			'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'themecore' ),
			'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'themecore' ),
			'menu_name'          => esc_html__( 'Portfolios', 'themecore' ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 11,
			'menu_icon'           => 'dashicons-portfolio',
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'page',
			'supports'            => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
			),
		);

		register_post_type( 'portfolio', $args );
	}
}

add_action( 'init', 'themecore_portfolio' );

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'themecore_flush_rewrites' );
function themecore_flush_rewrites() {
	themecore_portfolio();
	flush_rewrite_rules();
}