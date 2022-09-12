<?php

/**
*   Register Google Fonts.
*/

if( !function_exists('omnivus_get_google_font_url') ){
    function omnivus_get_google_font_url(){
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext'; 
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'omnivus' ) ) {
            $fonts[] = esc_html('Karla:400,700');
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => implode( '|', $fonts ),
                'subset' => $subsets,
            ),  '//fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }
}

/**
 * Enqueue scripts
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */

/**
 * Enqueue scripts and styles.
 */

if ( !function_exists('omnivus_scripts') ) :

	function omnivus_scripts() {

		/************************************
		*	    ALL CSS SCRIPTS HERE.       *
		*************************************/
        // wp_enqueue_style( 'omnivus-global-default-style', OMNIVUS_ROOT_CSS .'/global.css', '', OMNIVUS_VERSION, 'all' );
        /*----------------------------
            GOOGLE FONTS
        -----------------------------*/
        wp_enqueue_style( 'omnivus-google-font', omnivus_get_google_font_url() );
        
        /*----------------------------
            THEME DEFAULT STYLESHEET
        -----------------------------*/
		wp_enqueue_style( 'omnivus-style', get_stylesheet_uri(), array(), OMNIVUS_VERSION, 'all' );
        wp_enqueue_style( 'gilroy', OMNIVUS_ROOT_FONTS .'/fonts.css', array(), OMNIVUS_VERSION, 'all' );

        /*----------------------------
            PLUGINS
        -----------------------------*/
        wp_enqueue_style( 'animate', OMNIVUS_ROOT_CSS .'/plugins/animate.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'owl-carousel', OMNIVUS_ROOT_CSS .'/plugins/owl.carousel.css', array(), '2.0.0', 'all' );
        wp_enqueue_style( 'stellarnav', OMNIVUS_ROOT_CSS .'/plugins/stellarnav.min.css', array(), '2.0.0', 'all' );
        wp_enqueue_style( 'selectbox', OMNIVUS_ROOT_CSS .'/plugins/jquery.selectbox.css', array(), '2.0.0', 'all' );
        wp_enqueue_style( 'bootstrap', OMNIVUS_ROOT_CSS .'/plugins/bootstrap.min.css', array(), '3.3.7', 'all' );

        /*----------------------------
            FONTS ICON
        -----------------------------*/
        wp_enqueue_style( 'themify', OMNIVUS_ROOT_CSS .'/icons/themify-icons.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'fontawesome', OMNIVUS_ROOT_CSS .'/icons/font-awesome.min.css', array(), '5.15.3', 'all' );

        /*----------------------------
            MAIN STYLESHEET
        ----------------------------*/
        wp_enqueue_style( 'omnivus-global-default-style', OMNIVUS_ROOT_CSS .'/default.css', array(), OMNIVUS_VERSION, 'all' );
        wp_enqueue_style( 'omnivus-typography', OMNIVUS_ROOT_CSS .'/typography.css', array(), OMNIVUS_VERSION, 'all' );
		wp_enqueue_style( 'omnivus-header', OMNIVUS_ROOT_CSS .'/header.css', array(), OMNIVUS_VERSION, 'all' );
		wp_enqueue_style( 'omnivus-blog', OMNIVUS_ROOT_CSS .'/blog-and-pages.css', array(), OMNIVUS_VERSION, 'all' );
		wp_enqueue_style( 'omnivus-footer', OMNIVUS_ROOT_CSS .'/footer.css', array(), OMNIVUS_VERSION, 'all' );
		wp_enqueue_style( 'omnivus-main-style', OMNIVUS_ROOT_CSS .'/style.css', array(), OMNIVUS_VERSION, 'all' );


		/*************************************
            ALL JQUERY SCRIPTS HERE
		**************************************/
        wp_enqueue_script( 'bootstrap', OMNIVUS_ROOT_JS . '/vendor/bootstrap.min.js', array('jquery'), '3.3.7', true );
		wp_enqueue_script( 'jquery-effects-core' );
        wp_enqueue_script( 'owl-carousel', OMNIVUS_ROOT_JS . '/owl.carousel.min.js', array('jquery'), '2.0.0', true );
		wp_enqueue_script( 'wow', OMNIVUS_ROOT_JS . '/wow.min.js', array('jquery'), '1.1.2', true );
        wp_enqueue_script( 'stellarnav', OMNIVUS_ROOT_JS . '/stellarnav.min.js', array('jquery'), '2.0.0', true );
        wp_enqueue_script( 'selectbox', OMNIVUS_ROOT_JS . '/jquery.selectbox.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'fitvids', OMNIVUS_ROOT_JS . '/jquery.fitvids.js', array('jquery'), '1.1.0', true );
        wp_enqueue_script( 'placeholdem', OMNIVUS_ROOT_JS . '/placeholdem.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'menu-sticky', OMNIVUS_ROOT_JS . '/jquery.sticky.js', array('jquery'), '1.0.4', true );
        wp_enqueue_script( 'footer-reval', OMNIVUS_ROOT_JS . '/footer-reveal.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'resize-sensor', OMNIVUS_ROOT_JS . '/ResizeSensor.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'sticky-sidebar', OMNIVUS_ROOT_JS . '/theia-sticky-sidebar.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'masonry', array('jquery' , 'imagesloaded') );
		wp_enqueue_script( 'omnivus-active', OMNIVUS_ROOT_JS . '/main.js', array('jquery'), OMNIVUS_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

endif;
add_action( 'wp_enqueue_scripts', 'omnivus_scripts');
