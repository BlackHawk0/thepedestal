<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ultimate_Area_Title extends Widget_Base {

	public function get_name() {
		return 'UltimateAreaTitle';
	}

	public function get_title() {
		return __( 'Area Title', 'ultimate' );
	}

	public function get_icon() {
		return 'eicon-site-title uladdon-omnivus';
	}

	public function get_categories() {
		return array('ultimate-addons');
	}

	public static function title_before_style(){
		return [
			'set_title_before'       => 'Set Title Before',
			'set_subtitle_before'    => 'Set Subtitle Before',
			'set_description_before' => 'Set Description Before',
			'set_box_before'         => 'Set Box Before',
			'set_container_before'   => 'Set Container Before',
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

		// Show Bg Icon
		$this->add_control(
			'show_bg_icon',
			[
				'label'        => __( 'Show Background Icon ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		// Icon Type
		$this->add_control(
			'bg_icon_type',
			[
				'label'   => __( 'Background Icon Type', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'font_icon',
				'options' => [
					'font_icon'  => __( 'Font Icon', 'ultimate' ),
					'image_icon' => __( 'Image Icon', 'ultimate' ),
				],
				'condition' => [
					'show_bg_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'bg_font_or_svg',
			[
				'label'     => __( 'Font Icon', 'ultimate' ),
				'type'      => Controls_Manager::ICON,
				'condition' => [
					'show_bg_icon' => 'yes',
					'bg_icon_type' => 'font_icon',
				],
			]
		);

		// BG Image Icon
		$this->add_control(
			'bg_image_icon',
			[
				'label'   => __( 'Upload Image OR SVG Icon', 'ultimate' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_bg_icon' => 'yes',
					'bg_icon_type' => 'image_icon',
				],
			]
		);

		// Background Text
		$this->add_control(
			'show_bg_text',
			[
				'label'        => __( 'Show Background Text ?', 'ultimate' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'ultimate' ),
				'label_off'    => __( 'Hide', 'ultimate' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		// Title Bg Text
		$this->add_control(
			'title_bg_text',
			[
				'label'       => __( 'Title Background Text', 'ultimate' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Background Text', 'ultimate' ),
				'condition'   => [
					'show_bg_text' => 'yes',
				],
			]
		);

		// Title
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'ultimate' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Title', 'ultimate' ),
			]
		);

		// Title Tag
		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'elementor' ),
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
				'default'   => 'div',
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
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Description.', 'ultimate' ),
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
					'{{WRAPPER}} .area__button .area__button_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .area__button .area__button_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
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
				'label'     => __( 'Icon', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);
		
		// Icon Typgraphy
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'      => 'icon_typography',
				'selector'  => '{{WRAPPER}} .area__icon',
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
				],
				'selectors' => [
					'{{WRAPPER}} .area__icon img' => 'width: {{SIZE}}{{UNIT}};',
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
				'selector'  => '{{WRAPPER}} .area__icon img',
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
					'{{WRAPPER}} .area__icon' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .area__icon',
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
				'selector' => '{{WRAPPER}} .area__icon',
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
					'{{WRAPPER}} .area__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'icon_shadow',
				'selector' => '{{WRAPPER}} .area__icon',
			]
		);

		// Icon Hr
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

		// Icon Image Filter
		$this->add_group_control(
			Group_Control_Css_Filter:: get_type(),
			[
				'name'      => 'hover_icon_image_filters',
				'selector'  => '{{WRAPPER}} :hover .area__icon img',
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
					'{{WRAPPER}} :hover .area__icon, {{WRAPPER}} :focus .area__icon' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} :hover .area__icon,{{WRAPPER}} :focus .area__icon',
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
				'selector' => '{{WRAPPER}} :hover .area__icon,{{WRAPPER}} :hover .area__icon',
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
					'{{WRAPPER}} :hover .area__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Shadow
		$this->add_group_control(
			Group_Control_Box_Shadow:: get_type(),
			[
				'name'     => 'hover_icon_shadow',
				'selector' => '{{WRAPPER}} .area__icon:hover',
			]
		);

		// Icon Hover Animation
		$this->add_control(
			'icon_hover_animation',
			[
				'label'    => __( 'Hover Animation', 'ultimate' ),
				'type'     => Controls_Manager::HOVER_ANIMATION,
				'selector' => '{{WRAPPER}} :hover .area__icon',
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
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .area__icon' => 'width: {{SIZE}}{{UNIT}};',
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
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .area__icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Icon Hr
		$this->add_control(
			'icon_hr5',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// Icon Display;
		$this->add_responsive_control(
			'icon_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'inline-block',
				
				'options' => [
					'initial'      => __( 'Initial', 'ultimate' ),
					'block'        => __( 'Block', 'ultimate' ),
					'inline-block' => __( 'Inline Block', 'ultimate' ),
					'flex'         => __( 'Flex', 'ultimate' ),
					'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
					'none'         => __( 'none', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__icon' => 'display: {{VALUE}};',
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
					'{{WRAPPER}} .area__icon' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
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
				'default' => 'initial',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__icon' => 'position: {{VALUE}};',
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
					'{{WRAPPER}} .area__icon' => 'left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .area__icon' => 'right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .area__icon' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .area__icon' => 'bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .area__icon,{{WRAPPER}} .area__icon img' => 'transition: {{SIZE}}s;',
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
					'{{WRAPPER}} .area__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .area__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			ICON STYLE END
		-----------------------------*/

		/*----------------------------
			BACKGROUND ICON
		-----------------------------*/
		$this->start_controls_section(
			'bgicon_style_section',
			[
				'label'     => __( 'Background Icon', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_bg_icon' => 'yes',
				],
			]
		);
		
		// Bg Title Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'bgicon_typography',
				'selector' => '{{WRAPPER}} .area__content .title__bg__icon',
			]
		);

		// Bg Title Color
		$this->add_control(
			'bgicon_text_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .area__content .title__bg__icon' => 'color: {{VALUE}};',
				],
			]
		);

		// BG Icon Width
		$this->add_responsive_control(
			'bgicon_text_width',
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
					'size' => '100'
				],
				'selectors' => [
					'{{WRAPPER}} .area__content .title__bg__icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Bg Title Margin
		$this->add_responsive_control(
			'bgicon_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__content .title__bg__icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Bg Title Margin
		$this->add_responsive_control(
			'bgicon_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__content .title__bg__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Bg Title Before Opacity
		$this->add_control(
			'bgicon_opacity',
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
					'{{WRAPPER}} .area__content .title__bg__icon' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			BACKGROUND ICON END
		-----------------------------*/

		/*----------------------------
			BACKGROUND TEXT
		-----------------------------*/
		$this->start_controls_section(
			'bgtext_style_section',
			[
				'label'     => __( 'Background Text', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_bg_text' => 'yes',
				],
			]
		);
		
		// Bg Title Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'bgtext_typography',
				'selector' => '{{WRAPPER}} .area__content .title__bg__text',
			]
		);

		// Bg Title Color
		$this->add_control(
			'bgtext_text_color',
			[
				'label'     => __( 'Color', 'ultimate' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .area__content .title__bg__text' => 'color: {{VALUE}};',
				],
			]
		);

		// Bg Title Margin
		$this->add_responsive_control(
			'bgtext_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__content .title__bg__text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Bg Title Margin
		$this->add_responsive_control(
			'bgtext_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__content .title__bg__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Bg Title Before Opacity
		$this->add_control(
			'bgtext_opacity',
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
					'{{WRAPPER}} .area__content .title__bg__text' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			BACKGROUND TEXT END
		-----------------------------*/

		/*----------------------------
			TITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'title_style_section',
			[
				'label'     => __( 'Title', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				]
			]
		);
		
		// Title Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .area__title',
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
					'{{WRAPPER}} .area__title, {{WRAPPER}} .area__title a' => 'color: {{VALUE}};',
				],
			]
		);

		// Title Margin
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Title Margin
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => __( 'Padding', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .area__title a:hover, {{WRAPPER}} .area__title a:focus' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} :hover .area__title a, {{WRAPPER}} :focus .area__title a, {{WRAPPER}} :hover .area__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			TITLE STYLE END
		-----------------------------*/

		/*----------------------------
			TITLE BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'title_before_after_style_section',
			[
				'label'     => __( 'Title Before / After', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'title!' => '',
				]
			]
		);

		$this->start_controls_tabs( 'title_before_after_tab_style' );
		$this->start_controls_tab(
			'title_before_tab',
			[
				'label' => __( 'BEFORE', 'ultimate' ),
			]
		);

		// Title Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'title_before_background',
				'label'    => __( 'Background', 'plugin-domain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .area__title:before',
			]
		);

		// Title Before Display;
		$this->add_responsive_control(
			'title_before_display',
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
					'{{WRAPPER}} .area__title:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Title Before Postion
		$this->add_responsive_control(
			'title_before_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__title:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'title_before_position_from_left',
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
					'{{WRAPPER}} .area__title:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'title_before_position_from_right',
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
					'{{WRAPPER}} .area__title:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'title_before_position_from_top',
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
					'{{WRAPPER}} .area__title:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'title_before_position_from_bottom',
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
					'{{WRAPPER}} .area__title:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_before_position!' => ['initial','static']
				],
			]
		);

		// Title Before Align
		$this->add_responsive_control(
			'title_before_align',
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
					'{{WRAPPER}} .area__title:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title Before Width
		$this->add_responsive_control(
			'title_before_width',
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
					'{{WRAPPER}} .area__title:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Height
		$this->add_responsive_control(
			'title_before_height',
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
					'{{WRAPPER}} .area__title:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Opacity
		$this->add_control(
			'title_before_opacity',
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
					'{{WRAPPER}} .area__title:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title Before Z-Index
		$this->add_control(
			'title_before_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .area__title:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title Before Margin
		$this->add_responsive_control(
			'title_before_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__title:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_after_tab',
			[
				'label' => __( 'AFTER', 'ultimate' ),
			]
		);

		// Title After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'title_after_background',
				'label'    => __( 'Background', 'plugin-domain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .area__title:after',
			]
		);

		// Title After Display;
		$this->add_responsive_control(
			'title_after_display',
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
					'{{WRAPPER}} .area__title:after' => 'display: {{VALUE}};',
				],
			]
		);

		// Title After Postion
		$this->add_responsive_control(
			'title_after_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__title:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'title_after_position_from_left',
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
					'{{WRAPPER}} .area__title:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'title_after_position_from_right',
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
					'{{WRAPPER}} .area__title:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'title_after_position_from_top',
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
					'{{WRAPPER}} .area__title:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'title_after_position_from_bottom',
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
					'{{WRAPPER}} .area__title:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_after_position!' => ['initial','static']
				],
			]
		);

		// Title After Align
		$this->add_responsive_control(
			'title_after_align',
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
					'{{WRAPPER}} .area__title:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title After Width
		$this->add_responsive_control(
			'title_after_width',
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
					'{{WRAPPER}} .area__title:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Height
		$this->add_responsive_control(
			'title_after_height',
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
					'{{WRAPPER}} .area__title:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Opacity
		$this->add_control(
			'title_after_opacity',
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
					'{{WRAPPER}} .area__title:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title After Z-Index
		$this->add_control(
			'title_after_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .area__title:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title After Margin
		$this->add_responsive_control(
			'title_after_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__title:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		/*----------------------------
			TITLE BEFORE / AFTER END
		-----------------------------*/

		/*----------------------------
			SUBTITLE STYLE
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_style_section',
			[
				'label'     => __( 'Subtitle', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				]
			]
		);

		// Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .area__subtitle',
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
					'{{WRAPPER}} .area__subtitle' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} :hover .area__subtitle' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .area__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			SUBTITLE STYLE END
		-----------------------------*/

		/*----------------------------
			SUBTITLE BEFORE / AFTER
		-----------------------------*/
		$this->start_controls_section(
			'subtitle_before_after_style_section',
			[
				'label'     => __( 'Subtitle Before / After', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle!' => '',
				]
			]
		);

		$this->start_controls_tabs( 'subtitle_before_after_tab_style' );
		$this->start_controls_tab(
			'subtitle_before_tab',
			[
				'label' => __( 'BEFORE', 'ultimate' ),
			]
		);

		// Title Before Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'subtitle_before_background',
				'label'    => __( 'Background', 'plugin-domain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .area__subtitle:before',
			]
		);

		// Title Before Display;
		$this->add_responsive_control(
			'subtitle_before_display',
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
					'{{WRAPPER}} .area__subtitle:before' => 'display: {{VALUE}};',
				],
			]
		);

		// Title Before Postion
		$this->add_responsive_control(
			'subtitle_before_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__subtitle:before' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'subtitle_before_position_from_left',
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
					'{{WRAPPER}} .area__subtitle:before' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'subtitle_before_position_from_right',
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
					'{{WRAPPER}} .area__subtitle:before' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'subtitle_before_position_from_top',
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
					'{{WRAPPER}} .area__subtitle:before' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_before_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'subtitle_before_position_from_bottom',
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
					'{{WRAPPER}} .area__subtitle:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_before_position!' => ['initial','static']
				],
			]
		);

		// Title Before Align
		$this->add_responsive_control(
			'subtitle_before_align',
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
					'{{WRAPPER}} .area__subtitle:before' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title Before Width
		$this->add_responsive_control(
			'subtitle_before_width',
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
					'{{WRAPPER}} .area__subtitle:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Height
		$this->add_responsive_control(
			'subtitle_before_height',
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
					'{{WRAPPER}} .area__subtitle:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title Before Opacity
		$this->add_control(
			'subtitle_before_opacity',
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
					'{{WRAPPER}} .area__subtitle:before' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title Before Z-Index
		$this->add_control(
			'subtitle_before_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .area__subtitle:before' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title Before Margin
		$this->add_responsive_control(
			'subtitle_before_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__subtitle:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'subtitle_after_tab',
			[
				'label' => __( 'AFTER', 'ultimate' ),
			]
		);

		// Title After Background
		$this->add_group_control(
			Group_Control_Background:: get_type(),
			[
				'name'     => 'subtitle_after_background',
				'label'    => __( 'Background', 'plugin-domain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .area__subtitle:after',
			]
		);

		// Title After Display;
		$this->add_responsive_control(
			'subtitle_after_display',
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
					'{{WRAPPER}} .area__subtitle:after' => 'display: {{VALUE}};',
				],
			]
		);

		// Title After Postion
		$this->add_responsive_control(
			'subtitle_after_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'relative',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .area__subtitle:after' => 'position: {{VALUE}};',
				],
			]
		);

		// Postion From Left
		$this->add_responsive_control(
			'subtitle_after_position_from_left',
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
					'{{WRAPPER}} .area__subtitle:after' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Right
		$this->add_responsive_control(
			'subtitle_after_position_from_right',
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
					'{{WRAPPER}} .area__subtitle:after' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Top
		$this->add_responsive_control(
			'subtitle_after_position_from_top',
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
					'{{WRAPPER}} .area__subtitle:after' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_after_position!' => ['initial','static']
				],
			]
		);

		// Postion From Bottom
		$this->add_responsive_control(
			'subtitle_after_position_from_bottom',
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
					'{{WRAPPER}} .area__subtitle:after' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'subtitle_after_position!' => ['initial','static']
				],
			]
		);

		// Title After Align
		$this->add_responsive_control(
			'subtitle_after_align',
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
					'{{WRAPPER}} .area__subtitle:after' => '{{VALUE}};',
				],
				'default' => 'text-align:left',
			]
		);

		// Title After Width
		$this->add_responsive_control(
			'subtitle_after_width',
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
					'{{WRAPPER}} .area__subtitle:after' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Height
		$this->add_responsive_control(
			'subtitle_after_height',
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
					'{{WRAPPER}} .area__subtitle:after' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Title After Opacity
		$this->add_control(
			'subtitle_after_opacity',
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
					'{{WRAPPER}} .area__subtitle:after' => 'opacity: {{SIZE}};',
				],
			]
		);

		// Title After Z-Index
		$this->add_control(
			'subtitle_after_zindex',
			[
				'label'     => __( 'Z-Index', 'ultimate' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => -99,
				'max'       => 99,
				'step'      => 1,
				'selectors' => [
					'{{WRAPPER}} .area__subtitle:after' => 'z-index: {{SIZE}};',
				],
			]
		);

		// Title After Margin
		$this->add_responsive_control(
			'subtitle_after_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .area__subtitle:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		/*----------------------------
			SUBTITLE BEFORE / AFTER END
		-----------------------------/*

		/*----------------------------
			BUTTON STYLE
		-----------------------------*/
		$this->start_controls_section(
			'button_style_section',
			[
				'label'     => __( 'Button', 'ultimate' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_button' => 'yes'
				],
			]
		);

		// Button Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .area__button',
			]
		);

		// Button Hr
		$this->add_control(
			'hrrr',
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
						'{{WRAPPER}} a.area__button, {{WRAPPER}} .area__button' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .area__button',
				]
			);

			// Button Border
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'button_border',
					'label'    => __( 'Border', 'ultimate' ),
					'selector' => '{{WRAPPER}} .area__button',
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
						'{{WRAPPER}} .area__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			// Button Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'button_shadow',
					'selector' => '{{WRAPPER}} .area__button',
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
						'{{WRAPPER}} .area__button' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .area__button' => 'height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .area__button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .area__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .area__button:hover, {{WRAPPER}} a.area__button:focus, {{WRAPPER}} .area__button:focus' => 'color: {{VALUE}};',
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
					'selector' => '{{WRAPPER}} .area__button:hover,{{WRAPPER}} .area__button:focus',
				]
			);	

			// Button Radius
			$this->add_group_control(
				Group_Control_Border:: get_type(),
				[
					'name'     => 'hover_button_border',
					'label'    => __( 'Border', 'ultimate' ),
					'selector' => '{{WRAPPER}} .area__button:hover,{{WRAPPER}} .area__button:focus',
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
						'{{WRAPPER}} .area__button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			// Button Hover Box Shadow
			$this->add_group_control(
				Group_Control_Box_Shadow:: get_type(),
				[
					'name'     => 'hover_button_shadow',
					'selector' => '{{WRAPPER}} .area__button:hover',
				]
			);

			// Button Hover Animation
			$this->add_control(
				'button_hover_animation',
				[
					'label'    => __( 'Hover Animation', 'ultimate' ),
					'type'     => Controls_Manager::HOVER_ANIMATION,
					'selector' => '{{WRAPPER}} .area__button:hover',
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

		// Box Typography
		$this->add_group_control(
			Group_Control_Typography:: get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .area__content',
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
					'{{WRAPPER}} .area__content' => 'color: {{VALUE}}',
				],
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
					'{{WRAPPER}} :hover .area__content' => 'color: {{VALUE}}',
				],
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
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
					'{{WRAPPER}}' => 'transition: {{SIZE}}s;',
				],
			]
		);

		// Postion
		$this->add_responsive_control(
			'box_position',
			[
				'label'   => __( 'Position', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'initial',
				
				'options' => [
					'initial'  => __( 'Initial', 'ultimate' ),
					'absolute' => __( 'Absulute', 'ultimate' ),
					'relative' => __( 'Relative', 'ultimate' ),
					'static'   => __( 'Static', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}}' => 'position: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		/*----------------------------
			BOX STYLE END
		-----------------------------*/
		
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();

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
				$icon = '<div class="area__icon '. esc_attr( $icon_animation ) .'"><i class="'.esc_attr( $settings['font_icon'] ).'"></i></div>';
			}elseif( 'image_icon' == $settings['icon_type'] && !empty( $settings['image_icon'] ) ){
				$icon_array = $settings['image_icon'];
				$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
				$icon       = '<div class="area__icon '. esc_attr( $icon_animation ) .'"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';
			}
		}else{
			$icon = '';
		}

		// Title Background Text
		if ( !empty($settings['title_bg_text']) ) {
			$title_bg_text = '<div class="title__bg__text">'.esc_html( $settings['title_bg_text'] ).'</div>';
		}else{
			$title_bg_text = '';
		}

		// Title Background Icon
		/*if ( 'yes' == $settings['show_bg_icon'] ) {

			if ( 'font_icon' == $settings['bg_icon_type'] && !empty($settings['bg_font_or_svg']) ) {

				$title_bg_icon = '<div class="title__bg__icon">'.Icons_Manager::render_icon( $settings['bg_font_or_svg'], [ 'aria-hidden' => 'true' ] ).'</div>';

			}elseif ( 'image_icon' == $settings['bg_icon_type'] && !empty($settings['bg_image_icon']) ) {

				$icon_array    = $settings['bg_image_icon'];
				$icon_link     = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
				$title_bg_icon = '<div class="title__bg__icon"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>';

			}
		}else{
			$title_bg_icon = '';
		}*/

		// Title Tag
		if ( !empty( $settings['title_tag'] ) ) {
			$title_tag = $settings['title_tag'];
		}else{
			$title_tag = 'div';
		}

		// Title
		if ( !empty( $settings['title'] ) ) {
			$title = '<'.$title_tag.' class="area__title">'.wpautop( $settings['title'] ).'</'.$title_tag.'>';
		}else{
			$title = '';
		}

		// Subtitle
		if ( !empty( $settings['subtitle'] ) ) {
			$subtitle = '<div class="area__subtitle">'.esc_html( $settings['subtitle'] ).'</div>';
		}else{
			$subtitle = '';
		}

		// Description
		if ( !empty( $settings['description'] ) ) {
			$description = '<div class="area__description">'.wpautop( $settings['description'] ).'</div>';
		}else{
			$description = '';
		}
		
		// Button
		if ( 'yes' == $settings['show_button'] && ( !empty($settings['button_text'] ) && !empty($settings['button_link'] ) ) ) {
			$button = '<a class="area__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'</a>';
		}

		// Button With Icon
		if ( !empty(  $settings['button_icon'] ) ) {
			if (  'left' == $settings['button_icon_align'] ) {
				$button = '<a class="area__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'><i class="area__button_icon_left '.esc_attr($settings['button_icon']).'"></i>'. esc_html( $settings['button_text'] ) .'</a>';
			}elseif( 'right' == $settings['button_icon_align'] ){
				$button = '<a class="area__button '. esc_attr( $button_animation ) .'" '.$this->get_render_attribute_string( 'more_button' ).'>'. esc_html( $settings['button_text'] ) .'<i class="area__button_icon_right '.esc_attr($settings['button_icon']).'"></i></a>';
			}
		}

		// Title Condition
		if ( 'before_title' == $settings['subtitle_position'] ) {
			$title_subtitle = $subtitle . $title;
		}elseif( 'after_title' == $settings['subtitle_position'] ){
			$title_subtitle = $title . $subtitle;
		}elseif( empty($settings['subtitle']) ){
			$title_subtitle = $title . $subtitle;
		}

		echo'<div class="area__content">'; ?>
		
			<?php if ( 'yes' == $settings['show_bg_icon'] ) :  ?>
				<?php if ( 'font_icon' == $settings['bg_icon_type'] && !empty($settings['bg_font_or_svg']) ) : ?>
					<div class="title__bg__icon"><i class="<?php echo $settings['bg_font_or_svg']; ?>"></i></div>
				<?php elseif ( 'image_icon' == $settings['bg_icon_type'] && !empty($settings['bg_image_icon']) ) : ?>
					<?php
						$icon_array = $settings['bg_image_icon'];
						$icon_link  = wp_get_attachment_image_url( $icon_array['id'], 'thumbnail' );
						echo '<div class="title__bg__icon"><img src="'. esc_url( $icon_link ) .'" alt="" /></div>'; 
					?>
				<?php endif; ?>
			<?php endif;
			echo''.( isset( $title_bg_text ) ? $title_bg_text : '' ).'
				'.( isset( $icon ) ? $icon : '' ).'
				'.( isset( $title_subtitle ) ? $title_subtitle : '' ).'
				'.( isset( $description ) ? $description : '' ).'
				'.( isset( $button ) ? $button : '' ).'';
		echo'</div>';
	}

	protected function content_template() {}

}