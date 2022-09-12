<?php
/**
 * Plugin Name: Ultimate Addon For Elementor
 * Description: Ultimate Addon For Elementor is a full plugin for colleciton of elementor widgets.
 * Plugin URI: https://techbird.org/omnivus
 * Author: TechBird
 * Author URI: http://techbird.org
 * Version: 1.2.0
 * License: GPL2
 * Text Domain: ultimate
 * Domain Path: /languages/
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Ultimate_Elementor_Extension {

	const VERSION = '1.2.0';
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '5.7';

	private static $_instance = null;
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}
	public function init() {

		load_plugin_textdomain( 'ultimate' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add new Elementor Categories
		add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

		// Add Plugin Widgets Actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		//add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );		

		// Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', array ( $this, 'ultimate_editor_styles' ) );

		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

		// Register Widget Scripts
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

		// Default Script
		add_action( 'wp_enqueue_scripts', array ( $this, 'ultimate_default_scripts' ) );

		if (file_exists(dirname(__FILE__) . '/post/texonomy.php' )) {
			require_once(dirname(__FILE__) . '/post/texonomy.php' );
		}
		if (file_exists(dirname(__FILE__) . '/inc/custom-functions.php' )) {
			require_once(dirname(__FILE__) . '/inc/custom-functions.php' );
		}
	}

	/*******************************
	 * 	ADD ASSETS
	 *******************************/

	public function ultimate_editor_styles(){
		wp_enqueue_style('ultimate-editor', plugins_url('assets/css/ultimate-editor.css', __FILE__));
	}

	public function ultimate_default_scripts(){
		wp_enqueue_style('ultimate-widgets',plugins_url( '/assets/css/widgets.css', __FILE__ ), '', self::VERSION, 'all');
		wp_enqueue_style('overwrite',   plugins_url( '/assets/css/overwrite.css', __FILE__ ), '', self::VERSION, 'all');
	}

	public function ultimate_enqueue_fronted_assets(){
		wp_enqueue_style('owl-carousel', plugins_url('assets/css/owl.carousel.css', __FILE__));
	}

	/**
	 * Register Widget Scripts
	 *
	 * Register custom scripts required to run Skima Core.
	 *
	 * @since 1.6.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function register_widget_scripts() {
        wp_enqueue_script( 'appear', plugins_url('assets/js/appear.js', __FILE__), array('jquery'), '', true );

        wp_enqueue_script( 'owl-carousel', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'slick', plugins_url('assets/js/slick.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'swiper', plugins_url('assets/js/swiper.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'modal-video', plugins_url('assets/js/modal-video.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'TimeCircle', plugins_url('assets/js/TimeCircles.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'roadmap', plugins_url('assets/js/roadmap.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'timeline', plugins_url('assets/js/timeline.min.js', __FILE__), array('jquery'), '', true );

        wp_enqueue_script( 'isotope', plugins_url('assets/js/isotope.pkgd.min.js', __FILE__), array('jquery','imagesloaded'), '', true );
        wp_enqueue_script( 'masonry', array('jquery' , 'imagesloaded') );
        wp_enqueue_script( 'ajaxchimp', plugins_url('assets/js/ajaxchimp.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'anime', plugins_url('assets/js/anime.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'ultimate-effect', plugins_url('assets/js/ultimate-effect.min.js', __FILE__), array('jquery'), '', true );
        wp_enqueue_script( 'ultimate-core', plugins_url('assets/js/active.js', __FILE__), array('jquery'), '', true );
	}

	/**
	 * Register Widget Styles
	 *
	 * Register custom styles required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function enqueue_widget_styles() {
        wp_enqueue_style('owl-carousel', plugins_url('assets/css/owl.carousel.css', __FILE__));
        wp_enqueue_style('slick', plugins_url('assets/css/slick.min.css', __FILE__));
        wp_enqueue_style('swiper', plugins_url('assets/css/swiper.min.css', __FILE__));
        wp_enqueue_style('modal-video', plugins_url('assets/css/modal-video.min.css', __FILE__));
        wp_enqueue_style('TimeCircle', plugins_url('assets/css/TimeCircles.css', __FILE__));
        wp_enqueue_style('roadmap', plugins_url('assets/css/roadmap.min.css', __FILE__));
        wp_enqueue_style('timeline', plugins_url('assets/css/timeline.min.css', __FILE__));

        wp_enqueue_style('ultimate-widgets', plugins_url('assets/css/widgets.css', __FILE__));
	}


	/***************************
	 * 	VERSION CHECK
	 * *************************/
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ultimate' ),
			'<strong>' . esc_html__( 'Elementor Ultimate Addons', 'ultimate' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ultimate' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**************************
	 * 	MISSING NOTICE
	 ***************************/
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ultimate' ),
			'<strong>' . esc_html__( 'Elementor Ultimate Addons', 'ultimate' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ultimate' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/****************************
	 * 	PHP VERSION NOTICE
	 ****************************/
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ultimate' ),
			'<strong>' . esc_html__( 'Elementor Ultimate Addons', 'ultimate' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'ultimate' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/****************************
	 * 	INIT WIDGETS
	 ****************************/
	public function init_widgets() {
		$this->ultimate_widgets();
		$this->ultimate_widgets_register();
	}

	public function ultimate_widgets(){
		/*---------------------------
			Include Widget files
		-----------------------------*/
		require_once( __DIR__ . '/widgets/adv-accordion.php' );
		require_once( __DIR__ . '/widgets/area-title.php' );
		require_once( __DIR__ . '/widgets/box.php' );
		require_once( __DIR__ . '/widgets/position-element.php' );
		require_once( __DIR__ . '/widgets/team.php' );
		require_once( __DIR__ . '/widgets/post-carousel.php' );
		require_once( __DIR__ . '/widgets/portfolio-carousel.php' );
		require_once( __DIR__ . '/widgets/subscriber-form.php' );
		require_once( __DIR__ . '/widgets/tab-price.php' );
		require_once( __DIR__ . '/widgets/price-table.php' );
		require_once( __DIR__ . '/widgets/shortcode.php' );
		require_once( __DIR__ . '/widgets/image-carousel.php' );
		require_once( __DIR__ . '/widgets/download-button.php' );
		require_once( __DIR__ . '/widgets/video.php' );
		require_once( __DIR__ . '/widgets/video-popup-button.php' );
		require_once( __DIR__ . '/widgets/counter.php' );
		require_once( __DIR__ . '/widgets/navigation-menu.php' );
		require_once( __DIR__ . '/widgets/countdown-circle.php' );
		require_once( __DIR__ . '/widgets/timeline.php' );
	}
	public function ultimate_widgets_register(){

		/**
		 * NOTE: If you use ( use \Elementor\Plugin as Plugin; ) you need to set namespace before instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register( new Widget_Class() );
		 * and If you use ( namespace Elementor ) No need instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register( new \Elementor\Widget_Class() );
		 */


		Plugin::instance()->widgets_manager->register( new Ultimate_Adv_Accordion() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Area_Title() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Box_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Positions_Element() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Teams() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Post_Carousel() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Portfolio_Carousel() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Subscriber_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Price_Tabs_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Pricing_Table() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Shortcode_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Image_Carousel() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Download_Button() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Widget_Video() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Video_Button() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Counter_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Menu_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Countdown_Circle_Widget() );
		Plugin::instance()->widgets_manager->register( new Ultimate_Timeline_Widget() );
	}

	/******************************
	 * 	INIT CONTROLS
	 ******************************/
	public function init_controls() {
		/*---------------------------
			Include Control files
		---------------------------*/
		//require_once( __DIR__ . '/controls/control.php' );

		/*---------------------------
			Register control
		---------------------------*/
		//Plugin::$instance->controls_manager->register_control( 'control-type-', new \Ultimate_Control() );
	}

	/*******************************
	 * 	ADD CUSTOM CATEGORY
	 *******************************/
	public function add_elementor_category()
	{
		Plugin::instance()->elements_manager->add_category( 'ultimate-addons', array(
			'title' => __( 'Ultimate Addons', 'ultimate' ),
			'icon'  => 'fa fa-plug',
		), 1 );
	}


	/******************************
	 * 	ALL INCLUDES
	******************************/
	public function includes() {

	}
}
Ultimate_Elementor_Extension::instance();
