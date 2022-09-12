<?php 
    add_action( 'wp_enqueue_scripts', 'omnivus_child_enqueue_styles' , 100 );
    function omnivus_child_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
    } 
?>