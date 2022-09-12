<?php 
if ( ! function_exists( 'omnivus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function omnivus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * to change 'omnivus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'omnivus', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'mainmenu'    => esc_html__( 'Main Menu', 'omnivus' ),
		) );

		if (  'style_3' == omnivus_any_data('footer_bottom_style','style_1') ) {
			register_nav_menus( array(
				'footer_menu' => esc_html__( 'Footer Menu', 'omnivus' ),
			) );
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat'
		) );

		/**
		 * Adding Charity Image Size
		 */
		add_image_size( 'omnivus-post-thumb', 780, 450, array( 'top', 'center' ) );
		add_image_size( 'omnivus-related-thumb', 400, 400, array( 'center', 'center' ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'omnivus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'omnivus_custom_header_args', array(
			'default-image'          => '',
			'default-text-color'     => 'ffffff',
			'width'                  => 1920,
			'height'                 => 1280,
			'flex-height'            => true,
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style.
	 	 */
		add_editor_style( OMNIVUS_ROOT.'/assets/css/editor-style.css' );

		/**
		 * Detect Homepage
		 *
		 * @return boolean value
		 */
		if( !function_exists('omnivus_detect_homepage') ){
		    function omnivus_detect_homepage() {
		        /*If front page is set to display a static page, get the URL of the posts page.*/
		        $homepage_id = get_option( 'page_on_front' );

		        /*current page id*/
		        $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';

		        if( $homepage_id == $current_page_id ) {
		            return true;
		        } else {
		            return false;
		        }
		    }
		}
		
	}
endif;
add_action( 'after_setup_theme', 'omnivus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function omnivus_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'omnivus_content_width', 640 );
}
add_action( 'after_setup_theme', 'omnivus_content_width', 0 );