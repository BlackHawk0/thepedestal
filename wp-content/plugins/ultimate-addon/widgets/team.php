<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ultimate_Teams extends Widget_Base {

	public function get_name() {
		return 'UltimateTeams';
	}

	public function get_title() {
		return __( 'Teams', 'ultimate' );
	}

	public function get_icon() {
		return 'eicon-person uladdon-omnivus';
	}

	public function get_categories() {
		return array('ultimate-addons');
	}

	public function get_script_depends() {
		return[
			'owl-carousel',
		];
	}
	public function get_style_depends() {
		return[
			'owl-carousel',
			'ultimate-core',
		];
	}

	public static function team_style(){
		return [
			'team__style__6'      => 'Team Style 1',
			'team__style__7'      => 'Team Style 2',
			'team__custom__style' => 'Team Custom Style',
		];
	}

	protected function register_controls() {

		/******************************
		 * 	CONTENT SECTION
		 ******************************/
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Type
		$this->add_control(
			'team_style',
			[
				'label'   => __( 'Team Style', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'team__style__6',
				'options' => self::team_style(),
			]
		);

		// Socials
		$this->add_control(
			'slider_on',
			[
				'label'        => __( 'Slider ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'ultimate' ),
				'label_off'    => __( 'No', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'separator'=>'before',
			]
		);

		$repeater = new Repeater();

		// Member Name
		$repeater->add_control(
			'member_thumb',
			[
				'label'   => __( 'Member Thumb', 'ultimate' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size:: get_type(),
			[
				'name'    => 'member_thumb_size',
				'default' => 'thumbnail',
			]
		);

		// Member Name
		$repeater->add_control(
			'member_name',
			[
				'label'       => __( 'Member Name', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Member Name', 'ultimate' ),
			]
		);

		// Member Designation
		$repeater->add_control(
			'designation',
			[
				'label'       => __( 'Designation', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Designation Or Company', 'ultimate' ),
			]
		);

		// Description
		$repeater->add_control(
			'description',
			[
				'label'       => __( 'Description', 'ultimate' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description.', 'ultimate' ),
			]
		);

		// Socials
		$repeater->add_control(
			'add_social',
			[
				'label'        => __( 'Add Social ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'ultimate' ),
				'label_off'    => __( 'No', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		// Facebook
		$repeater->add_control(
			'facebook_url',
			[
				'label'         => __( 'Facebook Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://facebook.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// Twitter
		$repeater->add_control(
			'twitter_url',
			[
				'label'         => __( 'Twitter Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://twitter.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// Youtube
		$repeater->add_control(
			'youtube_url',
			[
				'label'         => __( 'Youtube Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://youtube.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// vimeo
		$repeater->add_control(
			'vimeo_url',
			[
				'label'         => __( 'Vimeo Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://vimeo.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// Instagram
		$repeater->add_control(
			'instagram_url',
			[
				'label'         => __( 'Instagram Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://instagram.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// linkedin
		$repeater->add_control(
			'linkedin_url',
			[
				'label'         => __( 'Linkedin Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://linkedin.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// pinterest
		$repeater->add_control(
			'pinterest_url',
			[
				'label'         => __( 'Pinterest Url', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://pinterest.com/...', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition' => [
					'add_social' => 'yes',
				]
			]
		);

		// Items
		$this->add_control(
			'team_content',
			[
				'label'   => __( 'Members Items', 'ultimate' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'member_name' => __( 'Ashraful Sarkar', 'ultimate' ),
						'designation' => __( 'Web Developer' ),
					],
				],
				'title_field' => '{{{ member_name }}}',
				'separator'=>'before',
			]
		);

		$this->end_controls_section();

		/***********************************
		 * 	WITHOUT SLIDER OPTIONS SECTION
		 ***********************************/

		$this->start_controls_section(
			'without_options_section',
			[
				'label' => __( 'Options Settings', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => '',
				],
			]
		);

			$this->add_responsive_control(
				'per_column',
				[
					'label'   => __( 'Column Show', 'ultimate' ),
					'type'    => Controls_Manager::SLIDER,
					'size_units' => [ 'fr' ],
					'range' => [
						'fr' => [
							'min' => 1,
							'max' => 10,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'fr',
						'size' => 3,
					],
					'selectors' => [
						'{{WRAPPER}} .team-normal-grid' => 'grid-template-columns: repeat({{SIZE}}, 1fr);',
					],
				]
			);

			$this->add_control(
				'column_gap',
				[
					'label' => esc_html__( 'Column Gap', 'plugin-name' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 16,
					],
					'selectors' => [
						'{{WRAPPER}} .team-normal-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);



		$this->end_controls_section();

		/******************************
		 * 	SLIDER OPTIONS SECTION
		 ******************************/
		$this->start_controls_section(
			'options_section',
			[
				'label' => __( 'Slider Options', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => 'yes',
				],
			]
		);

			// Item On Large ( 1920px )
			$this->add_control(
				'item_on_large',
				[
					'label'      => __( 'Item In large Device', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 3,
					],
				]
			);

			// Item On Medium ( 1200px )
			$this->add_control(
				'item_on_medium',
				[
					'label'      => __( 'Item In Medium Device', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 3,
					],
				]
			);

			// Item On Tablet ( 780px )
			$this->add_control(
				'item_on_tablet',
				[
					'label'      => __( 'Item In Tablet Device', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'size' => 2,
					],
				]
			);

			// Item On Large ( 480px )
			$this->add_control(
				'item_on_mobile',
				[
					'label'      => __( 'Item In Mobile Device', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 1,
							'max'  => 10,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 1,
					],
				]
			);

			// Stage Padding
			$this->add_control(
				'stage_padding',
				[
					'label'      => __( 'Stage Padding', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 0,
					],
				]
			);

			// Item Margin
			$this->add_control(
				'item_margin',
				[
					'label'      => __( 'Item Margin', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						],
					],
					'default' => [
						'size' => 0,
					],
				]
			);

			// Slide Autoplay
			$this->add_control(
				'autoplay',
				[
					'label'   => __( 'Slide Autoplay', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Autoplay Timeout
			$this->add_control(
				'autoplaytimeout',
				[
					'label'      => __( 'Autoplay Timeout', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 500,
							'max'  => 10000,
							'step' => 100,
						],
					],
					'default' => [
						'size' => 3000,
					],
				]
			);

			// Slide Speed
			$this->add_control(
				'slide_speed',
				[
					'label'      => __( 'Slide Speed', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 500,
							'max'  => 10000,
							'step' => 100,
						],
					],
					'default' => [
						'size' => 1000,
					],
				]
			);

			// Slide Animation
			$this->add_control(
				'slide_animation',
				[
					'label'   => __( 'Slide Animation', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'no',
					'options' => [
						'yes' => __( 'Yes', 'ultimate' ),
						'no'  => __( 'No', 'ultimate' ),
					],
				]
			);

			// Slide In Animation
			$this->add_control(
				'slide_animate_in',
				[
					'label'   => __( 'Slide Animate In', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'fadeIn',
					'options' => [
						'bounce'             => __('bounce','ultimate'),
						'flash'              => __('flash','ultimate'),
						'pulse'              => __('pulse','ultimate'),
						'rubberBand'         => __('rubberBand','ultimate'),
						'shake'              => __('shake','ultimate'),
						'headShake'          => __('headShake','ultimate'),
						'swing'              => __('swing','ultimate'),
						'tada'               => __('tada','ultimate'),
						'wobble'             => __('wobble','ultimate'),
						'jello'              => __('jello','ultimate'),
						'heartBeat'          => __('heartBeat','ultimate'),
						'bounceIn'           => __('bounceIn','ultimate'),
						'bounceInDown'       => __('bounceInDown','ultimate'),
						'bounceInLeft'       => __('bounceInLeft','ultimate'),
						'bounceInRight'      => __('bounceInRight','ultimate'),
						'bounceInUp'         => __('bounceInUp','ultimate'),
						'bounceOut'          => __('bounceOut','ultimate'),
						'bounceOutDown'      => __('bounceOutDown','ultimate'),
						'bounceOutLeft'      => __('bounceOutLeft','ultimate'),
						'bounceOutRight'     => __('bounceOutRight','ultimate'),
						'bounceOutUp'        => __('bounceOutUp','ultimate'),
						'fadeIn'             => __('fadeIn','ultimate'),
						'fadeInDown'         => __('fadeInDown','ultimate'),
						'fadeInDownBig'      => __('fadeInDownBig','ultimate'),
						'fadeInLeft'         => __('fadeInLeft','ultimate'),
						'fadeInLeftBig'      => __('fadeInLeftBig','ultimate'),
						'fadeInRight'        => __('fadeInRight','ultimate'),
						'fadeInRightBig'     => __('fadeInRightBig','ultimate'),
						'fadeInUp'           => __('fadeInUp','ultimate'),
						'fadeInUpBig'        => __('fadeInUpBig','ultimate'),
						'fadeOut'            => __('fadeOut','ultimate'),
						'fadeOutDown'        => __('fadeOutDown','ultimate'),
						'fadeOutDownBig'     => __('fadeOutDownBig','ultimate'),
						'fadeOutLeft'        => __('fadeOutLeft','ultimate'),
						'fadeOutLeftBig'     => __('fadeOutLeftBig','ultimate'),
						'fadeOutRight'       => __('fadeOutRight','ultimate'),
						'fadeOutRightBig'    => __('fadeOutRightBig','ultimate'),
						'fadeOutUp'          => __('fadeOutUp','ultimate'),
						'fadeOutUpBig'       => __('fadeOutUpBig','ultimate'),
						'flip'               => __('flip','ultimate'),
						'flipInX'            => __('flipInX','ultimate'),
						'flipInY'            => __('flipInY','ultimate'),
						'flipOutX'           => __('flipOutX','ultimate'),
						'flipOutY'           => __('flipOutY','ultimate'),
						'lightSpeedIn'       => __('lightSpeedIn','ultimate'),
						'lightSpeedOut'      => __('lightSpeedOut','ultimate'),
						'rotateIn'           => __('rotateIn','ultimate'),
						'rotateInDownLeft'   => __('rotateInDownLeft','ultimate'),
						'rotateInDownRight'  => __('rotateInDownRight','ultimate'),
						'rotateInUpLeft'     => __('rotateInUpLeft','ultimate'),
						'rotateInUpRight'    => __('rotateInUpRight','ultimate'),
						'rotateOut'          => __('rotateOut','ultimate'),
						'rotateOutDownLeft'  => __('rotateOutDownLeft','ultimate'),
						'rotateOutDownRight' => __('rotateOutDownRight','ultimate'),
						'rotateOutUpLeft'    => __('rotateOutUpLeft','ultimate'),
						'rotateOutUpRight'   => __('rotateOutUpRight','ultimate'),
						'hinge'              => __('hinge','ultimate'),
						'jackInTheBox'       => __('jackInTheBox','ultimate'),
						'rollIn'             => __('rollIn','ultimate'),
						'rollOut'            => __('rollOut','ultimate'),
						'zoomIn'             => __('zoomIn','ultimate'),
						'zoomInDown'         => __('zoomInDown','ultimate'),
						'zoomInLeft'         => __('zoomInLeft','ultimate'),
						'zoomInRight'        => __('zoomInRight','ultimate'),
						'zoomInUp'           => __('zoomInUp','ultimate'),
						'zoomOut'            => __('zoomOut','ultimate'),
						'zoomOutDown'        => __('zoomOutDown','ultimate'),
						'zoomOutLeft'        => __('zoomOutLeft','ultimate'),
						'zoomOutRight'       => __('zoomOutRight','ultimate'),
						'zoomOutUp'          => __('zoomOutUp','ultimate'),
						'slideInDown'        => __('slideInDown','ultimate'),
						'slideInLeft'        => __('slideInLeft','ultimate'),
						'slideInRight'       => __('slideInRight','ultimate'),
						'slideInUp'          => __('slideInUp','ultimate'),
						'slideOutDown'       => __('slideOutDown','ultimate'),
						'slideOutLeft'       => __('slideOutLeft','ultimate'),
						'slideOutRight'      => __('slideOutRight','ultimate'),
						'slideOutUp'         => __('slideOutUp','ultimate'),
					],
					'condition' => [
						'slide_animation' => 'yes',
					]
				]
			);

			// Slide Out Animation
			$this->add_control(
				'slide_animate_out',
				[
					'label'   => __( 'Slide Animate Out', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'fadeOut',
					'options' => [
						'bounce'             => __('bounce','ultimate'),
						'flash'              => __('flash','ultimate'),
						'pulse'              => __('pulse','ultimate'),
						'rubberBand'         => __('rubberBand','ultimate'),
						'shake'              => __('shake','ultimate'),
						'headShake'          => __('headShake','ultimate'),
						'swing'              => __('swing','ultimate'),
						'tada'               => __('tada','ultimate'),
						'wobble'             => __('wobble','ultimate'),
						'jello'              => __('jello','ultimate'),
						'heartBeat'          => __('heartBeat','ultimate'),
						'bounceIn'           => __('bounceIn','ultimate'),
						'bounceInDown'       => __('bounceInDown','ultimate'),
						'bounceInLeft'       => __('bounceInLeft','ultimate'),
						'bounceInRight'      => __('bounceInRight','ultimate'),
						'bounceInUp'         => __('bounceInUp','ultimate'),
						'bounceOut'          => __('bounceOut','ultimate'),
						'bounceOutDown'      => __('bounceOutDown','ultimate'),
						'bounceOutLeft'      => __('bounceOutLeft','ultimate'),
						'bounceOutRight'     => __('bounceOutRight','ultimate'),
						'bounceOutUp'        => __('bounceOutUp','ultimate'),
						'fadeIn'             => __('fadeIn','ultimate'),
						'fadeInDown'         => __('fadeInDown','ultimate'),
						'fadeInDownBig'      => __('fadeInDownBig','ultimate'),
						'fadeInLeft'         => __('fadeInLeft','ultimate'),
						'fadeInLeftBig'      => __('fadeInLeftBig','ultimate'),
						'fadeInRight'        => __('fadeInRight','ultimate'),
						'fadeInRightBig'     => __('fadeInRightBig','ultimate'),
						'fadeInUp'           => __('fadeInUp','ultimate'),
						'fadeInUpBig'        => __('fadeInUpBig','ultimate'),
						'fadeOut'            => __('fadeOut','ultimate'),
						'fadeOutDown'        => __('fadeOutDown','ultimate'),
						'fadeOutDownBig'     => __('fadeOutDownBig','ultimate'),
						'fadeOutLeft'        => __('fadeOutLeft','ultimate'),
						'fadeOutLeftBig'     => __('fadeOutLeftBig','ultimate'),
						'fadeOutRight'       => __('fadeOutRight','ultimate'),
						'fadeOutRightBig'    => __('fadeOutRightBig','ultimate'),
						'fadeOutUp'          => __('fadeOutUp','ultimate'),
						'fadeOutUpBig'       => __('fadeOutUpBig','ultimate'),
						'flip'               => __('flip','ultimate'),
						'flipInX'            => __('flipInX','ultimate'),
						'flipInY'            => __('flipInY','ultimate'),
						'flipOutX'           => __('flipOutX','ultimate'),
						'flipOutY'           => __('flipOutY','ultimate'),
						'lightSpeedIn'       => __('lightSpeedIn','ultimate'),
						'lightSpeedOut'      => __('lightSpeedOut','ultimate'),
						'rotateIn'           => __('rotateIn','ultimate'),
						'rotateInDownLeft'   => __('rotateInDownLeft','ultimate'),
						'rotateInDownRight'  => __('rotateInDownRight','ultimate'),
						'rotateInUpLeft'     => __('rotateInUpLeft','ultimate'),
						'rotateInUpRight'    => __('rotateInUpRight','ultimate'),
						'rotateOut'          => __('rotateOut','ultimate'),
						'rotateOutDownLeft'  => __('rotateOutDownLeft','ultimate'),
						'rotateOutDownRight' => __('rotateOutDownRight','ultimate'),
						'rotateOutUpLeft'    => __('rotateOutUpLeft','ultimate'),
						'rotateOutUpRight'   => __('rotateOutUpRight','ultimate'),
						'hinge'              => __('hinge','ultimate'),
						'jackInTheBox'       => __('jackInTheBox','ultimate'),
						'rollIn'             => __('rollIn','ultimate'),
						'rollOut'            => __('rollOut','ultimate'),
						'zoomIn'             => __('zoomIn','ultimate'),
						'zoomInDown'         => __('zoomInDown','ultimate'),
						'zoomInLeft'         => __('zoomInLeft','ultimate'),
						'zoomInRight'        => __('zoomInRight','ultimate'),
						'zoomInUp'           => __('zoomInUp','ultimate'),
						'zoomOut'            => __('zoomOut','ultimate'),
						'zoomOutDown'        => __('zoomOutDown','ultimate'),
						'zoomOutLeft'        => __('zoomOutLeft','ultimate'),
						'zoomOutRight'       => __('zoomOutRight','ultimate'),
						'zoomOutUp'          => __('zoomOutUp','ultimate'),
						'slideInDown'        => __('slideInDown','ultimate'),
						'slideInLeft'        => __('slideInLeft','ultimate'),
						'slideInRight'       => __('slideInRight','ultimate'),
						'slideInUp'          => __('slideInUp','ultimate'),
						'slideOutDown'       => __('slideOutDown','ultimate'),
						'slideOutLeft'       => __('slideOutLeft','ultimate'),
						'slideOutRight'      => __('slideOutRight','ultimate'),
						'slideOutUp'         => __('slideOutUp','ultimate'),
					],
					'condition' => [
						'slide_animation' => 'yes',
					]
				]
			);

			// Slide Navigation
			$this->add_control(
				'nav',
				[
					'label'   => __( 'Show Navigation', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Navigation Position
			$this->add_control(
				'nav_position',
				[
					'label'   => __( 'Navigation Position', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'outside_vertical_center_nav',
					'options' => [
						'inside_vertical_center_nav'  => __( 'Inside Vertical Center', 'ultimate' ),
						'outside_vertical_center_nav' => __( 'Outside Vertical Center', 'ultimate' ),
						'top_left_nav'                => __( 'Top Left', 'ultimate' ),
						'top_center_nav'              => __( 'Top Center', 'ultimate' ),
						'top_right_nav'               => __( 'Top Right', 'ultimate' ),
						'bottom_left_nav'             => __( 'Bottom Left', 'ultimate' ),
						'bottom_center_nav'           => __( 'Bottom Center', 'ultimate' ),
						'bottom_right_nav'            => __( 'Bottom Right', 'ultimate' ),
					],
					'condition' => [
						'nav' => 'true',
					],
				]
			);

			// Slide Next Icon
			$this->add_control(
				'next_icon',
				[
					'label'     => __( 'Nav Next Icon', 'ultimate' ),
					'type'      => Controls_Manager::ICON,
					'default'   => 'fa fa-angle-right',
					'condition' => [
						'nav' => 'true',
					],
				]
			);

			// Slide Prev Icon
			$this->add_control(
				'prev_icon',
				[
					'label'     => __( 'Nav Prev Icon', 'ultimate' ),
					'type'      => Controls_Manager::ICON,
					'default'   => 'fa fa-angle-left',
					'condition' => [
						'nav' => 'true',
					],
				]
			);

			// Slide Dots
			$this->add_control(
				'dots',
				[
					'label'   => __( 'Slide Dots', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Slide Loop
			$this->add_control(
				'loop',
				[
					'label'   => __( 'Slide Loop', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Slide Loop
			$this->add_control(
				'hover_pause',
				[
					'label'   => __( 'Pause On Hover', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'true',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Slide Center
			$this->add_control(
				'center',
				[
					'label'   => __( 'Slide Center Mode', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

			// Slide Center
			$this->add_control(
				'rtl',
				[
					'label'   => __( 'Direction RTL', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'false',
					'options' => [
						'true'  => __( 'Yes', 'ultimate' ),
						'false' => __( 'No', 'ultimate' ),
					],
				]
			);

		$this->end_controls_section();

		/*----------------------------
			SLIDER NAV WARP
		-----------------------------*/
		$this->start_controls_section(
			'slider_control_warp_style_section',
			[
				'label' => __( 'Slider Nav Warp Style', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => 'yes',
				],
			]
		);

			// Background
			$this->add_group_control(
				Group_Control_Background:: get_type(),
				[
					'name'     => 'slider_nav_warp_background',
					'label'    => __( 'Background', 'ultimate' ),
					'types'    => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav',
				]
			);

			// Border
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'slider_nav_warp_border',
					'label'    => __( 'Border', 'ultimate' ),
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Border Radius
			$this->add_control(
				'slider_nav_warp_radius',
				[
					'label'      => __( 'Border Radius', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'slider_nav_warp_shadow',
					'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Display;
			$this->add_responsive_control(
				'slider_nav_warp_display',
				[
					'label'   => __( 'Display', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',
					'options' => [
						'initial'      => __( 'Initial', 'ultimate' ),
						'block'        => __( 'Block', 'ultimate' ),
						'inline-block' => __( 'Inline Block', 'ultimate' ),
						'flex'         => __( 'Flex', 'ultimate' ),
						'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
						'none'         => __( 'none', 'ultimate' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'display: {{VALUE}};',
					],
				]
			);

			// Before Postion
			$this->add_responsive_control(
				'slider_nav_warp_position',
				[
					'label'   => __( 'Position', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',
					
					'options' => [
						'initial'  => __( 'Initial', 'ultimate' ),
						'absolute' => __( 'Absulute', 'ultimate' ),
						'relative' => __( 'Relative', 'ultimate' ),
						'static'   => __( 'Static', 'ultimate' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'position: {{VALUE}};',
					],
				]
			);

			// Postion From Left
			$this->add_responsive_control(
				'slider_nav_warp_position_from_left',
				[
					'label'      => __( 'From Left', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Right
			$this->add_responsive_control(
				'slider_nav_warp_position_from_right',
				[
					'label'      => __( 'From Right', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Top
			$this->add_responsive_control(
				'slider_nav_warp_position_from_top',
				[
					'label'      => __( 'From Top', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Postion From Bottom
			$this->add_responsive_control(
				'slider_nav_warp_position_from_bottom',
				[
					'label'      => __( 'From Bottom', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => -1000,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'slider_nav_warp_position' => ['absolute','relative']
					],
				]
			);

			// Align
			$this->add_responsive_control(
				'slider_nav_warp_align',
				[
					'label'   => __( 'Alignment', 'ultimate' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'ultimate' ),
							'icon'  => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'ultimate' ),
							'icon'  => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'ultimate' ),
							'icon'  => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justify', 'ultimate' ),
							'icon'  => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'text-align: {{VALUE}};',
					],
					'default' => '',
				]
			);

			// Width
			$this->add_responsive_control(
				'slider_nav_warp_width',
				[
					'label'      => __( 'Width', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Height
			$this->add_responsive_control(
				'slider_nav_warp_height',
				[
					'label'      => __( 'Height', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Opacity
			$this->add_control(
				'slider_nav_warp_opacity',
				[
					'label' => __( 'Opacity', 'ultimate' ),
					'type'  => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max'  => 1,
							'min'  => 0.10,
							'step' => 0.01,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'opacity: {{SIZE}};',
					],
				]
			);

			// Z-Index
			$this->add_control(
				'slider_nav_warp_zindex',
				[
					'label'     => __( 'Z-Index', 'ultimate' ),
					'type'      => Controls_Manager::NUMBER,
					'min'       => -99,
					'max'       => 99,
					'step'      => 1,
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'z-index: {{SIZE}};',
					],
				]
			);

			// Margin
			$this->add_responsive_control(
				'slider_nav_warp_margin',
				[
					'label'      => __( 'Margin', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Padding
			$this->add_responsive_control(
				'slider_nav_warp_padding',
				[
					'label'      => __( 'Margin', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/*----------------------------
			SLIDER NAV WARP END
		-----------------------------*/

		/*----------------------------
			CONTROL BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'slider_control_style_section',
			[
				'label' => __( 'Slider Nav Button Style', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => 'yes',
				],
			]
		);
		
			// Typgraphy
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'      => 'slide_button_typography',
					'selector'  => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr1',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			$this->start_controls_tabs( 'slide_button_tab_style' );
			$this->start_controls_tab(
				'slide_button_normal_tab',
				[
					'label' => __( 'Normal', 'ultimate' ),
				]
			);

				// Color
				$this->add_control(
					'slide_button_color',
					[
						'label'     => __( 'Color', 'ultimate' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'color: {{VALUE}};',
						],
					]
				);

				// Background
				$this->add_group_control(
					Group_Control_Background:: get_type(),
					[
						'name'     => 'slide_button_background',
						'label'    => __( 'Background', 'ultimate' ),
						'types'    => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
					]
				);

				// Hr
				$this->add_control(
					'slide_button_hr2',
					[
						'type' => Controls_Manager::DIVIDER,
					]
				);

				// Border
				$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
						'name'     => 'slide_button_border',
						'label'    => __( 'Border', 'ultimate' ),
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
					]
				);

				// Radius
				$this->add_control(
					'slide_button_radius',
					[
						'label'      => __( 'Border Radius', 'ultimate' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				
				// Shadow
				$this->add_group_control(
					Group_Control_Box_Shadow:: get_type(),
					[
						'name'     => 'slide_button_shadow',
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div',
					]
				);

				// Hr
				$this->add_control(
					'slide_button_hr3',
					[
						'type' => Controls_Manager::DIVIDER,
					]
				);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'slide_button_hover_tab',
				[
					'label' => __( 'Hover', 'ultimate' ),
				]
			);

				// Hover Color
				$this->add_control(
					'hover_slide_button_color',
					[
						'label'     => __( 'Color', 'ultimate' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div:hover' => 'color: {{VALUE}};',
						],
					]
				);

				// Hover Background
				$this->add_group_control(
					Group_Control_Background:: get_type(),
					[
						'name'     => 'hover_slide_button_background',
						'label'    => __( 'Background', 'ultimate' ),
						'types'    => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
					]
				);	

				// Hr
				$this->add_control(
					'slide_button_hr4',
					[
						'type' => Controls_Manager::DIVIDER,
					]
				);

				// Hover Border
				$this->add_group_control(
					Group_Control_Border:: get_type(),
					[
						'name'     => 'hover_slide_button_border',
						'label'    => __( 'Border', 'ultimate' ),
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
					]
				);

				// Hover Radius
				$this->add_control(
					'hover_slide_button_radius',
					[
						'label'      => __( 'Border Radius', 'ultimate' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				// Hover Shadow
				$this->add_group_control(
					Group_Control_Box_Shadow:: get_type(),
					[
						'name'     => 'hover_slide_button_shadow',
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
					]
				);

				// Hover Animation
				/*$this->add_control(
					'slide_button_hover_animation',
					[
						'label'    => __( 'Hover Animation', 'ultimate' ),
						'type'     => Controls_Manager::HOVER_ANIMATION,
						'selector' => '{{WRAPPER}} .sldier-content-area .owl-nav > div:hover',
					]
				);*/

				$this->add_control(
					'slide_button_hr9',
					[
						'type' => Controls_Manager::DIVIDER,
					]
				);

			$this->end_controls_tab();
			$this->end_controls_tabs();

			// Width
			$this->add_control(
				'slide_button_width',
				[
					'label'      => __( 'Width', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Height
			$this->add_control(
				'slide_button_height',
				[
					'label'      => __( 'Height', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range'      => [
						'px' => [
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr5',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Display;
			$this->add_responsive_control(
				'slide_button_display',
				[
					'label'   => __( 'Display', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',				
					'options' => [
						'initial'      => __( 'Initial', 'ultimate' ),
						'block'        => __( 'Block', 'ultimate' ),
						'inline-block' => __( 'Inline Block', 'ultimate' ),
						'flex'         => __( 'Flex', 'ultimate' ),
						'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
						'none'         => __( 'none', 'ultimate' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'display: {{VALUE}};',
					],
				]
			);

			// Alignment
			$this->add_control(
				'slide_button_align',
				[
					'label'   => __( 'Alignment', 'ultimate' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'ultimate' ),
							'icon'  => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'ultimate' ),
							'icon'  => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'ultimate' ),
							'icon'  => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justify', 'ultimate' ),
							'icon'  => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'text-align: {{VALUE}};',
					],
					'default' => '',
				]
			);

			// Hr
			$this->add_control(
				'slide_button_hr6',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);


			// Postion
			$this->add_responsive_control(
				'slide_button_position',
				[
					'label'   => __( 'Position', 'ultimate' ),
					'type'    => Controls_Manager::SELECT,
					'default' => '',				
					'options' => [
						'initial'  => __( 'Initial', 'ultimate' ),
						'absolute' => __( 'Absulute', 'ultimate' ),
						'relative' => __( 'Relative', 'ultimate' ),
						'static'   => __( 'Static', 'ultimate' ),
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'position: {{VALUE}};',
					],
				]
			);

			/*$this->start_controls_tabs( 'slide_button_item_tab_style', [
			    'condition' => [
			        'slide_button_position' => ['absolute','relative']
			    ],
			] );*/
			$this->start_controls_tabs( 'slide_button_item_tab_style');
			$this->start_controls_tab(
				'slide_button_left_nav_tab',
				[
					'label' => __( 'Left Button', 'ultimate' ),
				]
			);

				// Postion From Left
				$this->add_responsive_control(
					'slide_button_position_from_left',
					[
						'label'      => __( 'From Left', 'ultimate' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range'      => [
							'px' => [
								'min'  => -1000,
								'max'  => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'slide_button_position' => ['absolute','relative']
						],
					]
				);

				// Postion Bottom Top
				$this->add_responsive_control(
					'slide_button_position_from_bottom',
					[
						'label'      => __( 'From Top', 'ultimate' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range'      => [
							'px' => [
								'min'  => -1000,
								'max'  => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-prev' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'slide_button_position' => ['absolute','relative']
						],
					]
				);

				// Margin
				$this->add_responsive_control(
					'slide_button_left_margin',
					[
						'label'      => __( 'Margin Left Button', 'ultimate' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->end_controls_tab();
			$this->start_controls_tab(
				'slide_button_right_nav_tab',
				[
					'label' => __( 'Right Button', 'ultimate' ),
				]
			);
				// Postion From Right
				$this->add_responsive_control(
					'slide_button_position_from_right',
					[
						'label'      => __( 'From Right', 'ultimate' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range'      => [
							'px' => [
								'min'  => -1000,
								'max'  => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-next' => 'right: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'slide_button_position' => ['absolute','relative']
						],
					]
				);

				// Postion From Top
				$this->add_responsive_control(
					'slide_button_position_from_top',
					[
						'label'      => __( 'From Top', 'ultimate' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range'      => [
							'px' => [
								'min'  => -1000,
								'max'  => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => -100,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .sldier-content-area:hover .owl-nav > div.owl-next' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'slide_button_position' => ['absolute','relative']
						],
					]
				);

				// Margin
				$this->add_responsive_control(
					'slide_button_right_margin',
					[
						'label'      => __( 'Margin Right Button', 'ultimate' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .sldier-content-area .owl-nav > div.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->end_controls_tab();
			$this->end_controls_tabs();

			// Hr
			$this->add_control(
				'slide_button_hr7',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Transition
			$this->add_control(
				'slide_button_transition',
				[
					'label'      => __( 'Transition', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0.1,
							'max'  => 3,
							'step' => 0.1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0.3,
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'transition: {{SIZE}}s;',
					],
				]
			);


			// Hr
			$this->add_control(
				'slide_button_hr8',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Padding
			$this->add_responsive_control(
				'slide_button_padding',
				[
					'label'      => __( 'Padding', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-nav > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		/*----------------------------
			CONTROL BUTTON STYLE END
		-----------------------------*/

		/*----------------------------
			DOTS BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'slide_dots_button_style_section',
			[
				'label' => __( 'Slide Dots Style', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'slider_on' => 'yes',
				],
			]
		);
			$this->start_controls_tabs( 'button_tab_style' );
				$this->start_controls_tab(
					'slide_dots_normal_tab',
					[
						'label' => __( 'Normal', 'ultimate' ),
					]
				);
					// Button Width
					$this->add_control(
						'slide_dots_width',
						[
							'label'      => __( 'Width', 'ultimate' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					// Button Height
					$this->add_control(
						'slide_dots_height',
						[
							'label'      => __( 'Height', 'ultimate' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					// Button Background
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'slide_dots_background',
							'label'    => __( 'Background', 'ultimate' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
						]
					);

					// Button Border
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'slide_dots_border',
							'label'    => __( 'Border', 'ultimate' ),
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
						]
					);

					// Button Radius
					$this->add_control(
						'slide_dots_radius',
						[
							'label'      => __( 'Border Radius', 'ultimate' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
					// Button Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'slide_dots_shadow',
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div',
						]
					);
				$this->end_controls_tab();

				$this->start_controls_tab(
					'slide_dots_hover_tab',
					[
						'label' => __( 'Hover & Active', 'ultimate' ),
					]
				);
					$this->add_control(
						'hover_slide_dots_width',
						[
							'label'      => __( 'Width', 'ultimate' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					// Button Height
					$this->add_control(
						'hover_slide_dots_height',
						[
							'label'      => __( 'Height', 'ultimate' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px' => [
									'min'  => 0,
									'max'  => 1000,
									'step' => 1,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
							],
							'selectors' => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'height: {{SIZE}}{{UNIT}};',
							],
						]
					);

					// Button Hover BG
					$this->add_group_control(
						Group_Control_Background:: get_type(),
						[
							'name'     => 'hover_slide_dots_background',
							'label'    => __( 'Background', 'ultimate' ),
							'types'    => [ 'classic', 'gradient' ],
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
						]
					);	

					// Button Radius
					$this->add_group_control(
						Group_Control_Border:: get_type(),
						[
							'name'     => 'hover_slide_dots_border',
							'label'    => __( 'Border', 'ultimate' ),
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
						]
					);

					// Button Hover Radius
					$this->add_control(
						'hover_slide_dots_radius',
						[
							'label'      => __( 'Border Radius', 'ultimate' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors'  => [
								'{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					// Button Hover Box Shadow
					$this->add_group_control(
						Group_Control_Box_Shadow:: get_type(),
						[
							'name'     => 'hover_slide_dots_shadow',
							'selector' => '{{WRAPPER}} .sldier-content-area .owl-dots > div:hover,{{WRAPPER}} .sldier-content-area .owl-dots > div.active',
						]
					);

				$this->end_controls_tab();
			$this->end_controls_tabs();

			// Button Hr
			$this->add_control(
				'slide_dots_hr',
				[
					'type' => Controls_Manager::DIVIDER,
				]
			);

			// Alignment
			$this->add_control(
				'slide_dots_align',
				[
					'label'   => __( 'Alignment', 'ultimate' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'ultimate' ),
							'icon'  => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'ultimate' ),
							'icon'  => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'ultimate' ),
							'icon'  => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justify', 'ultimate' ),
							'icon'  => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-dots' => 'text-align: {{VALUE}};',
					],
					'default' => '',
				]
			);

			// Transition
			$this->add_control(
				'slide_dots_transition',
				[
					'label'      => __( 'Transition', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => 0.1,
							'max'  => 3,
							'step' => 0.1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0.3,
					],
					'selectors' => [
						'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'transition: {{SIZE}}s;',
					],
				]
			);

			// Margin
			$this->add_responsive_control(
				'slide_dots_margin',
				[
					'label'      => __( 'Dot Item Margin', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-dots > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Margin
			$this->add_responsive_control(
				'slide_dots_warp_margin',
				[
					'label'      => __( 'Dot Warp Margin', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .sldier-content-area .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
		/*----------------------------
			DOTS BUTTON STYLE END
		-----------------------------*/

		/*********************************
		 * 		STYLE SECTION
		 *********************************/

		/*----------------------------
			THUMB STYLE
		-----------------------------*/
		$this->start_controls_section(
			'thumb_style_section',
			[
				'label' => __( 'Author Thumb', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'thumb_style_tab'
		);

		$this->start_controls_tab(
			'thum_image_warp_tab',
			[
				'label' => __( 'Tumb Warp', 'ultimate' ),
			]
		);

		// Width
		$this->add_responsive_control(
			'thumb_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'thumb_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'thumb_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'thumb_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Radius
		$this->add_control(
			'thumb_border_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'thumb_shadow',
				'selector' => '{{WRAPPER}} .member__thumb',
			]
		);

		// Display;
		$this->add_responsive_control(
			'thumb_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'display: {{VALUE}};',
				],
			]
		);

		// Postion
		$this->add_responsive_control(
			'thumb_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'thumb_position_from_left',
			[
				'label'      => __( 'From Left', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'thumb_position_from_right',
			[
				'label'      => __( 'From Right', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'thumb_position_from_top',
			[
				'label'      => __( 'From Top', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'thumb_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'thumb_position' => ['absolute','relative']
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'thumb_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'thumb_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'thumb_image_tab',
			[
				'label' => __( 'Thumb Image', 'ultimate' ),
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'thumb_image_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .member__thumb img',
			]
		);

		// Radius
		$this->add_control(
			'thumb_image_border_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'thumb_image_shadow',
				'selector' => '{{WRAPPER}} .member__thumb img',
			]
		);

		// Width
		$this->add_responsive_control(
			'thumb_image_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'thumb_image_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__thumb img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			THUMB STYLE END
		-----------------------------*/

		/*----------------------------
			DESCRIPTION STYLE
		-----------------------------*/
		$this->start_controls_section(
			'description_style_section',
			[
				'label' => __( 'Description', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .member__description',
			]
		);

		// Subtitle Color
		$this->add_control(
			'description_color',
			[
				'label'  => __( 'Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .member__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Subtitle Color
		$this->add_control(
			'box_hover_description_color',
			[
				'label'  => __( 'Box Hover Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__description' => 'color: {{VALUE}}',
				],
			]
		);

		// Subtitle Margin
		$this->add_responsive_control(
			'description_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			DESCRIPTION STYLE END
		-----------------------------*/

		/*----------------------------
			NAME STYLE
		-----------------------------*/
		$this->start_controls_section(
			'name_style_section',
			[
				'label' => __( 'Name', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .member__name',
			]
		);

		// Color
		$this->add_control(
			'name_color',
			[
				'label'  => __( 'Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .member__name' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Color
		$this->add_control(
			'box_hover_name_color',
			[
				'label'  => __( 'Box Hover Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__name' => 'color: {{VALUE}}',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'name_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			NAME STYLE END
		-----------------------------*/

		/*----------------------------
			DESIGNATION STYLE
		-----------------------------*/
		$this->start_controls_section(
			'designation_style_section',
			[
				'label' => __( 'Designation Or Company', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'designation_typography',
				'selector' => '{{WRAPPER}} .member__designation',
			]
		);

		// Color
		$this->add_control(
			'designation_color',
			[
				'label'  => __( 'Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .member__designation' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Color
		$this->add_control(
			'box_hover_designation_color',
			[
				'label'  => __( 'Box Hover Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:hover .member__designation' => 'color: {{VALUE}}',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'designation_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			DESIGNATION STYLE END
		-----------------------------*/


		/*----------------------------
			SOCIAL WRAPPER STYLE
		-----------------------------*/
		$this->start_controls_section(
			'thumb_desi_warp_section',
			[
				'label' => __( 'Social Warp', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Width
		$this->add_responsive_control(
			'social_wrap_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_responsive_control(
			'social_wrap_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'social_wrap_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'social_wrap_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Radius
		$this->add_control(
			'social_wrap_border_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'social_wrap_shadow',
				'selector' => '{{WRAPPER}} .member__content__wrap',
			]
		);

		// Display;
		$this->add_responsive_control(
			'social_wrap_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'display: {{VALUE}};',
				],
			]
		);


		// Postion
		$this->add_responsive_control(
			'social_wrap_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'social_wrap_position_from_left',
			[
				'label'      => __( 'From Left', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'social_wrap_position_from_right',
			[
				'label'      => __( 'From Right', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'social_wrap_position_from_top',
			[
				'label'      => __( 'From Top', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'social_wrap_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__content__wrap' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'social_wrap_position' => ['absolute','relative']
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'social_wrap_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'social_wrap_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__content__wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SOCIAL WRAPPER STYLE
		-----------------------------*/

		/*----------------------------
			SOCIAL ICON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Social Icons', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->start_controls_tabs( 'icon_tab_style' );
		$this->start_controls_tab(
			'icon_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

		// Color
		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'color: {{VALUE}};',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'icon_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Border Radius
		$this->add_control(
			'icon_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .member__socials a',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Hover Color
		$this->add_control(
			'hover_icon_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member__socials a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Hover Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_icon_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);	

		// Hr
		$this->add_control(
			'icon_hr4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Hover Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_icon_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);

		// Hover Radius
		$this->add_control(
			'hover_icon_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hover Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);

		// Hover Animation
		$this->add_control(
			'icon_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'ultimate' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .member__socials a:hover',
			]
		);

		$this->add_control(
			'icon_hr9',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Width
		$this->add_control(
			'icon_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Height
		$this->add_control(
			'icon_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Display;
		$this->add_responsive_control(
			'icon_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'display: {{VALUE}};',
				],
			]
		);

		// Alignment
		$this->add_control(
			'icon_align',
			[
				'label'   => __( 'Alignment', 'ultimate' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ultimate' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ultimate' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ultimate' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'ultimate' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		// Hr
		$this->add_control(
			'icon_hr6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Postion
		$this->add_responsive_control(
			'icon_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'icon_position_from_left',
			[
				'label'      => __( 'From Left', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'icon_position_from_right',
			[
				'label'      => __( 'From Right', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'icon_position_from_top',
			[
				'label'      => __( 'From Top', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'icon_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position' => ['absolute','relative']
				],
			]
		);

		// Transition
		$this->add_control(
			'icon_transition',
			[
				'label'      => __( 'Transition', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .member__socials a' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hr
		$this->add_control(
			'icon_hr8',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Padding
		$this->add_responsive_control(
			'icon_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .member__socials a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SOCIAL ICON STYLE END
		-----------------------------*/

		/*----------------------------
			BOX STYLE
		-----------------------------*/
		$this->start_controls_section(
			'box_style_section',
			[
				'label' => __( 'Box', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Box Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		$this->start_controls_tabs('box_style_tabs');
		$this->start_controls_tab(
			'box_style_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

		// Box Default Color
		$this->add_control(
			'box_color',
			[
				'label'  => __( 'Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__team' => 'color: {{VALUE}}',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'box_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'box_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		// Border Radius
		$this->add_control(
			'box_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'box_box_shadow',
				'selector' => '{{WRAPPER}} .single__team',
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'box_style_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Box Hover Color
		$this->add_control(
			'hover_box_color',
			[
				'label'  => __( 'Box Hover Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:hover' => 'color: {{VALUE}}',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_box_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_box_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'hover_box_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_box_box_shadow',
				'selector' => '{{WRAPPER}} .single__team:hover',
			]
		);		

		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Box Align
		$this->add_responsive_control(
			'box_align',
			[
				'label'   => __( 'Alignment', 'ultimate' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'ultimate' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ultimate' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ultimate' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'ultimate' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single__team' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		// Box Transition
		$this->add_control(
			'box_transition',
			[
				'label'      => __( 'Transition', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Postion
		$this->add_responsive_control(
			'box_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team' => 'position: {{VALUE}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'box_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/

		/*----------------------------
			BOX BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'box_before_after_style_section',
			[
				'label' => __( 'Before / After', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'box_before_after_tab_style' );
		$this->start_controls_tab(
			'box_before_tab',
			[
				'label' => __( 'BEFORE', 'ultimate' ),
			]
		);

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'box_before_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:before,{{WRAPPER}} .member__thumb:before',
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'box_before_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Before Postion
		$this->add_responsive_control(
			'box_before_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'box_before_position_from_left',
			[
				'label'      => __( 'From Left', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'box_before_position_from_right',
			[
				'label'      => __( 'From Right', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'box_before_position_from_top',
			[
				'label'      => __( 'From Top', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'box_before_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_before_position' => ['absolute','relative']
				],
			]
		);

		// Before Align
		$this->add_responsive_control(
			'box_before_align',
			[
				'label'   => __( 'Alignment', 'ultimate' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-align:left' => [
						'title' => __( 'Left', 'ultimate' ),
						'icon'  => 'eicon-text-align-left',
					],
					'margin: 0 auto' => [
						'title' => __( 'Center', 'ultimate' ),
						'icon'  => 'eicon-text-align-center',
					],
					'float:right' => [
						'title' => __( 'Right', 'ultimate' ),
						'icon'  => 'eicon-text-align-right',
					],
					'text-align:justify' => [
						'title' => __( 'Justify', 'ultimate' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'box_before_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'box_before_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'box_before_opacity',
			[
				'label' => __( 'Opacity', 'ultimate' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Before Z-Index
		$this->add_control(
			'box_before_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__team:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Before Margin
		$this->add_responsive_control(
			'box_before_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_after_tab',
			[
				'label' => __( 'AFTER', 'ultimate' ),
			]
		);

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'box_after_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__team:after',
			]
		);

		// After Display;
		$this->add_responsive_control(
			'box_after_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'display: {{VALUE}};',
				],
			]
		);

		// After Postion
		$this->add_responsive_control(
			'box_after_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'box_after_position_from_left',
			[
				'label'      => __( 'From Left', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'box_after_position_from_right',
			[
				'label'      => __( 'From Right', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'box_after_position_from_top',
			[
				'label'      => __( 'From Top', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'box_after_position_from_bottom',
			[
				'label'      => __( 'From Bottom', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'box_after_position' => ['absolute','relative']
				],
			]
		);

		// After Align
		$this->add_responsive_control(
			'box_after_align',
			[
				'label'   => __( 'Alignment', 'ultimate' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-align:left' => [
						'title' => __( 'Left', 'ultimate' ),
						'icon'  => 'eicon-text-align-left',
					],
					'margin: 0 auto' => [
						'title' => __( 'Center', 'ultimate' ),
						'icon'  => 'eicon-text-align-center',
					],
					'float:right' => [
						'title' => __( 'Right', 'ultimate' ),
						'icon'  => 'eicon-text-align-right',
					],
					'text-align:justify' => [
						'title' => __( 'Justify', 'ultimate' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// After Width
		$this->add_responsive_control(
			'box_after_width',
			[
				'label'      => __( 'Width', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Height
		$this->add_responsive_control(
			'box_after_height',
			[
				'label'      => __( 'Height', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Opacity
		$this->add_control(
			'box_after_opacity',
			[
				'label' => __( 'Opacity', 'ultimate' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'  => 1,
						'min'  => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		// After Z-Index
		$this->add_control(
			'box_after_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__team:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// After Margin
		$this->add_responsive_control(
			'box_after_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__team:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			BOX BEFORE / AFTER END
		-----------------------------*/
		
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		/*-----------------------------
			CONTENT WITH FOREACH LOOP
		------------------------------*/
		$team_content = '';
		if ($settings['team_content']) {

			foreach( $settings['team_content'] as $team ){

				$team_content .='
				<div class="single__team">';

					if( !empty( $team['member_thumb'] ) ){

						if ( !empty( $team['member_thumb'] ) ) {
							$thumb_array = $team['member_thumb'];
							$thumb_link  = wp_get_attachment_image_url( $thumb_array['id'], 'thumbnail' );
							$thumb_link  = Group_Control_Image_Size::get_attachment_image_src( $thumb_array['id'], 'member_thumb_size', $team );
							if ( !empty( $thumb_link ) ) {
								$team_content .='<div class="member__thumb"><img src="'. esc_url( $thumb_link ) .'" alt="'.esc_attr( get_the_title() ).'" /></div>';
							}else{
								$team_content .='<div class="member__thumb"><img src="'. esc_url( $team['member_thumb']['url'] ) .'" alt="" /></div>';
							}
						}
				    }

				    $team_content .='
				    <div class="member__content__wrap">';
						if( !empty( $team['member_name'] ) ){

							$team_content .='
							<div class="member__name__designation">';
								if( !empty( $team['member_name'] ) ){
									$team_content .='
									<h4 class="member__name">'.esc_html( $team['member_name'] ).'</h4>';
								}
								if( !empty( $team['designation'] ) ){
									$team_content .='
									<p class="member__designation">'.esc_html( $team['designation'] ).'</p>';
								}

								$team_content .='
							</div>';
						}

						if( !empty( $team['description'] ) ){

							$team_content .='
						    <div class="member__content">';
								$team_content .='<div class="member__description">'.wpautop( $team['description'] ).'</div>';
							$team_content .='
							</div>';
						}

						if ( 'yes' == $team['add_social'] ) {
							$team_content .='
							<div class="member__socials">';

							$facebook_url  = $team['facebook_url'];
							$twitter_url   = $team['twitter_url'];
							$youtube_url   = $team['youtube_url'];
							$vimeo_url     = $team['vimeo_url'];
							$instagram_url = $team['instagram_url'];
							$linkedin_url  = $team['linkedin_url'];
							$pinterest_url = $team['pinterest_url'];

							// FACEBOOK
							if ( !empty($facebook_url['url']) ) {
								$attribute[] = 'href="'.$facebook_url['url'].'"';
								if ( $facebook_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $facebook_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-facebook-f"></i></a>';
								$attribute = array();
							}

							// TWITTER
							if ( !empty($twitter_url['url']) ) {
								$attribute[] = 'href="'.$twitter_url['url'].'"';
								if ( $twitter_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $twitter_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-twitter"></i></a>';
								$attribute = array();
							}

							// YOUTUBE
							if ( !empty($youtube_url['url']) ) {
								$attribute[] = 'href="'.$youtube_url['url'].'"';
								if ( $youtube_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $youtube_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-youtube"></i></a>';
								$attribute = array();
							}

							// VIMEO
							if ( !empty($vimeo_url['url']) ) {
								$attribute[] = 'href="'.$vimeo_url['url'].'"';
								if ( $vimeo_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $vimeo_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-vimeo-v"></i></a>';
								$attribute = array();
							}

							// INSTAGRAM
							if (  !empty($instagram_url['url']) ) {
								$attribute[] = 'href="'.$instagram_url['url'].'"';
								if ( $instagram_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $instagram_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-instagram"></i></a>';
								$attribute = array();
							}

							// LINKEDIN
							if (  !empty($linkedin_url['url']) ) {
								$attribute[] = 'href="'.$linkedin_url['url'].'"';
								if ( $linkedin_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $linkedin_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-linkedin-in"></i></a>';
								$attribute = array();
							}

							// PINTEREST
							if (  !empty($pinterest_url['url'])  ) {
								$attribute[] = 'href="'.$pinterest_url['url'].'"';
								if ( $pinterest_url['is_external'] ) {
									$attribute[] = 'target="_blank"';
								}
								if ( $pinterest_url['nofollow'] ) {
									$attribute[] = 'rel="nofollow"';
								}
								$team_content .='<a '.implode(' ', $attribute ).'><i class="fab fa-pinterest-p"></i></a>';
								$attribute = array();
							}
							$team_content .='
							</div>';
						}
					$team_content .='
					</div>';

				$team_content .='
				</div>';
			}
		}

		// Slider Attr
		$this->add_render_attribute( 'team_carousel_attr', 'class', 'ultimate-team-carousel' );
		if ( count( $settings['team_content'] ) > 1 && 'yes' == $settings['slider_on'] ) {
			$this->add_render_attribute( 'team_carousel_attr', 'class', 'ultimate-carousel-active' );

			// SLIDER OPTIONS
			$options = [
				'item_on_large'     => $settings['item_on_large']["size"],
				'item_on_medium'    => $settings['item_on_medium']["size"],
				'item_on_tablet'    => $settings['item_on_tablet']["size"],
				'item_on_mobile'    => $settings['item_on_mobile']["size"],
				'stage_padding'     => $settings['stage_padding']["size"],
				'item_margin'       => $settings['item_margin']["size"],
				'autoplay'          => ( 'true' == $settings['autoplay'] ) ? true : false,
				'autoplaytimeout'   => $settings['autoplaytimeout']["size"],
				'slide_speed'       => $settings['slide_speed']["size"],
				'slide_animation'   => $settings['slide_animation'],
				'slide_animate_in'  => $settings['slide_animate_in'],
				'slide_animate_out' => $settings['slide_animate_out'],
				'nav'               => ( 'true' == $settings['nav'] ) ? true : false,
				'nav_position'      => $settings['nav_position'],
				'next_icon'         => $settings['next_icon'],
				'prev_icon'         => $settings['prev_icon'],
				'dots'              => ( 'true' == $settings['dots'] ) ? true : false,
				'loop'              => ( 'true' == $settings['loop'] ) ? true : false,
				'hover_pause'       => ( 'true' == $settings['hover_pause'] ) ? true : false,
				'center'            => ( 'true' == $settings['center'] ) ? true : false,
				'rtl'               => ( 'true' == $settings['rtl'] ) ? true : false,
			];

			$this->add_render_attribute( 'team_carousel_attr', 'data-settings', wp_json_encode( $options ) );
		}else{
			$this->add_render_attribute( 'team_carousel_attr', 'class', 'team-normal-grid' );
		}

		// Parent Attr.
		if ( 'true' == $settings['nav'] || 'true' == $settings['dots'] ) {
			$this->add_render_attribute('sldier_parent_attr','class','sldier-content-area');
		}

		$this->add_render_attribute('sldier_parent_attr','class',$settings['team_style']);
		$this->add_render_attribute('sldier_parent_attr','class',$settings['nav_position']);
	?>

	<div <?php echo $this->get_render_attribute_string('sldier_parent_attr'); ?>>
		<div <?php echo $this->get_render_attribute_string('team_carousel_attr'); ?> >
			<?php echo ( isset( $team_content ) ? $team_content : '' ); ?>
		</div>
	</div>

	<?php
	}
}