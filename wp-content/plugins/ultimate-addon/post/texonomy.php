<?php

/*-----------------------------------------------------------------------------------*/
/*	Creating Custom Taxonomy 
/*-----------------------------------------------------------------------------------*/

if (class_exists('Give')) {
	// create two taxonomies, genres and writers for the post type "book"
	function ultimate_give_campaign_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'ultimate' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'ultimate' ),
			'search_items'      => __( 'Search Categories', 'ultimate' ),
			'all_items'         => __( 'Categories', 'ultimate' ),
			'parent_item'       => __( 'Parent Category', 'ultimate' ),
			'parent_item_colon' => __( 'Parent Category:', 'ultimate' ),
			'edit_item'         => __( 'Edit Category', 'ultimate' ),
			'update_item'       => __( 'Update Category', 'ultimate' ),
			'add_new_item'      => __( 'Add New Category', 'ultimate' ),
			'new_item_name'     => __( 'New Category', 'ultimate' ),
			'menu_name'         => __( 'Categories', 'ultimate' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'campaigncategory' ),
		);

		register_taxonomy( 'campaigncats', array( 'give_forms' ), $args );
	}
	add_action( 'init', 'ultimate_give_campaign_taxonomies', 0 );

	function ultimate_plugin_templates( $template ) {
	    if (  is_single() && get_post_type() == 'give_forms' ) {
	        $template = dirname(__FILE__) . '/templates/single-give-forms.php';
	    }
	    return $template;
	}
	add_filter('template_include', 'ultimate_plugin_templates');
}

if ( !function_exists('ultimate_single_page_title') ) {
    function ultimate_single_page_title(){ ?>
        <div class="barner-area white">
            <div class="barner-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">                        
                        <div class="page-title">
                            <h1>
                                <?php                                    
                                    wp_title( $sep = ' ');
                                 ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <?php if (function_exists('bcn_display')) {
                                bcn_display();
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}