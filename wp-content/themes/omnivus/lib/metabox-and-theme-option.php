<?php

define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_TAXONOMY', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );
define( 'CS_ACTIVE_METABOX', true  );
define( 'CS_ACTIVE_FRAMEWORK', true );


/**
 *  CSF METABOX INIT
 */

if ( !function_exists('omnivus_metabox_init') ) {
	function omnivus_metabox_init() {
		CSFramework_Metabox:: instance( array() );
	}
}

add_action( 'init', 'omnivus_metabox_init' );


if ( !function_exists('omnivus_theme_metaboxes') ) {
	/**
	 * [omnivus_theme_metaboxes description]
	 * @param  [type] $metaboxes [get all metaboxes form cs framework]
	 * @return [type]            [new all defined metaboxes array]
	 */
	function omnivus_theme_metaboxes( $metaboxes ) {
		/**
		 * [$options remove pre defined all old metaboxes]
		 * @var array
		 */
		$metaboxes = array();
		/**
		 * 	Add New Metabox In $options array.
		 */

		$metaboxes[]    = array(
			'id'        => '_omnivus_page_metabox',
			'title'     => esc_html__( 'Page Options', 'omnivus' ),
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'high',
			'sections'  => array(

				// begin section
				array(
					'id'     => 'page_header',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Header Option', 'omnivus' ),
					'name'   => 'page_header_meta',
					'fields' => array(
						array(
							'id'      => 'enable_barner',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Barner', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to show or hide page barner you can set here by toggle ( YES / NO ).', 'omnivus' ),
							'default' => true,
						),
						array(
							'id'         => 'enable_title',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Custom Title', 'omnivus' ),
							'desc'       => esc_html__( 'If you need custom page title you can set here.', 'omnivus' ),
							'default'    => false,
							'dependency' => array( 'enable_barner|enable_barner', '==|==', 'true|true' ),
						),
						array(
							'id'         => 'custom_title',
							'type'       => 'text',
							'title'      => esc_html__( 'Custom Page Title', 'omnivus' ),
							'desc'       => esc_html__( 'Set your preferred custom page title.', 'omnivus' ),
							'dependency' => array( 'enable_title|enable_barner', '==|==', 'true|true' ),
							'default'    => 'Your Title Here',
						),
						array(
							'id'         => 'enable_overlay',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Custom Overlay', 'omnivus' ),
							'default'    => false,
							'dependency' => array( 'enable_barner', '==', 'true' ),
						),
						array(
							'id'      => 'custom_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Barner Overlay', 'omnivus' ),
							'desc'    => esc_html__( 'Use a transparen image if you don\'t want use image you can set color', 'omnivus' ),
							'default' => array(
								'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#000c35',
							),
							'dependency' => array( 'enable_overlay|enable_barner', '==|==', 'true|true' ),
						),
						array(
							'id'         => 'overlay_opacity',
							'type'       => 'number',
							'title'      => esc_html__( 'Overlay Opacity', 'omnivus' ),
							'desc'       => esc_html__( 'Please use max value 90 in decimel. and minimum value 0.1', 'omnivus' ),
							'default'    => '70',
							'dependency' => array( 'enable_overlay|enable_barner', '==|==', 'true|true' ),
						),
					),
				),
				// end sections


		    	// begin section
			    array(
					'id'     => 'page_menu',
					'type'   => 'group',
					'title'  => esc_html__( 'Topbar & Main Menu', 'omnivus' ),
					'name'   => 'page_menu_meta',
					'fields' => array(
						array(
							'id'      => 'enable_header_styleing',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Menu Custom Style ?', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to change any header style you can check here it will be appear on this page.', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'menu_width',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Container Width', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu with form here you can set ( FULLWIDTH / CONTAINER )', 'omnivus' ),
							'options' => array(
								'container'                 => esc_html__( 'Container', 'omnivus' ),
								'container container__full' => esc_html__( 'Container Full Width', 'omnivus' ),
								'container-fluid'           => esc_html__( 'Full Width', 'omnivus' ),
						  	),
							'default'    => 'container-fluid',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_align',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Text Align', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu text align from here', 'omnivus' ),
							'options' => array(
								'left'   => 'Left',
								'center' => 'Center',
								'right'  => 'Right',
						  	),
							'default'    => 'center',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu color by color picker', 'omnivus' ),
							'default'    => '#ffffff',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_hover',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Hover Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu hover color by color picker', 'omnivus' ),
							'default'    => '#ffffff',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_sticky_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Sticky Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu sticky color by color picker', 'omnivus' ),
							'default'    => '#404873',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_sticky_hover_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Sticky Hover Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu sticky hover color by color picker', 'omnivus' ),
							'default'    => '#006de8',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_dropdown_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Dropdown Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu dropdown color by color picker', 'omnivus' ),
							'default'    => '#404873',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'menu_dropdown_hover_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Dropdown Hover Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu dropdown hover color by color picker', 'omnivus' ),
							'default'    => '#006de8',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),						
						array(
							'id'         => 'menu_dropdown_hover_background',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Menu Dropdown Hover Background Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the menu dropdown background color by color picker', 'omnivus' ),
							'default'    => '#f1fcff',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
					),
			    ),
			    // end sections

		    	// begin section
			    array(
					'id'     => 'page_footer',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Footer Option', 'omnivus' ),
					'name'   => 'page_footer_meta',
					'fields' => array(
					    array(
							'id'      => 'hide_footer',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Hide Footer ?', 'omnivus' ),
							'desc'    => esc_html__( 'If you want do not show the footer you can set here by ( YES / NO ).', 'omnivus' ),
							'default' => false,
					    ),
						array(
							'id'      => 'enable_footer_styleing',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Footer Styleing', 'omnivus' ),
							'desc'    => esc_html__( 'If you need custom style in page footer you can style here.', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'footer_background',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the footer backgound color from here and select image. Note: if image and color you can use at a time ( if not found image automatically get the color.)', 'omnivus' ),
							'default' => array(
								'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => 'cover',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'footer_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background Overlay', 'omnivus' ),
							'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the footer background overlay', 'omnivus' ),
							'default' => array(
								'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'footer_overlay_opacity',
							'type'       => 'number',
							'title'      => esc_html__( 'Overlay Opacity', 'omnivus' ),
							'desc'       => esc_html__( 'Set the background footer background overlay opacity input the max value 90 in decimel.', 'omnivus' ),
							'default'    => '01',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'footer_bottom_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Bottom Background', 'omnivus' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer bottom background.', 'omnivus' ),
							'default' => array(
								'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'text_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Footer Text Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set footer text color form here.', 'omnivus' ),
							'default'    => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'hidding_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Footer Hidding Color', 'omnivus' ),
							'desc'       => esc_html__( 'Set footer footer hidding color form here.', 'omnivus' ),
							'default'    => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'a_color',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Footer links color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the footer area link color', 'omnivus' ),
							'default'    => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'         => 'a_hover',
							'type'       => 'color_picker',
							'title'      => esc_html__( 'Footer links Hover color', 'omnivus' ),
							'desc'       => esc_html__( 'Set the footer area link hover color', 'omnivus' ),
							'default'    => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
					),
			    ),
			    // end sections

		    	// begin section
			    array(
					'id'     => 'page_custom_css',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Custom Css', 'omnivus' ),
					'name'   => 'page_css_meta',
					'fields' => array(
						array(
							'id'      => 'page_cs_css',
							'type'    => 'textarea',
							'title'   => esc_html__( 'Write Custom Css Here', 'omnivus' ),
							'desc'    => esc_html__( 'Write custom css here with css selector.', 'omnivus' ),
							'default' => '',
						),
					),
			    ),
			    // end sections
		    ),
		);

		return $metaboxes;
	}
}

