<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ultimate_Box_Widget extends Widget_Base {

	public function get_name() {
		return 'BoxWidget';
	}

	public function get_title() {
		return __( 'Multitype Box', 'ultimate' );
	}

	public function get_icon() {
		return 'eicon-icon-box uladdon-omnivus';
	}

	public function get_categories() {
		return array('ultimate-addons');
	}

	public static function box_style(){
		return [
			'single__box__layout__18'     => 'Box Style 1',
			'single__box__layout__19'     => 'Box Style 2',
			'single__box__layout__20'     => 'Box Style 3',
			'single__box__layout__21'     => 'Box Style 4',
			'single__box__layout__22'     => 'Box Style 5',
			'single__box__layout__23'     => 'Box Style 6',
			'single__box__layout__24'     => 'Box Style 7',
			'single__box__layout__9'      => 'Box Style 8',
			'single__box__layout__custom' => 'Custom Style',
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
			'box_layout_style',
			[
				'label'   => __( 'Box Type', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'single__box__layout__18',
				'options' => self::box_style(),
			]
		);

		// BOX BACKGROUND ICON TOGGLE
		$this->add_control(
			'show_box_bg_text_or_icon',
			[
				'label'        => __( 'Show Box BG Icon / Text ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'		=> 'before',
			]
		);

		// Icon Type
		$this->add_control(
			'box_bg_icon_type',
			[
				'label'   => __( 'Icon Type', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'font_icon',
				'options' => [
					'font_icon'  => __( 'Font Icon', 'ultimate' ),
					'image_icon' => __( 'Image Icon', 'ultimate' ),
					'simple_text' => __( 'Simple Text', 'ultimate' ),
				],
				'condition' => [
					'show_box_bg_text_or_icon' => 'yes',
				],
			]
		);

		// Font Icon
		$this->add_control(
			'box_bg_font_icon',
			[
				'label'     => __( 'Font Icons', 'ultimate' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fa fa-star-o',
				'condition' => [
					'box_bg_icon_type' => 'font_icon',
					'show_box_bg_text_or_icon' => 'yes',
				],
			]
		);

		// Image Icon
		$this->add_control(
			'box_bg_image_icon',
			[
				'label'   => __( 'Image Icon', 'ultimate' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'box_bg_icon_type' => 'image_icon',
					'show_box_bg_text_or_icon' => 'yes',
				],
			]
		);

		// Text Bg
		$this->add_control(
			'box_bg_text',
			[
				'label'   => __( 'Image Icon', 'ultimate' ),
				'type'    => Controls_Manager::TEXT,
				'placeholder' => __( '01', 'ultimate' ),
				'condition' => [
					'box_bg_icon_type' => 'simple_text',
					'show_box_bg_text_or_icon' => 'yes',
				],
			]
		);

		// Icon Toggle
		$this->add_control(
			'show_box_image',
			[
				'label'        => __( 'Show Box Image ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'		=> 'before',
			]
		);

		// Image 
		$this->add_control(
			'box_image',
			[
				'label'   => __( 'Box Image', 'ultimate' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_box_image' => 'yes',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'box_image_size',
				'exclude'   => [ 'custom' ],
				'default'   => 'large',
				'condition' => [
					'show_box_image' => 'yes',
				],
			]
		);
		$this->add_control(
			'box_image_postion',
			[
				'label'   => __( 'Image Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'before'  => __( 'Before Content', 'ultimate' ),
					'after' => __( 'After Content', 'ultimate' ),
				],
				'condition' => [
					'show_box_image' => 'yes',
				],
			]
		);

		// Icon Toggle
		$this->add_control(
			'show_icon',
			[
				'label'        => __( 'Show Icon ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'		=> 'before',
			]
		);

		// Icon Type
		$this->add_control(
			'icon_type',
			[
				'label'   => __( 'Icon Type', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'font_icon',
				'options' => [
					'font_icon'  => __( 'Font Icon', 'ultimate' ),
					'image_icon' => __( 'Image Icon', 'ultimate' ),
				],
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);

		// Font Icon
		$this->add_control(
			'font_icon',
			[
				'label'     => __( 'Font Icons', 'ultimate' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fa fa-star-o',
				'condition' => [
					'icon_type' => 'font_icon',
					'show_icon' => 'yes',
				],
			]
		);

		// Image Icon
		$this->add_control(
			'image_icon',
			[
				'label'   => __( 'Image Icon', 'ultimate' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_type' => 'image_icon',
					'show_icon' => 'yes',
				],
			]
		);

		// Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Title', 'ultimate' ),
				'separator'		=> 'before',
			]
		);

		// Title Tag
		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'   => 'h3',
				'condition' => [
					'title!' => '',
				],
			]
		);

		// Title Link
		$this->add_control(
			'title_link',
			[
				'label'         => __( 'Linked Title ?', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
				'condition' => [
					'title!' => '',
				],
			]
		);

		// Subtitle
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Subtitle', 'ultimate' ),
				'separator'		=> 'before',
			]
		);

		// Subtitle Position
		$this->add_control(
			'subtitle_position',
			[
				'label'   => __( 'Subtitle Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'after_title',
				'options' => [
					'before_title' => __( 'Before title', 'ultimate' ),
					'after_title'  => __( 'After Title', 'ultimate' ),
				],
				'condition' => [
					'subtitle!' => '',
				]
			]
		);

		// Description
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'ultimate' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description.', 'ultimate' ),
				'separator'		=> 'before',
			]
		);

		// Button Toggle
		$this->add_control(
			'show_button',
			[
				'label'        => __( 'Show Button ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'		=> 'before',
			]
		);

		// Button Title
		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Title', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Button Text', 'ultimate' ),
				'condition'   => ['show_button' => 'yes'],
			]
		);

		// Button Link
		$this->add_control(
			'button_link',
			[
				'label'         => __( 'Button Link', 'ultimate' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'ultimate' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
				'condition' => ['show_button' => 'yes'],
			]
		);

		// Button Icon Picker
		$this->add_control(
			'button_icon',
			[
				'label'       => __( 'Icon', 'ultimate' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => '',
				'condition'   => ['show_button' => 'yes'],
			]
		);

		// Button Icon Align
		$this->add_control(
			'button_icon_align',
			[
				'label'   => __( 'Icon Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'ultimate' ),
					'right' => __( 'After', 'ultimate' ),
				],
				'condition' => [
					'button_icon!' => '',
				],
			]
		);

		// Button Icon Margin
		$this->add_control(
			'button_icon_indent',
			[
				'label' => __( 'Icon Spacing', 'ultimate' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'button_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .box__button .box__button_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .box__button .box__button_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		/*********************************
		 * 		STYLE SECTION
		 *********************************/

		/*----------------------------
			ICON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'icon_style_section',
			[
				'label' => __( 'Icon', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Icon Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .box__icon',
				'condition' => [
					'icon_type' => ['font_icon']
				],
			]
		);

		// Icon Image Size
		$this->add_responsive_control(
			'icon_image_size',
			[
				'label'      => __( 'Icon Image Size', 'ultimate' ),
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
					'size' => '80',
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_type' => ['image_icon']
				],
			]
		);

		// Icon Hr
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

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'icon_image_filters',
				'selector'  => '{{WRAPPER}} .box__icon img',
				'condition' => [
					'icon_type' => ['image_icon']
				],
			]
		);

		// Icon Color
		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'color: {{VALUE}};',
				],
			]
		);

		// Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'icon_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__icon',
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'icon_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .box__icon',
			]
		);

		// Icon Radius
		$this->add_control(
			'icon_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .box__icon',
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Width
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
					'{{WRAPPER}} .box__icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Height
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
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		// Icon Display;
		$this->add_responsive_control(
			'icon_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,			
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .box__icon' => 'display: {{VALUE}};',
				],
			]
		);

		// Icon Alignment
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
					'{{WRAPPER}} .box__icon' => 'text-align: {{VALUE}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Postion
		$this->add_responsive_control(
			'icon_position',
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
					'{{WRAPPER}} .box__icon' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .box__icon' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
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
					'{{WRAPPER}} .box__icon' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
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
					'{{WRAPPER}} .box__icon' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
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
					'{{WRAPPER}} .box__icon' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Icon Transition
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
					'{{WRAPPER}} .box__icon,{{WRAPPER}} .box__icon img' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Margin
		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr8',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Padding
		$this->add_responsive_control(
			'icon_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'hover_icon_image_filters',
				'selector'  => '{{WRAPPER}} :hover .box__icon img',
				'condition' => [
					'icon_type' => ['image_icon']
				],
			]
		);

		// Box Hover Icon Color
		$this->add_control(
			'hover_icon_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} :hover .box__icon, {{WRAPPER}} :focus .box__icon' => 'color: {{VALUE}};',
				],
			]
		);

		// Box Hover Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_icon_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} :hover .box__icon,{{WRAPPER}} :focus .box__icon',
			]
		);	

		// Icon Hr
		$this->add_control(
			'icon_hr4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_icon_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} :hover .box__icon,{{WRAPPER}} :hover .box__icon',
			]
		);

		// Icon Radius
		$this->add_control(
			'hover_icon_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} :hover .box__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} :hover .box__icon',
			]
		);

		// Icon Hover Animation
		$this->add_control(
			'icon_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'ultimate' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} :hover .box__icon',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			ICON STYLE END
		-----------------------------*/

		/*----------------------------
			BOX BG ICON TEXXT STYLE
		-----------------------------*/
		$this->start_controls_section(
			'bg_icon_text_style_section',
			[
				'label' => __( 'Bg Icon / Text', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'=>[
					'show_box_bg_text_or_icon' => 'yes'
				]
			]
		);
		
		// Icon Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'bg_icon_text_typography',
				'selector'  => '{{WRAPPER}} .box__bg__icon__text',
			]
		);

		// Icon Image Size
		$this->add_responsive_control(
			'bg_icon_text_image_size',
			[
				'label'      => __( 'Icon Image Size', 'ultimate' ),
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
					'size' => '80',
				],
				'selectors' => [
					'{{WRAPPER}} .box__bg__icon__text img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->start_controls_tabs( 'bg_icon_text_tab_style' );
		$this->start_controls_tab(
			'bg_icon_text_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'bg_icon_text_image_filters',
				'selector'  => '{{WRAPPER}} .box__bg__icon__text img',
			]
		);

		// Icon Color
		$this->add_control(
			'bg_icon_text_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .box__bg__icon__text' => 'color: {{VALUE}};',
				],
			]
		);

		// Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'bg_icon_text_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__bg__icon__text',
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Radius
		$this->add_control(
			'bg_icon_text_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__bg__icon__text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'bg_icon_text_shadow',
				'selector' => '{{WRAPPER}} .box__bg__icon__text',
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Width
		$this->add_control(
			'bg_icon_text_width',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Height
		$this->add_control(
			'bg_icon_text_height',
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
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .box__bg__icon__text' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr5',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		// Icon Display;
		$this->add_responsive_control(
			'bg_icon_text_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,			
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .box__bg__icon__text' => 'display: {{VALUE}};',
				],
			]
		);

		// Icon Alignment
		$this->add_control(
			'bg_icon_text_align',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'text-align: {{VALUE}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr6',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Postion
		$this->add_responsive_control(
			'bg_icon_text_position',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'bg_icon_text_position_from_left',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_icon_text_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'bg_icon_text_position_from_right',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_icon_text_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'bg_icon_text_position_from_top',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_icon_text_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'bg_icon_text_position_from_bottom',
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
					'{{WRAPPER}} .box__bg__icon__text' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_icon_text_position!' => ['initial','static']
				],
			]
		);

		// Icon Transition
		$this->add_control(
			'bg_icon_text_transition',
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
					'{{WRAPPER}} .box__bg__icon__text,{{WRAPPER}} .box__bg__icon__text img' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Icon Opacity
		$this->add_control(
			'bg_icon_text_opacity',
			[
				'label'      => __( 'Opacity', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.1,
				],
				'selectors' => [
					'{{WRAPPER}} .box__bg__icon__text' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr7',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Margin
		$this->add_responsive_control(
			'bg_icon_text_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__bg__icon__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr8',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Padding
		$this->add_responsive_control(
			'bg_icon_text_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__bg__icon__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'bg_icon_text_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'hover_bg_icon_text_image_filters',
				'selector'  => '{{WRAPPER}} :hover .box__bg__icon__text img',
			]
		);

		// Box Hover Icon Color
		$this->add_control(
			'hover_bg_icon_text_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} :hover .box__bg__icon__text, {{WRAPPER}} :focus .box__bg__icon__text' => 'color: {{VALUE}};',
				],
			]
		);

		// Box Hover Icon Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_bg_icon_text_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} :hover .box__bg__icon__text,{{WRAPPER}} :focus .box__bg__icon__text',
			]
		);

		// Icon Hr
		$this->add_control(
			'bg_icon_text_hr4',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_bg_icon_text_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} :hover .box__bg__icon__text,{{WRAPPER}} :hover .box__bg__icon__text',
			]
		);

		// Icon Opacity
		$this->add_control(
			'bg_icon_text_hover_opacity',
			[
				'label'      => __( 'Opacity', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.1,
				],
				'selectors' => [
					'{{WRAPPER}} :hover .box__bg__icon__text' => 'opacity: {{SIZE}};',
				],
			]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			BOX BG ICON TEXXT STYLE END
		-----------------------------*/

		/*----------------------------
			TITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .box__title',
			]
		);

		$this->start_controls_tabs( 'title_tab_style' );
		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

		// Title Color
		$this->add_control(
			'title_text_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .box__title, {{WRAPPER}} .box__title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Title Hover Link Color
		$this->add_control(
			'hover_title_color',
			[
				'label'     => __( 'Link Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box__title a:hover, {{WRAPPER}} .box__title a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		// Box Hover Title Color
		$this->add_control(
			'box_hover_title_color',
			[
				'label'     => __( 'Box Hover Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} :hover .box__title a, {{WRAPPER}} :focus .box__title a, {{WRAPPER}} :hover .box__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		// Title Margin
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			TITLE STYLE END
		-----------------------------*/

		/*----------------------------
			SUBTITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_style_section',
			[
				'label' => __( 'Subtitle', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .box__subtitle',
			]
		);

		// Subtitle Color
		$this->add_control(
			'subtitle_color',
			[
				'label'  => __( 'Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .box__subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		// Box Hover Subtitle Color
		$this->add_control(
			'box_hover_subtitle_color',
			[
				'label'  => __( 'Box Hover Color', 'ultimate' ),
				'type'   => Controls_Manager::COLOR,
				'scheme' => [
					'type'  => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} :hover .box__subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		// Subtitle Margin
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SUBTITLE STYLE END
		-----------------------------*/

		/*----------------------------
			BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button', 'ultimate' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .box__button',
			]
		);

		// Button Hr
		$this->add_control(
			'hr50',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);


		$this->start_controls_tabs( 'button_tab_style' );
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

		// Button Color
		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.box__button, {{WRAPPER}} .box__button' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'button_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__button',
			]
		);

		// Button Border
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'button_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .box__button',
			]
		);

		// Button Radius
		$this->add_control(
			'button_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Button Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'button_shadow',
				'selector' => '{{WRAPPER}} .box__button',
			]
		);

		// Button Hr
		$this->add_control(
			'button_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Button Width
		$this->add_control(
			'button_width',
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
					'{{WRAPPER}} .box__button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Button Height
		$this->add_control(
			'button_height',
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
					'{{WRAPPER}} .box__button' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'button_position',
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
					'{{WRAPPER}} .box__button' => 'position: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_vertical_position',
			[
				'label'      => __( 'Position Vertical', 'ultimate' ),
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
					'{{WRAPPER}} .box__button' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);
		
		$this->add_responsive_control(
			'button_horizontal_position',
			[
				'label'      => __( 'Position Horizontal', 'ultimate' ),
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
					'{{WRAPPER}} .box__button' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_position!' => ['initial','static']
				],
			]
		);

		// Button Hr
		$this->add_control(
			'button_hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Button Margin
		$this->add_responsive_control(
			'button_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Padding
		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

		// Button Hover Color
		$this->add_control(
			'hover_button_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box__button:hover, {{WRAPPER}} a.box__button:focus, {{WRAPPER}} .box__button:focus' => 'color: {{VALUE}};',
				],
			]
		);

		// Button Hover BG
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_button_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .box__button:hover,{{WRAPPER}} .box__button:focus',
			]
		);	

		// Button Radius
		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'hover_button_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .box__button:hover,{{WRAPPER}} .box__button:focus',
			]
		);

		// Button Hover Radius
		$this->add_control(
			'hover_button_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .box__button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button Hover Box Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_button_shadow',
				'selector' => '{{WRAPPER}} .box__button:hover',
			]
		);

		// Button Hover Animation
		$this->add_control(
			'button_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'ultimate' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} .box__button:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			BUTTON STYLE END
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

		$this->start_controls_tabs( 'box_tab_style' );
		$this->start_controls_tab(
			'box_normal_tab',
			[
				'label' => __( 'Normal', 'ultimate' ),
			]
		);

			// Box Color
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
						'{{WRAPPER}} .single__box' => 'color: {{VALUE}}',
					],
				]
			);

			// Box Typography
			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'typography',
					'selector' => '{{WRAPPER}} .single__box',
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'box_background',
					'label' => __( 'Background', 'ultimate' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .single__box',
				]
			);

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
						'{{WRAPPER}} .single__box' => 'text-align: {{VALUE}};',
					],
				]
			);

			// Box Border
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'box_border',
					'label'    => __( 'Border', 'ultimate' ),
					'selector' => '{{WRAPPER}} .single__box',
				]
			);

			// Box Radius
			$this->add_control(
				'box_radius',
				[
					'label'      => __( 'Border Radius', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .single__box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			// Box Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'box_shadow',
					'selector' => '{{WRAPPER}} .single__box',
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
						'{{WRAPPER}} .single__box' => 'transition: {{SIZE}}s;',
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
						'{{WRAPPER}} .single__box' => 'position: {{VALUE}};',
					],
				]
			);

			// BOX Margin
			$this->add_responsive_control(
				'box_margin',
				[
					'label'      => __( 'Margin', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .single__box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// BOX Padding
			$this->add_responsive_control(
				'box_padding',
				[
					'label'      => __( 'Padding', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .single__box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Box Height
			$this->add_control(
				'box_height',
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
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .single__box' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover_tab',
			[
				'label' => __( 'Hover', 'ultimate' ),
			]
		);

			// Hover Color
			$this->add_control(
				'hover_box_color',
				[
					'label'  => __( 'Color', 'ultimate' ),
					'type'   => Controls_Manager::COLOR,
					'scheme' => [
						'type'  => Core\Schemes\Color::get_type(),
						'value' => Core\Schemes\Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .single__box:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'hover_box_background',
					'label' => __( 'Background', 'ultimate' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .single__box:hover',
				]
			);

			// Box Border
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'hover_box_border',
					'label'    => __( 'Border', 'ultimate' ),
					'selector' => '{{WRAPPER}} .single__box:hover',
				]
			);

			// Box Radius
			$this->add_control(
				'hover_box_radius',
				[
					'label'      => __( 'Border Radius', 'ultimate' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .single__box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			// Box Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'hover_box_shadow',
					'selector' => '{{WRAPPER}} .single__box:hover',
				]
			);

			// Box Height
			$this->add_control(
				'box_hover_height',
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
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .single__box:hover' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			// Transform
			$this->add_control(
				'hover_box_transform',
				[
					'label'      => __( 'Transform Vartically', 'ultimate' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range'      => [
						'px' => [
							'min'  => -100,
							'max'  => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .single__box:hover' => 'transform: translateY({{SIZE}}{{UNIT}});',
					],
				]
			);

		$this->end_controls_tab();
		$this->end_controls_tabs();

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

		$this->start_controls_tabs( 'before_after_tab_style' );
		$this->start_controls_tab(
			'before_tab',
			[
				'label' => __( 'BEFORE', 'ultimate' ),
			]
		);

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'before_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__box:before',
			]
		);

		// Before Display;
		$this->add_responsive_control(
			'before_display',
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
					'{{WRAPPER}} .single__box:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Before Postion
		$this->add_responsive_control(
			'before_position',
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
					'{{WRAPPER}} .single__box:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'before_position_from_left',
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
					'{{WRAPPER}} .single__box:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'before_position_from_right',
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
					'{{WRAPPER}} .single__box:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'before_position_from_top',
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
					'{{WRAPPER}} .single__box:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'before_position_from_bottom',
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
					'{{WRAPPER}} .single__box:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'before_position!' => ['initial','static']
				],
			]
		);

		// Before Align
		$this->add_responsive_control(
			'before_align',
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
					'{{WRAPPER}} .single__box:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'before_width',
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
					'{{WRAPPER}} .single__box:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'before_height',
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
					'{{WRAPPER}} .single__box:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'before_opacity',
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
					'{{WRAPPER}} .single__box:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'before_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .single__box:before',
			]
		);
		$this->add_control(
			'before_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'before_shadow',
				'selector' => '{{WRAPPER}} .single__box:before',
			]
		);

		// Before Z-Index
		$this->add_control(
			'before_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__box:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Before Margin
		$this->add_responsive_control(
			'before_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Transition
		$this->add_control(
			'before_transition',
			[
				'label'      => __( 'Transition', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 5,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:before' => 'transition: {{SIZE}}s;',
				],
			]
		);

		$this->add_control(
			'before_popover_toggle',
			[
				'label' => __( 'Transform', 'ultimate' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		// Scale
		$this->add_control(
			'before_scale',
			[
				'label'      => __( 'Scale', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:before' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'before_rotate',
			[
				'label'      => __( 'Rotate', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
				],
			]
		);
		$this->end_popover();

		/*----------------
			BEFORE HOVER
		-------------------*/
		$this->add_control(
			'before_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'before_hover_hr',
            [
                'label'     => __( 'Before Hover', 'ultimate' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

		// Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_before_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__box:hover:before',
			]
		);

		// Before Width
		$this->add_responsive_control(
			'hover_before_width',
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
					'{{WRAPPER}} .single__box:hover:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Height
		$this->add_responsive_control(
			'hover_before_height',
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
					'{{WRAPPER}} .single__box:hover:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Before Opacity
		$this->add_control(
			'hover_before_opacity',
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
					'{{WRAPPER}} .single__box:hover:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'hover_before_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'before_hover_popover_toggle',
			[
				'label' => __( 'Transform', 'ultimate' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();
		// Scale
		$this->add_control(
			'hover_before_scale',
			[
				'label'      => __( 'Scale', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'hover_before_rotate',
			[
				'label'      => __( 'Rotate', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
				],
			]
		);
		$this->end_popover();

		$this->end_controls_tab();

		$this->start_controls_tab(
			'after_tab',
			[
				'label' => __( 'AFTER', 'ultimate' ),
			]
		);

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'after_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__box:after',
			]
		);

		// After Display;
		$this->add_responsive_control(
			'after_display',
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
					'{{WRAPPER}} .single__box:after' => 'display: {{VALUE}};',
				],
			]
		);

		// After Postion
		$this->add_responsive_control(
			'after_position',
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
					'{{WRAPPER}} .single__box:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'after_position_from_left',
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
					'{{WRAPPER}} .single__box:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'after_position_from_right',
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
					'{{WRAPPER}} .single__box:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'after_position_from_top',
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
					'{{WRAPPER}} .single__box:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'after_position_from_bottom',
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
					'{{WRAPPER}} .single__box:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'after_position!' => ['initial','static']
				],
			]
		);

		// After Align
		$this->add_responsive_control(
			'after_align',
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
					'{{WRAPPER}} .single__box:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// After Width
		$this->add_responsive_control(
			'after_width',
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
					'{{WRAPPER}} .single__box:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Height
		$this->add_responsive_control(
			'after_height',
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
					'{{WRAPPER}} .single__box:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// After Opacity
		$this->add_control(
			'after_opacity',
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
					'{{WRAPPER}} .single__box:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border:: get_type(),
			[
				'name'     => 'after_border',
				'label'    => __( 'Border', 'ultimate' ),
				'selector' => '{{WRAPPER}} .single__box:after',
			]
		);

		$this->add_control(
			'after_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'after_shadow',
				'selector' => '{{WRAPPER}} .single__box:after',
			]
		);

		// After Z-Index
		$this->add_control(
			'after_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .single__box:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// After Margin
		$this->add_responsive_control(
			'after_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Transition
		$this->add_control(
			'after_transition',
			[
				'label'      => __( 'Transition', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0.1,
						'max'  => 5,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0.3,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:after' => 'transition: {{SIZE}}s;',
				],
			]
		);

		$this->add_control(
			'after_popover_toggle',
			[
				'label' => __( 'Transform', 'ultimate' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();

		// Scale
		$this->add_control(
			'after_scale',
			[
				'label'      => __( 'Scale', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:after' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'after_rotate',
			[
				'label'      => __( 'Rotate', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
				],
			]
		);
		$this->end_popover();

		/*----------------
			AFTER HOVER
		-------------------*/
		$this->add_control(
			'after_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'after_hover_hr',
            [
                'label'     => __( 'After Hover', 'ultimate' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

		// After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'hover_after_background',
				'label'    => __( 'Background', 'ultimate' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .single__box:hover:after',
			]
		);

		// after Width
		$this->add_responsive_control(
			'hover_after_width',
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
					'{{WRAPPER}} .single__box:hover:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// after Height
		$this->add_responsive_control(
			'hover_after_height',
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
					'{{WRAPPER}} .single__box:hover:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// after Opacity
		$this->add_control(
			'hover_after_opacity',
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
					'{{WRAPPER}} .single__box:hover:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'hover_after_radius',
			[
				'label'      => __( 'Border Radius', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__box:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'after_hover_popover_toggle',
			[
				'label' => __( 'Transform', 'ultimate' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();
		// Scale
		$this->add_control(
			'hover_after_scale',
			[
				'label'      => __( 'Scale', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
				],
			]
		);

		// Rotate
		$this->add_control(
			'hover_after_rotate',
			[
				'label'      => __( 'Rotate', 'ultimate' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => -360,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .single__box:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
				],
			]
		);
		$this->end_popover();

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			BOX BEFORE / AFTER END
		-----------------------------*/
		
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

		// Title Link Attr
		if ( ! empty( $settings['title_link']['url'] ) ) {
			$this->add_render_attribute( 'title_link', 'href', $settings['title_link']['url'] );

			if ( $settings['title_link']['is_external'] ) {
				$this->add_render_attribute( 'title_link', 'target', '_blank' );
			}

			if ( $settings['title_link']['nofollow'] ) {
				$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
			}
		}

		// Button Link Attr
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_render_attribute( 'more_button', 'href', $settings['button_link']['url'] );

			if ( $settings['button_link']['is_external'] ) {
				$this->add_render_attribute( 'more_button', 'target', '_blank' );
			}

			if ( $settings['button_link']['nofollow'] ) {
				$this->add_render_attribute( 'more_button', 'rel', 'nofollow' );
			}
		}
		
		// Button animation
		if ( $settings['button_hover_animation'] ) {
			$button_animation = 'elementor-animation-' . $settings['button_hover_animation'];
		}else{
			$button_animation = '';
		}

		// Icon Animation
		if ( $settings['icon_hover_animation'] ) {
			$icon_animation = 'elementor-animation-' . $settings['icon_hover_animation'];
		}else{
			$icon_animation = '';
		}

		// Icon Condition
		if ( 'yes' == $settings['show_icon'] ) {
			if ( 'font_icon' == $settings['icon_type'] && !empty( $settings['font_icon'] ) ) {
				$icon = '<div class="box__icon '. esc_attr( $icon_animation ) .'"><i class="'.esc_attr( $settings['font_icon'] ).'"></i></div>';
			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){
				$icon_array = $settings['image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'full' );
				$icon = '<div class="box__icon '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}
		}else{
			$icon = '';
		}

		// Title Tag
		if ( !empty( $settings['title_tag'] ) ) {
			$title_tag = $settings['title_tag'];
		}else{
			$title_tag = 'h3';
		}

		// Title
		if ( !empty( $settings['title'] ) ) {
			if ( !empty( $settings['title_link'] ) && !empty( $this->get_render_attribute_string( 'title_link' ) ) ) {
				$title = '<'.$title_tag.' class="box__title"><a '.$this->get_render_attribute_string( 'title_link' ).'>'.esc_html( $settings['title'] ).'</a></'.$title_tag.'>';
			}else{
				$title = '<'.$title_tag.' class="box__title">'.esc_html( $settings['title'] ).'</'.$title_tag.'>';
			}
		}else{
			$title = '';
		}

		// Subtitle
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<div class="box__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
		}else{
			$subtitle = '';
		}

		// Description
		if ( !empty( $settings['description'] ) ) {
			$description = '<div class="box__description">'.wpautop( $settings['description'] ).'</div>';
		}else{
			$description = '';
		}
		
		// Button
		if ( 'yes' == $settings['show_button'] && ( !empty($settings['button_text'] ) && !empty($settings['button_link'] ) ) ) {
			$button = '<a class="box__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'</a>';
		}else{
			$button = '';
		}

		// Button With Icon
		if ( !empty(  $settings['button_icon'] ) ) {
			if (  'left' == $settings['button_icon_align'] ) {
				$button = '<a class="box__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'><i class="box__button_icon_left '.esc_attr($settings['button_icon']).'"></i>'. esc_html( $settings['button_text'] ) .'</a>';
			}elseif( 'right' == $settings['button_icon_align'] ){
				$button = '<a class="box__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'<i class="box__button_icon_right '.esc_attr($settings['button_icon']).'"></i></a>';
			}
		}


		// Title Condition
		if ( !empty($settings['subtitle_position']) ) {
			if ( 'before_title' == $settings['subtitle_position'] ) {
				$title_subtitle = $subtitle . $title;
			}elseif( 'after_title' == $settings['subtitle_position'] ){
				$title_subtitle = $title . $subtitle;
			}elseif( empty($settings['subtitle']) ){
				$title_subtitle = $title . $subtitle;
			}
		}else{
			$title_subtitle = $title . $subtitle;
		}

		if ( 'yes' == $settings['show_box_image'] ) {
			$box_big_img = Group_Control_Image_Size::get_attachment_image_html( $settings, 'box_image_size', 'box_image' );
			$box_image = '<div class="box__big__thumb">'.$box_big_img.'</div>';
		}else{
			$box_image = '';
		}


		// BOX BACKGROUND ICON OR TEXT
		if ( 'yes' == $settings['show_box_bg_text_or_icon'] ) {
			if ( 'font_icon' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_font_icon'] ) ) {
				$box_iocn_or_text = '<div class="box__bg__icon__text"><i class="'.esc_attr( $settings['box_bg_font_icon'] ).'"></i></div>';
			}elseif( 'image_icon' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_image_icon'] ) ){
				$icon_array = $settings['box_bg_image_icon'];
				$icon_link = wp_get_attachment_image_url( $icon_array['id'], 'full' );
				$box_iocn_or_text = '<div class="box__bg__icon__text"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}elseif( 'simple_text' == $settings['box_bg_icon_type'] && !empty( $settings['box_bg_text'] ) ){
				$box_iocn_or_text = '<div class="box__bg__icon__text">'. esc_html( $settings['box_bg_text'] ) .'</div>';
			}
		}else{
			$box_iocn_or_text = '';
		}



		$this->add_render_attribute( 'box_style_attr', 'class', 'single__box' );
		if ( 'single__box__layout__custom' != $settings['box_layout_style'] ) {
			$this->add_render_attribute( 'box_style_attr', 'class', $settings['box_layout_style'] );
		}

		if ( 'yes' == $settings['show_box_image'] ) {
			if ( 'before' == $settings['box_image_postion'] ) {
				echo'
					<div class="single__box_wrap">
						'.( isset( $box_image ) ? $box_image : '' ).'
						<div '.$this->get_render_attribute_string('box_style_attr').'>
							'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
							'.( isset( $icon ) ? $icon : '' ).'
							'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
							'.( isset( $description ) ? $description : '' ).'
							'.( isset( $button ) ? $button : '' ).'
						</div>
					</div>
				';
			}elseif ( 'after' == $settings['box_image_postion'] ) {
				echo'
					<div class="single__box_wrap">
						<div '.$this->get_render_attribute_string('box_style_attr').'>
							'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
							'.( isset( $icon ) ? $icon : '' ).'
							'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
							'.( isset( $description ) ? $description : '' ).'
							'.( isset( $button ) ? $button : '' ).'
						</div>
						'.( isset( $box_image ) ? $box_image : '' ).'
					</div>
				';
			}
		}else{
			echo'
				<div '.$this->get_render_attribute_string('box_style_attr').'>
					'.( isset( $box_iocn_or_text ) ? $box_iocn_or_text : '' ).'
					'.( isset( $icon ) ? $icon : '' ).'
					'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
					'.( isset( $description ) ? $description : '' ).'
					'.( isset( $button ) ? $button : '' ).'
				</div>
			';
		}
	}

	protected function content_template() {}

}