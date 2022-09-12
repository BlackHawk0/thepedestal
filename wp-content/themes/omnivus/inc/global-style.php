<?php

/*------------------------------
    GLOBAL SITE COLOR
-------------------------------*/
if(!function_exists('omnivus_global_style_load')){
    function omnivus_global_style_load ( ) {

        $global_css = "";

        // Text Logo Color
        $global_css .="
            :root {
                --site_main_color: ".omnivus_any_color( 'site_main_color',$default='#006de8' ).";
                --site_body_color: ".omnivus_any_color( 'site_body_color',$default='#223645' ).";
                --site_hadding_color: ".omnivus_any_color( 'site_hadding_color',$default='#002249' ).";
                --site_text_color: ".omnivus_any_color( 'site_text_color',$default='#223645' ).";
            }
        ";

        wp_add_inline_style( 'omnivus-global-default-style', $global_css );

    }
}
add_action( 'wp_enqueue_scripts', 'omnivus_global_style_load' );