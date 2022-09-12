<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ultimate_Timeline_Widget extends Widget_Base {

    public function get_name() {
        return 'Ultimate_Timeline_Widget';
    }
    
    public function get_title() {
        return __( 'Horizontal Vartical Timeline', 'ultimate' );
    }

    public function get_icon() {
        return 'eicon-time-line uladdon-omnivus';
    }
    
	public function get_categories() {
		return [ 'ultimate-addons' ];
	}

    public function get_script_depends() {
        return [
            'timeline',
            'ultimate-core',
        ];
    }

    static function timeline_style(){
        return[
            '1' => __( 'Style One', 'ultimate' ),
        ];
    }
    
    protected function register_controls() {

        $this->start_controls_section(
            'timeline_content',
            [
                'label' => __( 'Timeline Content', 'ultimate' ),
            ]
        );
            $this->add_control(
                'image_carousel_style',
                [
                    'label'   => esc_html__( 'Timeline Style', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => self::timeline_style(),
                ]
            );
        
            $repeater = new Repeater();
            $repeater->add_control(
                'show_timeline_image',
                [
                    'label'        => __( 'Show Timeline Image ?', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'ultimate' ),
                    'label_off'    => __( 'Hide', 'ultimate' ),
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );
            $repeater->add_control(
                'timeline_image',
                [
                    'label'   => __( 'Box Image', 'ultimate' ),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'show_timeline_image' => 'yes',
                    ],
                ]
            );
            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name'      => 'timeline_image_size',
                    'exclude'   => [ 'custom' ],
                    'default'   => 'large',
                    'condition' => [
                        'show_timeline_image' => 'yes',
                    ],
                ]
            );

            $repeater->add_control(
                'show_image_meta',
                [
                    'label'        => __( 'Show Meta Inside Image ?', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'ultimate' ),
                    'label_off'    => __( 'Hide', 'ultimate' ),
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'separator'     => 'before',
                ]
            );
            $repeater->add_control(
                'timeline_date_time',
                [
                    'label'   => __( 'Date & Time', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'condition' => [
                        'show_image_meta' => 'yes',
                    ],
                ]
            );
            $repeater->add_control(
                'timeline_subtitle',
                [
                    'label'   => __( 'Subtitle', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '',
                    'separator'     => 'before',
                ]
            );
            $repeater->add_control(
                'timeline_title',
                [
                    'label'   => __( 'Title', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '',
                    'separator'     => 'before',
                ]
            );
            $repeater->add_control(
                'timeline_description',
                [
                    'label'   => __( 'Description', 'ultimate' ),
                    'type'    => Controls_Manager::WYSIWYG,
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, aut.',
                    'separator'     => 'before',
                ]
            );
            $repeater->add_control(
                'show_button',
                [
                    'label'        => __( 'Show Button ?', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => __( 'Show', 'ultimate' ),
                    'label_off'    => __( 'Hide', 'ultimate' ),
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'separator'     => 'before',
                ]
            );
            $repeater->add_control(
                'button_text',
                [
                    'label'       => __( 'Button Title', 'ultimate' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Button Text', 'ultimate' ),
                    'condition'   => ['show_button' => 'yes'],
                ]
            );
            $repeater->add_control(
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
            $repeater->add_control(
                'button_icon',
                [
                    'label'       => __( 'Icon', 'ultimate' ),
                    'type'        => Controls_Manager::ICON,
                    'label_block' => true,
                    'default'     => '',
                    'condition'   => ['show_button' => 'yes'],
                ]
            );
            $repeater->add_control(
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
            $repeater->add_control(
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
                        '{{WRAPPER}} .timeline__button .timeline__button_icon_right' => 'margin-left: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .timeline__button .timeline__button_icon_left'  => 'margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'timeline_content_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [
                        [
                            'timeline_title' => __('Timeline Title #1','ultimate'),
                        ],
                    ],
                    'title_field' => '{{{ timeline_title }}}',
                    'separator'   => 'before',
                ]
            );
        
        $this->end_controls_section();
        
        /*---------------------------
            TIMELINE SETTING
        ----------------------------*/
        $this->start_controls_section(
            'timeline_option',
            [
                'label'     => esc_html__( 'Timeline Option', 'ultimate' ),
            ]
        );
            $this->add_control(
                'mode',
                [
                    'label'   => esc_html__( 'Timeline Mode', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'horizontal',
                    'options' => [
                        'horizontal'  => __( 'Horizontal', 'ultimate' ),
                        'vertical' => __( 'Vertical', 'ultimate' ),
                    ],
                ]
            );
            $this->add_control(
                'horizontal_start_postion',
                [
                    'label'   => esc_html__( 'Horizontal Start Postion', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'top',
                    'options' => [
                        'top'  => __( 'Top', 'ultimate' ),
                        'bottom' => __( 'Bottom', 'ultimate' ),
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'vertical_start_postion',
                [
                    'label'   => esc_html__( 'Vartical Start Postion', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left'  => __( 'Left', 'ultimate' ),
                        'right' => __( 'Right', 'ultimate' ),
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'force_vartical_in',
                [
                    'label'     => esc_html__( 'Force Vartical Mode Width', 'ultimate' ),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 200,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 700,
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'move_item',
                [
                    'label'     => esc_html__( 'Item To Scroll', 'ultimate' ),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 5,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 1,
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'start_index',
                [
                    'label'     => esc_html__( 'Start Index', 'ultimate' ),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 5,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'vartical_trigger',
                [
                    'label'     => esc_html__( 'Vartical Trigger', 'ultimate' ),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'range' => [
                        'px' => [
                            'min' => 5,
                            'max' => 50,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 15,
                    ],
                    'separator'    => 'before',
                ]
            );
            $this->add_control(
                'show_item',
                [
                    'label'     => esc_html__( 'Default Visible Items', 'ultimate' ),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 3,
                            'max' => 20,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 3,
                    ],
                    'separator'    => 'before',
                ]
            );
        $this->end_controls_section();
        /*-----------------------
            TIMELINE SETTING END
        -------------------------*/

        /*-------------------------
            BORDER & DOTS CIRCLE
        --------------------------*/
        $this->start_controls_section(
            'timeline_border_dotcircle_style_section',
            [
                'label'     => __( 'Border & Dots Circle', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'timeline_dotcircle_heading',
                [
                    'label'     => __( 'Center Circle Dots', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'timeline_dotcircle_color_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .timeline__item:after',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'timeline_border_circle_background',
                    'label' => __( 'Border', 'ultimate' ),
                    'selector' => '{{WRAPPER}} .timeline__item:after',
                ]
            );
            $this->add_control(
                'timeline_border_heading',
                [
                    'label'     => __( 'Border Circle Dots', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'timeline_border_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .timeline-divider,{{WRAPPER}} .timeline:not(.timeline--horizontal):before',
                ]
            );
        $this->end_controls_section();
        /*------------------------
            BORDER & DOTS CIRCLE END
        -------------------------*/
         
        /*------------------------
             ARROW STYLE
        --------------------------*/
        $this->start_controls_section(
            'timeline_arrow_style',
            [
                'label'     => __( 'Arrow', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        
            $this->start_controls_tabs( 'timeline_arrow_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'timeline_arrow_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );

                    $this->add_control(
                        'timeline_arrow_color',
                        [
                            'label'  => __( 'Color', 'ultimate' ),
                            'type'   => Controls_Manager::COLOR,
                            'scheme' => [
                                'type'  => Core\Schemes\Color::get_type(),
                                'value' => Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_arrow_fontsize',
                        [
                            'label'      => __( 'Font Size', 'ultimate' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range'      => [
                                'px' => [
                                    'min'  => 0,
                                    'max'  => 100,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'timeline_arrow_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline-nav-button',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'timeline_arrow_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline-nav-button',
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'timeline_arrow_shadow',
                            'selector' => '{{WRAPPER}} .timeline-nav-button',
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_arrow_height',
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
                                'size' => 50,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_arrow_width',
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
                                'size' => 50,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_arrow_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline-nav-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'slide_button_position_from_left',
                        [
                            'label'      => __( 'Left Arrow Position From Left', 'ultimate' ),
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
                                '{{WRAPPER}} .timeline-nav-button.timeline-nav-button--prev' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion Bottom Top
                    $this->add_responsive_control(
                        'slide_button_position_from_bottom',
                        [
                            'label'      => __( 'Left Arrow Position From Top', 'ultimate' ),
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
                                '{{WRAPPER}} .timeline-nav-button.timeline-nav-button--prev' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'slide_button_position_from_right',
                        [
                            'label'      => __( 'Right Arrow Position From Right', 'ultimate' ),
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
                                '{{WRAPPER}} .timeline-nav-button.timeline-nav-button--next' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion Bottom Top
                    $this->add_responsive_control(
                        'slide_button_position_from_top',
                        [
                            'label'      => __( 'Right Arrow Position From Top', 'ultimate' ),
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
                                '{{WRAPPER}} .timeline-nav-button.timeline-nav-button--next' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'timeline_arrow_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );

                    $this->add_control(
                        'timeline_arrow_hover_color',
                        [
                            'label'  => __( 'Color', 'ultimate' ),
                            'type'   => Controls_Manager::COLOR,
                            'scheme' => [
                                'type'  => Core\Schemes\Color::get_type(),
                                'value' => Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'timeline_arrow_hover_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline-nav-button:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'timeline_arrow_hover_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline-nav-button:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'timeline_arrow_hover_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .timeline-nav-button:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'timeline_arrow_hover_shadow',
                            'selector' => '{{WRAPPER}} .timeline-nav-button:hover',
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_left',
                        [
                            'label'      => __( 'Left Arrow Position From Left', 'ultimate' ),
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
                                '{{WRAPPER}} :hover .timeline-nav-button.timeline-nav-button--prev' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion Bottom Top
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_bottom',
                        [
                            'label'      => __( 'Left Arrow Position From Top', 'ultimate' ),
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
                                '{{WRAPPER}} :hover .timeline-nav-button.timeline-nav-button--prev' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion From Left
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_right',
                        [
                            'label'      => __( 'Right Arrow Position From Right', 'ultimate' ),
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
                                '{{WRAPPER}} :hover .timeline-nav-button.timeline-nav-button--next' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Postion Bottom Top
                    $this->add_responsive_control(
                        'slide_button_hover_position_from_top',
                        [
                            'label'      => __( 'Right Arrow Position From Top', 'ultimate' ),
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
                                '{{WRAPPER}} :hover .timeline-nav-button.timeline-nav-button--next' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
             ARROW STYLE END
        --------------------------*/

        /*-------------------------
            ITEM BOX STYLE
        --------------------------*/
        $this->start_controls_section(
            'ultimate_carousel_style_section',
            [
                'label' => __( 'Item Style', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'carousel_single_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .timeline__content',
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow:: get_type(),
                [
                    'name'     => 'carousel_single_box_shadow',
                    'label'    => __( 'Box Shadow', 'ultimate' ),
                    'selector' => '{{WRAPPER}} .timeline__content',
                ]
            );
            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'carousel_single_border',
                    'label'    => __( 'Border', 'ultimate' ),
                    'selector' => '{{WRAPPER}} .timeline__content',
                ]
            );
            $this->add_responsive_control(
                'carousel_single_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .timeline__content' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'carousel_single_margin',
                [
                    'label'      => __( 'Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .timeline__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_responsive_control(
                'carousel_single_padding',
                [
                    'label'      => __( 'Padding', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .timeline__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
        /*-------------------------
            ITEM BOX STYLE END
        --------------------------*/

        /*-------------------------
            THUMB STYLE
        --------------------------*/
        $this->start_controls_section(
            'timeline_thumb_style_section',
            [
                'label'     => __( 'Thumbs', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );        
            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'timeline_thumb_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .timeline__thumb img',
                ]
            );
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
                    'selectors' => [
                        '{{WRAPPER}} .timeline__thumb img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
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
                    'selectors' => [
                        '{{WRAPPER}} .timeline__thumb img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'timeline_thumb_margin',
                [
                    'label'      => __( 'Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .timeline__thumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );                    
            $this->add_responsive_control(
                'timeline_thumb_padding',
                [
                    'label'      => __( 'Padding', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .timeline__thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );                

        $this->end_controls_section();
        /*------------------------
            THUMB STYLE END
        -------------------------*/


        /*------------------------
            CONTENT STYLE
        --------------------------*/
        $this->start_controls_section(
            'content_style_section',
            [
                'label'     => __( 'Content', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );        
            $this->start_controls_tabs( 'content_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'content_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );

                    $this->add_control(
                        'content_color',
                        [
                            'label'  => __( 'Color', 'ultimate' ),
                            'type'   => Controls_Manager::COLOR,
                            'scheme' => [
                                'type'  => Core\Schemes\Color::get_type(),
                                'value' => Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'content_typography',
                            'selector' => '{{WRAPPER}} .timeline__details',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'content_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__details,{{WRAPPER}} .timeline__details:after',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'content_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline__details',
                        ]
                    );
                    $this->add_responsive_control(
                        'content_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'content_shadow',
                            'selector' => '{{WRAPPER}} .timeline__details',
                        ]
                    );
                    $this->add_responsive_control(
                        'content_height',
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
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'content_width',
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
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'content_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'content_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );
                    $this->add_control(
                        'hover_content_color',
                        [
                            'label'  => __( 'Color', 'ultimate' ),
                            'type'   => Controls_Manager::COLOR,
                            'scheme' => [
                                'type'  => Core\Schemes\Color::get_type(),
                                'value' => Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_content_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__details:hover',
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'hover_content_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline__details:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_content_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__details:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'hover_content_shadow',
                            'selector' => '{{WRAPPER}} .timeline__details:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
            CONTENT STYLE END
        --------------------------*/

        /*-------------------------
            SUBTITLE STYLE
        --------------------------*/
        $this->start_controls_section(
            'subtitle_style_section',
            [
                'label'     => __( 'Subtitle', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );        
            $this->start_controls_tabs('subtitle_tabs_style');
                $this->start_controls_tab( 'subtitle_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'subtitle_typography',
                            'selector' => '{{WRAPPER}} .timeline__subtitle',
                        ]
                    );
                    $this->add_control(
                        'subtitle_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__subtitle' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'subtitle_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__subtitle',
                        ]
                    );
                    $this->add_responsive_control(
                        'subtitle_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );                    
                    $this->add_responsive_control(
                        'subtitle_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );                
                    $this->add_control(
                        'subtitle_transition',
                        [
                            'label'   => __( 'Transition Duration', 'ultimate' ),
                            'type'    => Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 0.3,
                            ],
                            'range' => [
                                'px' => [
                                    'max'  => 3,
                                    'step' => 0.1,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline__subtitle' => 'transition-duration: {{SIZE}}s',
                            ],
                        ]
                    );
                $this->end_controls_tab();         
                $this->start_controls_tab( 'subtitle_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );
                    $this->add_control(
                        'hover_subtitle_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__subtitle:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_subtitle_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'default'  => '#ffffff',
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__subtitle:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
            SUBTITLE STYLE END
        -------------------------*/

        /*-------------------------
            TITLE STYLE
        --------------------------*/
        $this->start_controls_section(
            'title_style_section',
            [
                'label'     => __( 'Title', 'ultimate' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );        
            $this->start_controls_tabs('title_tabs_style');
                $this->start_controls_tab( 'title_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'title_typography',
                            'selector' => '{{WRAPPER}} .timeline__title',
                        ]
                    );
                    $this->add_control(
                        'title_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__title' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'title_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__title',
                        ]
                    );
                    $this->add_responsive_control(
                        'title_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );                    
                    $this->add_responsive_control(
                        'title_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );                
                    $this->add_control(
                        'title_transition',
                        [
                            'label'   => __( 'Transition Duration', 'ultimate' ),
                            'type'    => Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 0.3,
                            ],
                            'range' => [
                                'px' => [
                                    'max'  => 3,
                                    'step' => 0.1,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .timeline__title' => 'transition-duration: {{SIZE}}s',
                            ],
                        ]
                    );
                $this->end_controls_tab();         
                $this->start_controls_tab( 'title_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );
                    $this->add_control(
                        'hover_title_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__title:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_title_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'default'  => '#ffffff',
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__title:hover',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*------------------------
            TITLE STYLE END
        -------------------------*/

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

            $this->start_controls_tabs( 'button_tabs_style' );
                $this->start_controls_tab(
                    'button_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );

                    // Typgraphy
                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'      => 'button_typography',
                            'selector'  => '{{WRAPPER}} .timeline__button a',
                        ]
                    );

                    // Icon Color
                    $this->add_control(
                        'button_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} .timeline__button a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    // Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'button_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .timeline__button a',
                        ]
                    );

                    // Border
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'button_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline__button a',
                        ]
                    );

                    // Radius
                    $this->add_responsive_control(
                        'button_radius',
                        [
                            'label'      => __( 'Border Radius', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    
                    // Shadow
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'button_shadow',
                            'selector' => '{{WRAPPER}} .timeline__button a',
                        ]
                    );

                    // Margin
                    $this->add_responsive_control(
                        'button_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Padding
                    $this->add_responsive_control(
                        'button_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

                    //Hover Color
                    $this->add_control(
                        'hover_button_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .timeline__button a:hover, {{WRAPPER}} .timeline__button a:focus' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    // Hover Background
                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'hover_button_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '.timeline__button a:hover, {{WRAPPER}} .timeline__button a:focus',
                        ]
                    );  

                    // Border
                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'hover_button_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .timeline__button a:hover, {{WRAPPER}} .timeline__button a:focus',
                        ]
                    );

                    // Radius
                    $this->add_responsive_control(
                        'hover_button_radius',
                        [
                            'label'      => __( 'Border Radius', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .timeline__button a:hover, {{WRAPPER}} .timeline__button a:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    // Shadow
                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'hover_button_shadow',
                            'selector' => '{{WRAPPER}} .timeline__button a:hover, {{WRAPPER}} .timeline__button a:focus',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*----------------------------
            BUTTON STYLE END
        -----------------------------*/

    }

    protected function render( $instance = [] ) {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'ultimate_timeline_attr', 'class', 'ultimate__timeline__activation' );
        $timeline_id = rand(2564,1245);
        $timeline_settings = [
            'timeline_id'              => $timeline_id,
            'mode'                     => $settings['mode'],
            'horizontal_start_postion' => $settings['horizontal_start_postion'],
            'vertical_start_postion'   => $settings['vertical_start_postion'],
            'force_vartical_in'        => absint($settings['force_vartical_in']['size']),
            'move_item'                => absint($settings['move_item']['size']),
            'start_index'              => absint($settings['start_index']['size']),
            'vartical_trigger'         => $settings['vartical_trigger']['size'].$settings['vartical_trigger']['unit'],
            'show_item'                => absint($settings['show_item']['size']),
        ];

        $this->add_render_attribute( 'ultimate_timeline_attr', 'id', 'ultimate__timeline__'.$timeline_id );
        $this->add_render_attribute( 'ultimate_timeline_attr', 'data-settings', wp_json_encode( $timeline_settings ) );
        $this->add_render_attribute('ultimate_timeline_item_parent_attr','class','timeline__item');
        $this->add_render_attribute('ultimate_timeline_item_content_attr','class','timeline__content ultimate__timeline__layout__'.$settings['image_carousel_style']);
        ?>
        <div <?php echo $this->get_render_attribute_string('ultimate_timeline_attr'); ?>>
            <div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
                        <?php foreach ( $settings['timeline_content_list'] as $timeline_content ): ?>

                            <?php
                                // Button Link Attr
                                if ( ! empty( $timeline_content['button_link']['url'] ) ) {
                                    $this->add_render_attribute( 'timeline_button_attr', 'href', $timeline_content['button_link']['url'] );

                                    if ( $timeline_content['button_link']['is_external'] ) {
                                        $this->add_render_attribute( 'timeline_button_attr', 'target', '_blank' );
                                    }
                                    if ( $timeline_content['button_link']['nofollow'] ) {
                                        $this->add_render_attribute( 'timeline_button_attr', 'rel', 'nofollow' );
                                    }
                                }

                                // Button
                                if ( 'yes' == $timeline_content['show_button'] && ( !empty($timeline_content['button_text'] ) && !empty($timeline_content['button_link'] ) ) ) {
                                    $button = '<a '.$this->get_render_attribute_string( 'timeline_button_attr' ).'>'. esc_html( $timeline_content['button_text'] ) .'</a>';
                                }else{
                                    $button = '';
                                }

                                // Button With Icon
                                if ( !empty(  $timeline_content['button_icon'] ) ) {
                                    if (  'left' == $timeline_content['button_icon_align'] ) {
                                        $button = '<a '.$this->get_render_attribute_string( 'timeline_button_attr' ).'><i class="timeline__button_icon_left '.esc_attr($timeline_content['button_icon']).'"></i>'. esc_html( $timeline_content['button_text'] ) .'</a>';
                                    }elseif( 'right' == $timeline_content['button_icon_align'] ){
                                        $button = '<a '.$this->get_render_attribute_string( 'timeline_button_attr' ).'>'. esc_html( $timeline_content['button_text'] ) .'<i class="timeline__button_icon_right '.esc_attr($timeline_content['button_icon']).'"></i></a>';
                                    }
                                }
                            ?>
                            <div <?php echo $this->get_render_attribute_string('ultimate_timeline_item_parent_attr'); ?>>
                                <div <?php echo $this->get_render_attribute_string('ultimate_timeline_item_content_attr'); ?>>                                    
                                    <?php if( 'yes' == $timeline_content['show_timeline_image'] && !empty( $timeline_content['timeline_image'] ) ): ?>
                                        <div class="timeline__thumb">
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $timeline_content, 'timeline_image_size', 'timeline_image' ); ?>
                                            <?php  if( 'yes' == $timeline_content['show_timeline_image'] && 'yes' == $timeline_content['show_image_meta'] && !empty($timeline_content['timeline_date_time']) ) : ?>
                                                <div class="timeline__date__time"><?php echo esc_html($timeline_content['timeline_date_time']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="timeline__details">
                                        <?php if( !empty($timeline_content['timeline_subtitle']) ): ?>
                                            <div class="timeline__subtitle"><?php echo esc_html($timeline_content['timeline_subtitle']); ?></div>
                                        <?php endif; ?>
                                        <?php if( !empty($timeline_content['timeline_title']) ): ?>
                                            <h3 class="timeline__title"><?php echo esc_html($timeline_content['timeline_title']); ?></h3>
                                        <?php endif; ?>
                                        <?php if( !empty($timeline_content['timeline_description']) ): ?>
                                            <div class="timeline__description">
                                                <?php echo $timeline_content['timeline_description']; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( 'yes' == $timeline_content['show_button'] && !empty( $button ) ) : ?>
                                            <div class="timeline__button"><?php echo $button; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}