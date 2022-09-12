<?php

namespace Elementor;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}


class Ultimate_Adv_Accordion extends Widget_Base {

    public function get_name() {
        return 'Ultimate_Adv_Accordion';
    }

    public function get_title() {
        return esc_html__('Advanced Accordion', 'ultimate');
    }

    public function get_icon() {
        return 'eicon-accordion uladdon-omnivus';
    }

    public function get_categories() {
        return ['ultimate-addons'];
    }

    /*
     * Elementor Templates List
     * return array
     */
    public function ultimate_elementor_template() {
        $templates = Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
        $types     = array();
        if ( empty( $templates ) ) {
            $template_lists = [ '0' => __( 'Do not Saved Templates.', 'ultimate' ) ];
        } else {
            $template_lists = [ '0' => __( 'Select Template', 'ultimate' ) ];
            foreach ( $templates as $template ) {
                $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            }
        }
        return $template_lists;
    }


    protected function register_controls() {
        /*--------------------------------
            Advance Accordion Settings
        ---------------------------------*/
        $this->start_controls_section(
            'ultimate_accordion_settings_section',
            [
                'label' => esc_html__('Accordicon Settings', 'ultimate'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'ultimate_accordion_type',
            [
                'label'       => esc_html__('Accordion Type', 'ultimate'),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'accordion',
                'label_block' => false,
                'options'     => [
                    'accordion' => esc_html__('Accordion', 'ultimate'),
                    'toggle'    => esc_html__('Toggle', 'ultimate'),
                ],
            ]
        );
        $this->add_control(
            'ultimate_accordion_show_icon',
            [
                'label'        => esc_html__('Enable Toggle Icon', 'ultimate'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_toggle_icon',
            [
                'label'   => esc_html__('Toggle Icon', 'ultimate'),
                'type'    => Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
                'include' => [
                    'fa fa-angle-right',
                    'fa fa-angle-double-right',
                    'fa fa-chevron-right',
                    'fa fa-chevron-circle-right',
                    'fa fa-arrow-right',
                    'fa fa-long-arrow-right',
                    'fa fa-plus',
                ],
                'condition' => [
                    'ultimate_accordion_show_icon' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ultimate_accordion_toggle_speed',
            [
                'label'       => esc_html__('Toggle Speed (ms)', 'ultimate'),
                'type'        => Controls_Manager::NUMBER,
                'label_block' => false,
                'default'     => 300,
            ]
        );
        $this->end_controls_section();

        /*--------------------------------------
            Advance Accordion Content Settings
        ----------------------------------------*/
        $this->start_controls_section(
            'ultimate_accordion_content_section',
            [
                'label' => esc_html__('Accordion Content', 'ultimate'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'ultimate_adv_accordion_tab_default_active', 
            [
                'label'        => esc_html__('Active as Default', 'ultimate'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes',
            ]
		);

		$repeater->add_control(
			'ultimate_accordion_show_tab_icon', 
            [
                'label'        => esc_html__('Enable Tab Icon', 'ultimate'),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            ]
		);

		$repeater->add_control(
			'ultimate_accordion_tab_title_icon',
			[
                'label'     => esc_html__('Icon', 'ultimate'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'fa fa-plus',
                'condition' => [
                    'ultimate_accordion_show_tab_icon' => 'yes',
                ],
            ]
		);
        
        $repeater->add_control(
			'ultimate_adv_accordion_tab_title',
			[
                'label'   => esc_html__('Tab Title', 'ultimate'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('Tab Title', 'ultimate'),
                'dynamic' => ['active' => true],
            ]
		);
        
        $repeater->add_control(
			'ultimate_accordion_text_type',
			[
                'label'   => __('Content Type', 'ultimate'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'content'  => __('Content', 'ultimate'),
                    'template' => __('Saved Templates', 'ultimate'),
                ],
                'default' => 'content',
            ]
		);
        
        $repeater->add_control(
			'ultimate_primary_templates',
			[
                'label'     => __('Choose Template', 'ultimate'),
                'type'      => Controls_Manager::SELECT,
                'options'   => $this->ultimate_elementor_template(),
                'condition' => [
                    'ultimate_accordion_text_type' => 'template',
                ],
            ]
		);
        
        $repeater->add_control(
			'ultimate_adv_accordion_tab_content',
			[
                'label'     => esc_html__('Tab Content', 'ultimate'),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.', 'ultimate'),
                'dynamic'   => ['active' => true],
                'condition' => [
                    'ultimate_accordion_text_type' => 'content',
                ],
            ]
		);

        $this->add_control(
            'ultimate_adv_accordion_tab',
            [
                'type'      => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'fields' => $repeater->get_controls(),
                'default'   => [
                    ['ultimate_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 1', 'ultimate')],
                    ['ultimate_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 2', 'ultimate')],
                    ['ultimate_adv_accordion_tab_title' => esc_html__('Accordion Tab Title 3', 'ultimate')],
                ],
                'title_field' => '{{ultimate_adv_accordion_tab_title}}',
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style Advance Accordion Generel Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'ultimate_adv_accordion_style_section',
            [
                'label' => esc_html__('Accordion Area Style', 'ultimate'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_responsive_control(
                'ultimate_adv_accordion_padding',
                [
                    'label'      => esc_html__('Padding', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__adv__accordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_accordion_margin',
                [
                    'label'      => esc_html__('Margin', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__adv__accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'ultimate_adv_accordion_border',
                    'label'    => esc_html__('Border', 'ultimate'),
                    'selector' => '{{WRAPPER}} .ultimate__adv__accordion',
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_accordion_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__adv__accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'ultimate_adv_accordion_box_shadow',
                    'selector' => '{{WRAPPER}} .ultimate__adv__accordion',
                ]
            );

        $this->end_controls_section();


        /**
         * -------------------------------------------
         * TAB ACCORDION ITEM STYLE
         * -------------------------------------------
         */
        $this->start_controls_section(
            'ultimate_adv_accordion_item_style_section',
            [
                'label' => esc_html__('Single Item Style', 'ultimate'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'ultimate_adv_item_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .ultimate__accordion__list',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'ultimate_adv_item_border',
                    'label'    => esc_html__('Border', 'ultimate'),
                    'selector' => '{{WRAPPER}} .ultimate__accordion__list',
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_item_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__accordion__list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'ultimate_adv_item_box_shadow',
                    'selector' => '{{WRAPPER}} .ultimate__accordion__list',
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_item_margin',
                [
                    'label'      => esc_html__('Margin', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__accordion__list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_item_padding',
                [
                    'label'      => esc_html__('Padding', 'ultimate'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .ultimate__accordion__list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();


        /**
         * -------------------------------------------
         * Tab Style Advance Accordion Content Style
         * -------------------------------------------
         */
        $this->start_controls_section(
            'ultimate_adv_accordions_tab_style_section',
            [
                'label' => esc_html__('Header Style', 'ultimate'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'iocn_hidding',
                [
                    'label'     => __( 'Icon', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_accordion_tab_icon_size',
                [
                    'label'   => __('Icon Size', 'ultimate'),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 16,
                        'unit' => 'px',
                    ],
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header .ultimate__accordion__icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'ultimate_adv_accordion_tab_icon_gap',
                [
                    'label'   => __('Icon Gap', 'ultimate'),
                    'type'    => Controls_Manager::SLIDER,
                    'default' => [
                        'size' => 10,
                        'unit' => 'px',
                    ],
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header .ultimate__accordion__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
            'title_hr',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_control(
                'title_hidding',
                [
                    'label'     => __( 'Title Wrap', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

        $this->start_controls_tabs('ultimate_adv_accordion_header_tabs');
        # Normal State Tab
        $this->start_controls_tab('ultimate_adv_accordion_header_normal', ['label' => esc_html__('Normal', 'ultimate')]);

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_tab_title_typography',
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header',
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_tab_color',
            [
                'label'     => esc_html__('Tab Background Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_tab_text_color',
            [
                'label'     => esc_html__('Text Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_tab_border',
                'label'    => esc_html__('Border', 'ultimate'),
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header',
            ]
        );
        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_padding',
            [
                'label'      => esc_html__('Padding', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_margin',
            [
                'label'      => esc_html__('Margin', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        # Hover State Tab
        $this->start_controls_tab(
            'ultimate_adv_accordion_header_hover',
            [
                'label' => esc_html__('Hover', 'ultimate'),
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_tab_color_hover',
            [
                'label'     => esc_html__('Tab Background Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_hover_tab_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover .ultimate__accordion__icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_tab_text_color_hover',
            [
                'label'     => esc_html__('Text Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_tab_icon_color_hover',
            [
                'label'     => esc_html__('Icon Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover .fa' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'ultimate_adv_accordion_toggle_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_tab_border_hover',
                'label'    => esc_html__('Border', 'ultimate'),
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover',
            ]
        );
        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        #Active State Tab
        $this->start_controls_tab(
            'ultimate_adv_accordion_header_active',
            [
                'label' => esc_html__('Active', 'ultimate'),
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_tab_color_active',
            [
                'label'     => esc_html__('Tab Background Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_active_tab_icon_color',
            [
                'label'     => esc_html__('Active Icon Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active .ultimate__accordion__icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_accordion_tab_text_color_active',
            [
                'label'     => esc_html__('Text Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'ultimate_adv_accordion_tab_icon_color_active',
            [
                'label'     => esc_html__('Icon Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active .fa' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'ultimate_adv_accordion_toggle_icon_show' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_tab_border_active',
                'label'    => esc_html__('Border', 'ultimate'),
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active',
            ]
        );
        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_border_radius_active',
            [
                'label'      => esc_html__('Border Radius', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /*-------------------------------------------
            Tab Style Advance Accordion Content Style
        * ------------------------------------------*/
        $this->start_controls_section(
            'ultimate_adv_accordion_tab_content_style_section',
            [
                'label' => esc_html__('Content Style', 'ultimate'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'adv_accordion_content_bg_color',
            [
                'label'     => esc_html__('Background Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'adv_accordion_content_text_color',
            [
                'label'     => esc_html__('Text Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_content_typography',
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content',
            ]
        );

        $this->add_responsive_control(
            'ultimate_adv_accordion_content_padding',
            [
                'label'      => esc_html__('Padding', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ultimate_adv_accordion_content_margin',
            [
                'label'      => esc_html__('Margin', 'ultimate'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'ultimate_adv_accordion_content_border',
                'label'    => esc_html__('Border', 'ultimate'),
                'selector' => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'      => 'ultimate_adv_accordion_content_shadow',
                'selector'  => '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__content',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Advance Accordion Caret Settings
         */
        $this->start_controls_section(
            'ultimate_adv_accordion_caret_section',
            [
                'label' => esc_html__('Toggle Caret Style', 'ultimate'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'ultimate_adv_accordion_tab_toggle_icon_size',
            [
                'label'   => __('Icon Size', 'ultimate'),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                    'unit' => 'px',
                ],
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header .toggle__icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'ultimate_accordion_show_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_tabs_tab_toggle_color',
            [
                'label'     => esc_html__('Caret Color', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header .toggle__icon' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'ultimate_accordion_show_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'ultimate_adv_tabs_tab_toggle_active_color',
            [
                'label'     => esc_html__('Caret Color (Active)', 'ultimate'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list .ultimate__accordion__header.active .toggle__icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ultimate__adv__accordion .ultimate__accordion__list:hover .ultimate__accordion__header .toggle__icon'  => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'ultimate_accordion_show_icon' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

        protected function render(){
            $settings = $this->get_settings_for_display();

            $id_int = substr($this->get_id_int(), 0, 3);

            $this->add_render_attribute('ultimate__adv__accordion', 'class', 'ultimate__adv__accordion');
            $this->add_render_attribute('ultimate__adv__accordion', 'id', 'ultimate__adv__accordion-' . esc_attr($this->get_id()));
            ?>
        <div
            <?php echo $this->get_render_attribute_string('ultimate__adv__accordion'); ?>
            <?php echo 'data-accordion-id="' . esc_attr($this->get_id()) . '"'; ?>
            <?php echo !empty($settings['ultimate_accordion_type']) ? 'data-accordion-type="' . esc_attr($settings['ultimate_accordion_type']) . '"' : 'accordion'; ?>
            <?php echo !empty($settings['ultimate_accordion_toggle_speed']) ? 'data-toogle-speed="' . esc_attr($settings['ultimate_accordion_toggle_speed']) . '"' : '300'; ?>
        >
            <?php
                foreach ($settings['ultimate_adv_accordion_tab'] as $index => $tab):

                $tab_count               = $index + 1;
                $tab_title_setting_key   = $this->get_repeater_setting_key('ultimate_adv_accordion_tab_title', 'ultimate_adv_accordion_tab', $index);
                $tab_content_setting_key = $this->get_repeater_setting_key('ultimate_adv_accordion_tab_content', 'ultimate_adv_accordion_tab', $index);

                $tab_title_class         = ['elementor-tab-title', 'ultimate__accordion__header'];
                $tab_content_class       = ['ultimate__accordion__content', 'clearfix'];

                if ($tab['ultimate_adv_accordion_tab_default_active'] == 'yes') {
                    $tab_title_class[]   = 'active-default';
                    $tab_content_class[] = 'active-default';
                }

                $this->add_render_attribute($tab_title_setting_key, [
                    'id'            => 'elementor-tab-title-' . $id_int . $tab_count,
                    'class'         => $tab_title_class,
                    'tabindex'      => $id_int . $tab_count,
                    'data-tab'      => $tab_count,
                    'aria-controls' => 'elementor-tab-content-' . $id_int . $tab_count,
                ]);

                $this->add_render_attribute($tab_content_setting_key, [
                    'id'              => 'elementor-tab-content-' . $id_int . $tab_count,
                    'class'           => $tab_content_class,
                    'data-tab'        => $tab_count,
                    'aria-labelledby' => 'elementor-tab-title-' . $id_int . $tab_count,
                ]);
            ?>
            <div class="ultimate__accordion__list">
                <div <?php echo $this->get_render_attribute_string($tab_title_setting_key); ?>>
                    <span class="ultimate__accordion__title__icon">
                        <?php if ($tab['ultimate_accordion_show_tab_icon'] === 'yes'): ?>
                            <i class="<?php echo esc_attr($tab['ultimate_accordion_tab_title_icon']); ?> ultimate__accordion__icon"></i>
                        <?php endif;?>
                        <?php echo $tab['ultimate_adv_accordion_tab_title']; ?>
                    </span>
                    <?php if ($settings['ultimate_accordion_show_icon'] === 'yes'): ?>
                        <i class="<?php echo esc_attr($settings['ultimate_adv_accordion_toggle_icon']); ?> toggle__icon"></i>
                    <?php endif;?>
                </div>
                <div <?php echo $this->get_render_attribute_string($tab_content_setting_key); ?>>
                    <?php 
                    if ('content' == $tab['ultimate_accordion_text_type']): ?>
                        <div class="adv__accor__content"><?php echo do_shortcode($tab['ultimate_adv_accordion_tab_content']); ?></div>
                        <?php
                    elseif ('template' == $tab['ultimate_accordion_text_type']):                    
                        if (!empty($tab['ultimate_primary_templates'])) {
                            $ultimate_template_id = $tab['ultimate_primary_templates'];
                            $ultimate_frontend    = new Frontend;
                            echo $ultimate_frontend->get_builder_content($ultimate_template_id, true);
                        }
                    endif;?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <?php
    }
    protected function content_template() {}
}