add_filter( 'cs_metabox_options', 'omnivus_theme_metaboxes' );


/**
 *  CSF OPTION PANEL INIT
 */

if ( !function_exists('omnivus_theme_options_init') ) {
	function omnivus_theme_options_init(){
		$settings           = array(
		  'menu_title'      => esc_html__('Omnivus Options','omnivus'),
		  'menu_type'       => 'menu',
		  'menu_parent'     => 'themes.php',
		  'menu_slug'       => 'omnivus-options',
		  'ajax_save'       => true,
		  'show_reset_all'  => true,
		  'framework_title' => esc_html__('Omnivus WordPress Theme','omnivus').'<small>'.esc_html__( ' By TechBird', 'omnivus' ).'</small>',
		  'menu_icon'       => 'dashicons-admin-generic',
		  'menu_position'   => 2
		);
		CSFramework:: instance( $settings, array() );
	}
}

add_action('init','omnivus_theme_options_init');

if ( !function_exists('omnivus_theme_option_panel') ) {

	/**
	 * [omnivus_theme_option_panel description]
	 * @param  [type] $options [get all option form cs framework]
	 * @return [array]          [new all defined options array]
	 */
	function omnivus_theme_option_panel( $options ) {
		/**
		 * [$options remove pre defined all old options]
		 * @var array
		 */
		$options = array();
		/**
		 * 	Add New Option In $options array.
		 */

		/* HEADER */
		$options[]   = array(
			'name'     => 'header_section',
			'title'    => esc_html__( 'Header Section', 'omnivus' ),
			'icon'     => 'fa fa-home',
			'sections' => array(

			    // sub section
			    array(
					'name'   => 'theme_header_style',
					'title'  => esc_html__( 'Header Style', 'omnivus' ),
					'icon'   => 'fa fa-credit-card',
					'fields' => array(
						array(
							'id'      => 'enable_header_style',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Header Style', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable header style you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'header_style',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Header Style', 'omnivus' ),
							'desc'    => esc_html__( 'Select the header style which you want to show on your website.', 'omnivus' ),
							'options' => array(
								'header-1' => OMNIVUS_ROOT_IMAGE . '/header/header_1.png',
								'header-2' => OMNIVUS_ROOT_IMAGE . '/header/header_2.png',
								'header-3' => OMNIVUS_ROOT_IMAGE . '/header/header_3.png',
								'header-4' => OMNIVUS_ROOT_IMAGE . '/header/header_4.png',
								'header-5' => OMNIVUS_ROOT_IMAGE . '/header/header_5.png',
								'header-6' => OMNIVUS_ROOT_IMAGE . '/header/header_6.png',
							),
							'default' => 'header-1',
						),
					),
				),

			    // sub section
			    array(
					'name'   => 'top_bar',
					'title'  => esc_html__( 'Top Bar', 'omnivus' ),
					'icon'   => 'fa fa-bars',
					'fields' => array(
						array(
							'id'      => 'enable_topbar',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Topbar', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable topbar you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'         => 'phone_number',
							'type'       => 'text',
							'title'      => esc_html__( 'Phone Number', 'omnivus' ),
							'desc'       => esc_html__( 'Set the topbar contact phone number.', 'omnivus' ),
							'default'    => '+6100000000',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'         => 'email_address',
							'type'       => 'text',
							'title'      => esc_html__( 'Email Address', 'omnivus' ),
							'desc'       => esc_html__( 'Set the topbar contact email address.', 'omnivus' ),
							'default'    => 'example@gmail.com',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'      => 'top_bg_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Topbar Background Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the background by color picker', 'omnivus' ),
							'default' => 'rgba(255,255,255,0.01)',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'      => 'top_border_height',
							'type'    => 'number',
							'title'   => esc_html__( 'Top Border Height', 'omnivus' ),
							'desc'    => esc_html__( 'Set the top border height in decimel. (default is 1px) ', 'omnivus' ),
							'default' => '1',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'      => 'top_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Topbar Bottom Border Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the bottom border by color picker', 'omnivus' ),
							'default' => '#99c2f6',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'         => 'enable_social',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Social', 'omnivus' ),
							'desc'       => esc_html__( 'If you want to enable or disable top bar social profile you can set ( YES / NO )', 'omnivus' ),
							'default'    => false,
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
					),
				),

			    // sub section
			    array(
					'name'   => 'mainmenu',
					'title'  => esc_html__( 'Main Menu', 'omnivus' ),
					'icon'   => 'fa fa-sitemap',
					'fields' => array(
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'One Page Navigation Setting', 'omnivus' ),
						),
						array(
							'id'      => 'one_page_navigation',
							'type'    => 'switcher',
							'title'   => esc_html__( 'One Page Navigaton On ?', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable one page menu link effect it will be effect inside the page (#) links.', 'omnivus' ),
							'default' => false,
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Sticky', 'omnivus' ),
						),
						array(
							'id'      => 'sticky_menu',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Sticky Menu ?', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable menu sticky in header section you can set ( YES / NO )', 'omnivus' ),
							'default' => true,
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Action Buttons', 'omnivus' ),
						),
						array(
							'id'      => 'enable_search',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Search Button', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable search button in menu section you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_offcanvas',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable OffCanvas Sidebar Button', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable offcanvas button in menu section you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_cart_bubtton',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Curt Button', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable cart button in menu section you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_language_bubtton',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Language Button', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable Language button in menu section you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_action',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Action Button', 'omnivus' ),
							'desc'    => esc_html__( 'If you want to enable or disable action button in menu section you can set ( YES / NO )', 'omnivus' ),
							'default' => false,
						),
						array(
							'id'         => 'button_text',
							'type'       => 'text',
							'title'      => esc_html__( 'Button Text', 'omnivus' ),
							'desc'       => esc_html__( 'Set the button text here', 'omnivus' ),
							'default'    => 'Sign Up',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'         => 'button_url',
							'type'       => 'text',
							'title'      => esc_html__( 'Button Link', 'omnivus' ),
							'desc'       => esc_html__( 'Set the button link here', 'omnivus' ),
							'default'    => 'https://facebook.com/techbird.org',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'      => 'button_bg_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Button Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the button by color picker', 'omnivus' ),
							'default' => '#006de8',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'      => 'button_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Button Border Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the button border by color picker', 'omnivus' ),
							'default' => '#006de8',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'      => 'button_text_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Button Text Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the button border by color picker', 'omnivus' ),
							'default' => '#fff',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'      => 'button_border_height',
							'type'    => 'number',
							'title'   => esc_html__( 'Button Border', 'omnivus' ),
							'desc'    => esc_html__( 'Set the button border height in decimel. (default is 2px) ', 'omnivus' ),
							'default' => '2',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
							'id'      => 'button_border_radius',
							'type'    => 'number',
							'title'   => esc_html__( 'Button Border Radius', 'omnivus' ),
							'desc'    => esc_html__( 'Set the button border radius in decimel. (default is 0px) ', 'omnivus' ),
							'default' => '0',
							'dependency' => array( 'enable_action', '==', 'true' ),
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Width & Align', 'omnivus' ),
						),
						array(
							'id'      => 'menu_width',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Container Width', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu with form here you can set ( FULLWIDTH / CONTAINER )', 'omnivus' ),
							'options' => array(
								'container'                 => esc_html__( 'Container', 'omnivus' ),
								'container container__full' => esc_html__( 'Container Full Width', 'omnivus' ),
								'container-fluid'           => esc_html__( 'Full Width', 'omnivus' ),
						  	),
							'default' => 'container-fluid',
						),
						array(
							'id'      => 'menu_align',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Text Align', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu text align from here', 'omnivus' ),
							'options' => array(
								'left'   => 'Left',
								'center' => 'Center',
								'right'  => 'Right',
						  	),
							'default' => 'center',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Background', 'omnivus' ),
						),
						array(
							'id'      => 'menu_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu background form here.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Background Opacity', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu background opacity here use max value 99 and minimux value 1 in decimel.', 'omnivus' ),
							'default' => '01',
						),
						array(
							'id'      => 'sticky_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Sticky Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky background form here.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'sticky_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Sticky Background Opacity', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky background opacity here use max value 99 and minimux value 1 in decimel.', 'omnivus' ),
							'default' => '99',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Color', 'omnivus' ),
						),
						array(
							'id'      => 'menu_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu color by color picker', 'omnivus' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'menu_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Hover Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu hover color by color picker', 'omnivus' ),
							'default' => '#ffffff',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Sticky Color', 'omnivus' ),
						),
						array(
							'id'      => 'menu_sticky_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky color by color picker', 'omnivus' ),
							'default' => '#404873',
						),
						array(
							'id'      => 'menu_sticky_hover_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Hover Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky hover color by color picker', 'omnivus' ),
							'default' => '#006de8',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Dropdown Color & Hover', 'omnivus' ),
						),
						array(
							'id'      => 'menu_dropdown_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Dropdown Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu dropdown color by color picker', 'omnivus' ),
							'default' => '#404873',
						),
						array(
							'id'      => 'menu_dropdown_hover_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Dropdown Hover Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu dropdown hover color by color picker', 'omnivus' ),
							'default' => '#006de8',
						),						
						array(
							'id'      => 'menu_dropdown_hover_background',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Dropdown Hover Background Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the dropdown background color by color picker', 'omnivus' ),
							'default' => '#f1fcff',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Menu Border', 'omnivus' ),
						),
						array(
							'id'      => 'menu_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Border Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu border bottom color by color picker', 'omnivus' ),
							'default' => 'rgba(255,255,255,.15)',
						),
					),
				),


				// sub section 1
				array(
					'name'   => 'mobile_menu',
					'title'  => esc_html__( 'Mobile Menu', 'omnivus' ),
					'icon'   => 'fa fa-mobile',
					'fields' => array(
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Menu Background', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_menu_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu background form here.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'mobile_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Background Opacity', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu background opacity here use max value 99 and minimux value 1 in decimel.', 'omnivus' ),
							'default' => '99',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Menu Sticky Background', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_sticky_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Sticky Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky background form here.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'mobile_sticky_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Sticky Background Opacity', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu sticky background opacity here use max value 99 and minimux value 1 in decimel.', 'omnivus' ),
							'default' => '99',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Menu Color', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_menu_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu color by color picker', 'omnivus' ),
							'default' => '#404873',
						),
						array(
							'id'      => 'mobile_menu_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Active & Hover Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu item active &hover color by color picker', 'omnivus' ),
							'default' => '#006de8',
						),
						array(
							'id'      => 'mobile_menu_hover_background',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Active Background Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu active background color by color picker', 'omnivus' ),
							'default' => '#ffffff',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Menu Color & Background', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_menu_hamberger_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( ' Menu Hambarger Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu hamberger background color by color picker', 'omnivus' ),
							'default' => '#292929',
						),
						array(
							'id'      => 'mobile_sticky_menu_hamberger_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Sticky Menu Hambarger Background', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu hamberger color by color picker', 'omnivus' ),
							'default' => '#006de8',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Menu Border', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_menu_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Bottom Border Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the menu border bottom color by color picker', 'omnivus' ),
							'default' => 'rgba(255,255,255,.15)',
						),
					)
				),

				// sub section 1
				array(
					'name'   => 'logos',
					'title'  => esc_html__( 'Logo Upload', 'omnivus' ),
					'icon'   => 'far fa-file-image',
					'fields' => array(
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Main Image Logo', 'omnivus' ),
						),
						array(
							'id'      => 'logo',
							'type'    => 'image',
							'title'   => esc_html__( 'Upload Main Logo', 'omnivus' ),
							'desc'    => esc_html__( 'Upload main logo width 180px and height 65px.', 'omnivus' ),
							'default' => '',
							'help'    => esc_html__( 'Note: Please use logo image max width: 250px and max height 100px.', 'omnivus' ),
						),
						array(
							'id'      => 'sticky_logo',
							'type'    => 'image',
							'title'   => esc_html__( 'Upload Sticky Logo', 'omnivus' ),
							'desc'    => esc_html__( 'Upload sticky logo width 180px and height 65px.', 'omnivus' ),
							'default' => '',
							'help'    => esc_html__( 'Note: Please use logo image max width: 250px and max height 100px.', 'omnivus' ),
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Text Logo Color', 'omnivus' ),
						),
						array(
							'id'      => 'logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the text logo color by color picker.', 'omnivus' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'sticky_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Sticky Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the text logo sticky color by color picker.', 'omnivus' ),
							'default' => '#333333',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Mobile Text Logo Color', 'omnivus' ),
						),
						array(
							'id'      => 'mobile_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Color On Mobile', 'omnivus' ),
							'desc'    => esc_html__( 'Set the text logo color by color picker.', 'omnivus' ),
							'default' => '#333333',
						),
						array(
							'id'      => 'mobile_sticky_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Sticky Color On Mobile', 'omnivus' ),
							'desc'    => esc_html__( 'Set the text logo sticky color by color picker.', 'omnivus' ),
							'default' => '#006de8',
						),
					)
				),

			    // sub section 3
			    array(
					'name'   => 'sub_header_3',
					'title'  => 'Favicon Icon',
					'icon'   => 'fa fa-image',
					'fields' => array(
						array(
							'id'    => 'favicon_icon',
							'type'  => 'image',
							'title' => 'Set the favicon icon size ( 16px x 16px ) OR ( 32px x 32px )',
						),
					),
				),

			),
		);
		
		/* BLOG PAGE */
		$options[]    = array(
		    'name'   => 'blog_page_section',
		    'title'  => 'Blog Settings',
		    'icon'   => 'fa fa-book',
		    'type'   => 'group',
		    'fields' => array(
				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Blog Page Settings', 'omnivus' ),
				),
		      	array(
					'id'      => 'blog_page_title',
					'type'    => 'text',
					'title'   => esc_html__( 'Blog Page Title', 'omnivus' ),
					'desc'    => esc_html__( 'Set the main blog page title here like ( Our Blog )', 'omnivus' ),
					'default' => 'Blog Page',
		    	),
		     	 array(
					'id'      => 'blog_page_barner',
					'type'    => 'image',
					'title'   => 'Blog Page Barner',
					'desc'    => 'Set the main blog page barner image size (1920px x 1280px ) or ( 1920px x 1080px )',
					'default' => '',
		    	),
				array(
					'id'      => 'blog_page_overlay',
					'type'    => 'background',
					'title'   => esc_html__( 'Blog Page Overlay', 'omnivus' ),
					'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the blog page header overlay', 'omnivus' ),
					'default' => array(
						'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
						'repeat'     => 'repeat',
						'position'   => 'center center',
						'attachment' => 'scroll',
						'size'       => '',
						'color'      => '#000000',
					),
				),
		      	array(
			        'id'      => 'blog_page_overlay_opacity',
			        'type'    => 'number',
			        'title'   => esc_html__( 'Blog Page Overlay Opacity', 'omnivus' ),
			        'desc'    => esc_html__( 'Set the main blog page overlay opacity max value is 90 in decimel', 'omnivus' ),
			        'default' => 50,
		    	),
		      	array(
			        'id'      => 'header_textcolor',
			        'type'    => 'color_picker',
			        'title'   => esc_html__( 'Header Text Color', 'omnivus' ),
			        'desc'    => esc_html__( 'Set the header text color by color picker. NOTE: You can also change header text color form customizer panel.', 'omnivus' ),
			        'default' => '#ffffff',
		    	),
		      	array(
			        'id'      => 'header_text_align',
			        'type'    => 'select',
			        'title'   => esc_html__( 'Header Text Align', 'omnivus' ),
			        'desc'    => esc_html__( 'Set the header text alignment ( Left / Roght / Center )', 'omnivus' ),
			        'options' => array(
						'left'   => 'Left',
						'center' => 'Center',
						'right'  => 'Right',
				  	),
					'default' => 'center',
		    	),
		      	array(
			        'id'      => 'content_spaceing',
			        'type'    => 'number',
			        'title'   => esc_html__( 'Blog & Pages Content Spaceing Top / Bottom', 'omnivus' ),
			        'desc'    => esc_html__( 'Set the space in blog and page content. It will be appeard in top and bottom.', 'omnivus' ),
			        'default' => '100',
		    	),
		      	array(
			        'id'      => 'blog_excerpt_word',
			        'type'    => 'number',
			        'title'   => esc_html__( 'Blog Excerpt Word', 'omnivus' ),
			        'desc'    => esc_html__( 'Set the words that how many words you want to show in every blog post item.', 'omnivus' ),
			        'default' => '50',
		    	),
			    array(
					'id'      => 'sticky_sidebar',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Sticky Sidebar ?', 'omnivus' ),
					'desc'    => esc_html__( 'You can set sitcky blog page sidebar here. just set ( YES / NO ) for off OR on.', 'omnivus' ),
					'default' => true,
			    ),
				array(
					'id'      => 'enable_blog_page_sidebar',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Blog Page Sidebar', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable sidebar to single blog page you can set ( YES / NO )', 'omnivus' ),
					'default' => true,
				),
				array(
					'id'         => 'custom_blog_sidebar_layout',
					'type'       => 'select',
					'title'      => esc_html__( 'Blog Page Sidebar Layout', 'omnivus' ),
					'desc'       => esc_html__( 'Set your preferred sidebar.', 'omnivus' ),
					'options' => array(
						'left'   => 'Left Sidebar',
						'right'  => 'Right Sidebar',
					  ),
					'default'    => 'right',
					'dependency' => array( 'enable_blog_page_sidebar', '==', 'true' ),
				),
			    
				/**
				 * Single Post Setting
				 */
				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Single Post Setting', 'omnivus' ),
				),
				array(
					'id'      => 'enable_post_barner_title',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Post Custom Barner Title', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable post barner title to post title you can set ( YES / NO )', 'omnivus' ),
					'default' => false,
				),
				array(
					'id'         => 'custom_post_barner_title',
					'type'       => 'text',
					'title'      => esc_html__( 'Post Barner Title', 'omnivus' ),
					'desc'       => esc_html__( 'Set your preferred custom barner title.', 'omnivus' ),
					'default'    => esc_html__( 'News Details','omnivus' ),
					'dependency' => array( 'enable_post_barner_title', '==', 'true' ),
				),
				array(
					'id'      => 'show_dropcaps',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Show Dropcaps ?', 'omnivus' ),
					'desc'    => esc_html__( 'If you on dropcaps it will be appear in single blog page. just set ( YES / NO ) for off OR on.', 'omnivus' ),
					'default' => false,
			    ),
				array(
					'id'      => 'enable_post_sidebar',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Single Post Sidebar', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable sidebar to single blog page you can set ( YES / NO )', 'omnivus' ),
					'default' => true,
				),
				array(
					'id'         => 'custom_sidebar_layout',
					'type'       => 'select',
					'title'      => esc_html__( 'Single Post Sidebar Layout', 'omnivus' ),
					'desc'       => esc_html__( 'Set your preferred sidebar.', 'omnivus' ),
					'options' => array(
						'left'   => 'Left Sidebar',
						'right'  => 'Right Sidebar',
					  ),
					'default'    => 'right',
					'dependency' => array( 'enable_post_sidebar', '==', 'true' ),
				),
		    )
		);

    	/* PAGES  SETTING */
	    $options[] = array(
			'name'   => 'single_post_and_page_section',
			'title'  => esc_html__( 'Pages Settings', 'omnivus' ),
			'icon'   => 'fa fa-book',
			'fields' => array(
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Single Portfolio Settings', 'omnivus' ),
				),
				array(
					'id'      => 'enable_portfolio_barner_title',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Portfolio Custom Barner Title', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable portfolio barner title to portfolio title you can set ( YES / NO )', 'omnivus' ),
					'default' => false,
				),
				array(
					'id'         => 'custom_portfolio_barner_title',
					'type'       => 'text',
					'title'      => esc_html__( 'Portfolio Barner Title', 'omnivus' ),
					'desc'       => esc_html__( 'Set your preferred custom barner title.', 'omnivus' ),
					'default'    => esc_html__( 'Work Details','omnivus' ),
					'dependency' => array( 'enable_portfolio_barner_title', '==', 'true' ),
				),
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( '404 Error Page Setting', 'omnivus' ),
				),
				array(
					'id'      => 'error_page_img',
					'type'    => 'image',
					'title'   => esc_html__( 'Upload Error Page Image', 'omnivus' ),
					'desc'    => esc_html__( 'Upload error page image width 1280px and height 800px or larger.', 'omnivus' ),
				),
				array(
					'id'      => 'error_page_bg',
					'type'    => 'background',
					'title'   => esc_html__( '404 Page Background', 'omnivus' ),
					'desc'    => esc_html__( 'Upload a new background image or select color to set the error page background.', 'omnivus' ),
					'default' => array(
						'image'      => OMNIVUS_ROOT_IMAGE . '/404-bg.png',
						'repeat'     => 'no-repeat',
						'position'   => 'left center',
						'attachment' => 'scroll',
						'size'       => '',
						'color'      => '#ffffff',
					),
				),
				array(
					'id'         => 'error_text',
					'type'       => 'text',
					'title'      => esc_html__( '404 Error Page Text', 'omnivus' ),
					'desc'       => esc_html__( 'Set your 404 error title.', 'omnivus' ),
					'default'    => esc_html__( 'Oops! That page can&rsquo;t be found.', 'omnivus' )
				),
				array(
					'id'      => 'enable_404_search_button',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable 404 Search Button', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable 404 page button you can set ( YES / NO )', 'omnivus' ),
					'default' => true,
				),
			),
	    );

		/* Site Color */
	    $options[] = array(
			'name'   => 'site_color_section',
			'title'  => esc_html__( 'Color Settings', 'omnivus' ),
			'icon'   => 'fas fa-paint-brush',
			'fields' => array(
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Color Settings', 'omnivus' ),
				),
				array(
					'id'      => 'site_main_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Site Color', 'omnivus' ),
					'desc'    => esc_html__( 'Set the main site color', 'omnivus' ),
					'default' => '#006de8'
				),
				array(
					'id'      => 'site_body_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Body Color', 'omnivus' ),
					'desc'    => esc_html__( 'Set the body color', 'omnivus' ),
					'default' => '#223645'
				),
				array(
					'id'      => 'site_hadding_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Hadding Color', 'omnivus' ),
					'desc'    => esc_html__( 'Set the hadding color', 'omnivus' ),
					'default' => '#002249'
				),
				array(
					'id'      => 'site_text_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Text Color', 'omnivus' ),
					'desc'    => esc_html__( 'Set the text color', 'omnivus' ),
					'default' => '#223645'
				),
			),
	    );

		/* PRELOADER */
		$options[] = array(
		    'name'   => 'preloader_section',
		    'title'  => esc_html__( 'Preloader ON / OFF', 'omnivus' ),
		    'icon'   => 'fa fa-spinner',
		    'fields' => array(
				array(
					'id'      => 'enable_preloader',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Preloader', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable preloader you can set ( YES / NO )', 'omnivus' ),
					'default' => true,
				),
				array(
					'id'      => 'prloader_style',
					'type'    => 'image_select',
					'title'   => esc_html__( 'Select Preloader Style', 'omnivus' ),
					'desc'    => esc_html__( 'You can set specifc preloader style in every page form here.', 'omnivus' ),
					'options' => array(
						'style_1'  => OMNIVUS_ROOT_IMAGE . '/loader/loader_1.png',
						'style_2'  => OMNIVUS_ROOT_IMAGE . '/loader/loader_2.png',
						'style_3'  => OMNIVUS_ROOT_IMAGE . '/loader/loader_3.png',
						'style_4'  => OMNIVUS_ROOT_IMAGE .'/loader/loader_horizontal.gif',
						'style_5'  => OMNIVUS_ROOT_IMAGE .'/loader/loader_spinner.gif',
						'style_6'  => OMNIVUS_ROOT_IMAGE .'/loader/loader_spinner.svg',
						'style_7'  => OMNIVUS_ROOT_IMAGE .'/loader/loader_square_circle.gif',
						'style_8'  => OMNIVUS_ROOT_IMAGE .'/loader/loader_wave.gif',
						'style_9'  => OMNIVUS_ROOT_IMAGE .'/loader/loeader_square.gif',
						'style_10' => OMNIVUS_ROOT_IMAGE .'/loader/wave_preloader.svg',
						'style_11' => OMNIVUS_ROOT_IMAGE .'/loader/ajax_loader.svg',
						'style_12' => OMNIVUS_ROOT_IMAGE .'/loader/audio.svg',
						'style_13' => OMNIVUS_ROOT_IMAGE .'/loader/ball_triangle.svg',
						'style_14' => OMNIVUS_ROOT_IMAGE .'/loader/bars.svg',
						'style_15' => OMNIVUS_ROOT_IMAGE .'/loader/circle_pulse_rings.svg',
						'style_16' => OMNIVUS_ROOT_IMAGE .'/loader/circle_tail_spin.svg',
						'style_17' => OMNIVUS_ROOT_IMAGE .'/loader/circles.svg',
						'style_18' => OMNIVUS_ROOT_IMAGE .'/loader/flip_circle.svg',
						'style_19' => OMNIVUS_ROOT_IMAGE .'/loader/grid.svg',
						'style_20' => OMNIVUS_ROOT_IMAGE .'/loader/heart.svg',
						'style_21' => OMNIVUS_ROOT_IMAGE .'/loader/hearts_group.svg',
						'style_22' => OMNIVUS_ROOT_IMAGE .'/loader/horizontal_loader_2.svg',
						'style_23' => OMNIVUS_ROOT_IMAGE .'/loader/road_cross.svg',
						'style_24' => OMNIVUS_ROOT_IMAGE .'/loader/round_circle.svg',
						'style_25' => OMNIVUS_ROOT_IMAGE .'/loader/round_pulse.svg',
						'style_26' => OMNIVUS_ROOT_IMAGE .'/loader/simple_spainer.svg',
						'style_27' => OMNIVUS_ROOT_IMAGE .'/loader/spinner.svg',
						'style_28' => OMNIVUS_ROOT_IMAGE .'/loader/spinning_circles.svg',
						'style_29' => OMNIVUS_ROOT_IMAGE .'/loader/three_dots.svg',
					),
					'default'    => 'style_9',
					'dependency' => array( 'enable_preloader', '==', 'true' ),
				),
				array(
					'id'      => 'preloader_bg',
					'type'    => 'background',
					'title'   => esc_html__( 'Preloader Background', 'omnivus' ),
					'desc'    => esc_html__( 'Upload a new background image or select color to set the preloader background.', 'omnivus' ),
					'default' => array(
						'image'      => OMNIVUS_ROOT_IMAGE . '/pattarn.png',
						'repeat'     => 'repeat',
						'position'   => 'center center',
						'attachment' => 'scroll',
						'size'       => '',
						'color'      => '#ffffff',
					),
				),
				array(
					'id'      => 'preloader_text_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Preloader Text Color', 'omnivus' ),
					'desc'    => esc_html__( 'Set the preloader text color', 'omnivus' ),
					'default' => '#000000'
				),
		    ),
		);

		/* SCROLL TOP */
		$options[]    = array(
		    'name'   => 'scrolltotop_section',
		    'title'  => esc_html__( 'Scroll Top Button', 'omnivus' ),
		    'icon'   => 'fa fa-arrow-up',
		    'fields' => array(
				array(
					'id'      => 'enable_scroll_top',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Scroll Top', 'omnivus' ),
					'desc'    => esc_html__( 'If you want to enable or disable scroll to top button you can set ( YES / NO )', 'omnivus' ),
					'default' => true,
				),
				array(
					'id'      => 'scroll_top_eassing',
					'type'    => 'select',
					'title'   => esc_html__( 'Scroll Top Animation', 'omnivus' ),
					'desc'    => esc_html__( 'You can set specifc eassing animation style in every page form here.', 'omnivus' ),
					'options' => array(
						'easeInSine'       => 'easeInSine',
						'easeOutSine'      => 'easeOutSine',
						'easeInOutSine'    => 'easeInOutSine',
						'easeInQuad'       => 'easeInQuad',
						'easeOutQuad'      => 'easeOutQuad',
						'easeInOutQuad'    => 'easeInOutQuad',
						'easeInCubic'      => 'easeInCubic',
						'easeOutCubic'     => 'easeOutCubic',
						'easeInOutCubic'   => 'easeInOutCubic',
						'easeInQuart'      => 'easeInQuart',
						'easeOutQuart'     => 'easeOutQuart',
						'easeInOutQuart'   => 'easeInOutQuart',
						'easeInQuint'      => 'easeInQuint',
						'easeOutQuint'     => 'easeOutQuint',
						'easeInOutQuint'   => 'easeInOutQuint',
						'easeInExpo'       => 'easeInExpo',
						'easeOutExpo'      => 'easeOutExpo',
						'easeInOutExpo'    => 'easeInOutExpo',
						'easeInCirc'       => 'easeInCirc',
						'easeOutCirc'      => 'easeOutCirc',
						'easeInOutCirc'    => 'easeInOutCirc',
						'easeInBack'       => 'easeInBack',
						'easeOutBack'      => 'easeOutBack',
						'easeInOutBack'    => 'easeInOutBack',
						'easeInElastic'    => 'easeInElastic',
						'easeOutElastic'   => 'easeOutElastic',
						'easeInOutElastic' => 'easeInOutElastic',
						'easeInBounce'     => 'easeInBounce',
						'easeOutBounce'    => 'easeOutBounce',
						'easeInOutBounce'  => 'easeInOutBounce',
					),
					'dependency' => array( 'enable_scroll_top', '==', 'true' ),
					'default'    => 'easeOutExpo',
				),
		    ),
		);

		/* FOOTER */
		$options[]    = array(
		    'name'     => 'footer_section',
		    'title'    => esc_html__( 'Footer Section', 'omnivus' ),
		    'icon'     => 'fa fa-cog',
		    'sections' => array(

		    	// Start Section.
				array(
					'name'   => 'sub_footer_1',
					'title'  => esc_html__( 'Footer Color & Background', 'omnivus' ),
					'icon'   => 'fa fa-paint-brush',
					'fields' => array(
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Footer Settings', 'omnivus' ),
						),
					    array(
							'id'      => 'hide_footer',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Hide Footer ?', 'omnivus' ),
							'desc'    => esc_html__( 'If you want do not show the footer you can set here by ( YES / NO ).', 'omnivus' ),
							'default' => false,
					    ),
						array(
							'id'      => 'footer_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background', 'omnivus' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer background.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'no-repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => 'cover',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'footer_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background Overlay', 'omnivus' ),
							'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the footer background overlay', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'footer_overlay_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Overlay Opacity', 'omnivus' ),
							'desc'    => esc_html__( 'Set the background footer background overlay opacity input the max value 90 in decimel.', 'omnivus' ),
							'default' => '50',
						),
						array(
						  'type'    => 'subheading',
						  'content' => esc_html__( 'Footer Text & Link Color', 'omnivus' ),
						),
						array(
							'id'      => 'text_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Text Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set footer text color form here.', 'omnivus' ),
							'default' => '#c2d1e2',
						),
						array(
							'id'      => 'hidding_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Hidding Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set footer footer hidding color form here.', 'omnivus' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'a_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the footer area link color', 'omnivus' ),
							'default' => '#c2d1e2',
						),
						array(
							'id'      => 'a_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links Hover color', 'omnivus' ),
							'desc'    => esc_html__( 'Set the footer area link hover color', 'omnivus' ),
							'default' => '#006de8',
						),
					),
				),
				// End Section.

				// Start Section.
				array(
					'name'   => 'sub_footer_2',
					'title'  => esc_html__( 'Footer Bottom Style', 'omnivus' ),
					'icon'   => 'fa fa-bars',
					'fields' => array(
						array(
							'id'      => 'footer_bottom_style',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Select Footer Bottom Style', 'omnivus' ),
							'desc'    => esc_html__( 'You can chose and select footer bottom type here..', 'omnivus' ),
							'options' => array(
								'style_1' => OMNIVUS_ROOT_IMAGE . '/footer/footer_1.png',
								'style_2' => OMNIVUS_ROOT_IMAGE . '/footer/footer_2.png',
								'style_3' => OMNIVUS_ROOT_IMAGE . '/footer/footer_3.png',
							),
							'default' => 'style_1',
						),
						array(
							'id'      => 'footer_bottom_padding',
							'type'    => 'number',
							'title'   => esc_html__( 'Footer Bottom Space', 'omnivus' ),
							'desc'    => esc_html__( 'Set the space ( top / bottom ) in footer bottom.', 'omnivus' ),
							'default' => '30',
						),
						array(
							'id'      => 'footer_bottom_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Bottom Background', 'omnivus' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer bottom background.', 'omnivus' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'footer_bottom_border_height',
							'type'    => 'number',
							'title'   => esc_html__( 'Footer Bottom Border Height', 'omnivus' ),
							'desc'    => esc_html__( 'Set the footer bottome border height in decimel. ( default is 2 ) ', 'omnivus' ),
							'default' => '2',
						),
						array(
							'id'      => 'footer_bottom_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Bottom Border Color', 'omnivus' ),
							'desc'    => esc_html__( 'Set footer bottom border color form here.', 'omnivus' ),
							'default' => '#182044',
						),
					),
				),
				// End Section.
				
				// Start Section.
				array(
					'name'   => 'sub_footer_3',
					'title'  => esc_html__( 'Footer Copyright', 'omnivus' ),
					'icon'   => 'fa fa-copyright',
					'fields' => array(
						array(
							'id'       => 'copyright_text',
							'type'     => 'wysiwyg',
							'title'    => esc_html__( 'Footer Copyright', 'omnivus' ),
							'desc'     => esc_html__( 'Set the footer copyright text','omnivus' ),
							'settings' => array(
							    'textarea_rows' => 10,
							    'tinymce'       => true,
							    'media_buttons' => false,
						  	),
						  	'default' => 'Copryright &copy; TechBird All Right Reserved.',
						),
					),
				),
				// End Section.
		    ),
		);	

		/* SOCIAL */
		$options[]    = array(
		    'name'   => 'social_section',
		    'title'  => esc_html__( 'Social Section', 'omnivus' ),
		    'icon'   => 'fa fa-share-alt',
		    'fields' => array(
				array(
					'id'           => 'social_bookmark',
					'type'         => 'group',
					'title'        => esc_html__( 'Add Social Bookmark', 'omnivus' ),
					'button_title' => esc_html__( 'Add New Bookmark', 'omnivus' ),
					'desc'         => esc_html__( 'Set the social bookmark icon and link here. Esay to use it just click the add icon button and search your social icon and set the url for the profile .', 'omnivus' ),
					'fields'       => array(
						array(
							'id'      => 'bookmark_icon',
							'type'    => 'icon',
							'title'   => esc_html__( 'Social Icon', 'omnivus' ),
							'desc'    => esc_html__( 'Set the social profile icon like ( facebook, twitter, linkedin, youtube ect. )', 'omnivus' ),
							'default' => 'fab fa-facebook-f'
					    ),
					    array(
							'id'      => 'bookmark_url',
							'type'    => 'text',
							'title'   => esc_html__( 'Profile Url', 'omnivus' ),
							'desc'    => esc_html__( 'Type the social profile url lik http://facebook.com/yourpage. also you can add (facebook, twitter, linkedin, youtube etc.)', 'omnivus' ),
							'default' => '#'
					    ),
				  	),
				),
			    array(
					'id'      => 'enable_footer_social',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Footer Social', 'omnivus' ),
					'desc'    => esc_html__( 'Set the footer social hide or not.', 'omnivus' ),
					'default' => false,
			    ),
			    array(
					'id'         => 'social_color',
					'type'       => 'color_picker',
					'title'      => esc_html__( 'Footer Social Color', 'omnivus' ),
					'desc'       => esc_html__( 'Set the footer social bookmark color from here.', 'omnivus' ),
					'default'    => '#ffffff',
					'dependency' => array( 'enable_footer_social', '==', 'true' ),
			    ),
			    array(
					'id'         => 'social_hover_color',
					'type'       => 'color_picker',
					'title'      => esc_html__( 'Footer Social Hover Color', 'omnivus' ),
					'desc'       => esc_html__( 'Set the footer social bookmark hover color from here.', 'omnivus' ),
					'default'    => '#006de8',
					'dependency' => array( 'enable_footer_social', '==', 'true' ),
			    ),
		    ),
		);


    	/* CUSTOM CSS */
	    $options[] = array(
			'name'   => 'custom_css_section',
			'title'  => esc_html__( 'Custom Css', 'omnivus' ),
			'icon'   => 'fab fa-css3',
			'fields' => array(
				array(
					'id'    => 'custom_css',
					'type'  => 'textarea',
					'title' => esc_html__( 'Write Custom Css Here', 'omnivus' ),
					'desc'  => esc_html__( 'Write custom css here with css selector. this css will be applied in all pages and post.', 'omnivus' ),
				),
			),
	    );

		/* BACKUPS */
		$options[]    = array(
		    'name'   => 'backup_section',
		    'title'  => esc_html__( 'Backup Options', 'omnivus' ),
		    'icon'   => 'fas fa-share-square',
		    'fields' => array(
			    array(
					'id'    => 'backup_options',
					'type'  => 'backup',
					'title' => esc_html__( 'Backup Your All Options', 'omnivus' ),
					'desc'  => esc_html__( 'If you want to take backup your option you can backup here.', 'omnivus' ),
			    ),
		    ),
		);

	  	return $options;
	}
}

add_filter( 'cs_framework_options', 'omnivus_theme_option_panel' );