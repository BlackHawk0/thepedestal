<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ultimate_Menu_Widget extends Widget_Base {

    public function get_name() {
        return 'Ultimate_Menu_Widget';
    }
    
    public function get_title() {
        return __( 'Navigation', 'ultimate' );
    }

    public function get_icon() {
        return 'eicon-nav-menu uladdon-omnivus';
    }

    public function get_categories() {
        return [ 'ultimate-addons' ];
    }

    private function get_available_menus() {

		$menus     = wp_get_nav_menus();
		$menulists = [];
        foreach ( $menus as $menu ) {
            $menulists[ $menu->slug ] = $menu->name;
        }
        return $menulists;

    }

    protected function register_controls() {

        $this->start_controls_section(
            'inline_menu_content',
            [
                'label' => __( 'Select Navigation & Style', 'ultimate' ),
            ]
        );
            
            $this->add_control(
                'inline_menu_style',
                [
                    'label'   => __( 'Style', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'      => __( 'Style One', 'ultimate' ),
                        '2'      => __( 'Style Two', 'ultimate' ),
                        '3'      => __( 'Style Three', 'ultimate' ),
                        'custom' => __( 'Custom Style', 'ultimate' ),
                    ],
                ]
            );

            if ( ! empty( $this->get_available_menus() ) ) {
                $this->add_control(
                    'inline_menu_id',
                    [
                        'label'        => __( 'Menu', 'ultimate' ),
                        'type'         => Controls_Manager::SELECT,
                        'options'      => $this->get_available_menus(),
                        'default'      => array_keys( $this->get_available_menus() )[0],
                        'save_default' => true,
                        'separator'    => 'after',
                        'description'  => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus Option</a> to manage your menus.', 'ultimate' ), admin_url( 'nav-menus.php' ) ),
                    ]
                );
            } else {
                $this->add_control(
                    'inline_menu_id',
                    [
                        'type'      => Controls_Manager::RAW_HTML,
                        'raw'       => sprintf( __( '<strong>There are no menus in your site.</strong><br>Go to the <a href="%s" target="_blank">Menus Option</a> to create one.', 'ultimate' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
                        'separator' => 'after',
                    ]
                );
            }


        $this->end_controls_section();

        /*------------------------
			MENU ITEMS STYLE
        -------------------------*/
        $this->start_controls_section(
            'inline_menu_style_section',
            [
                'label' => __( 'Menu Items', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
		$this->add_responsive_control(
			'menu_items_display',
			[
				'label'   => __( 'Display', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'block',				
				'options' => [
                    'initial'      => __( 'Initial', 'ultimate' ),
                    'block'        => __( 'Block', 'ultimate' ),
                    'inline-block' => __( 'Inline Block', 'ultimate' ),
                    'flex'         => __( 'Flex', 'ultimate' ),
                    'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
                    'inherit'      => __( 'Inherit', 'ultimate' ),
                    'none'         => __( 'None', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu li' => 'display: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'menu_items_width',
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
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'menu_items_height',
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
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'menu_items_float',
			[
				'label'   => __( 'Float', 'ultimate' ),
				'type'    => Controls_Manager::SELECT,
                'default' => 'none',
				'options' => [
					'left'  =>  __( 'Left', 'ultimate' ),
					'right' =>  __( 'Right', 'ultimate' ),
                    'none'  =>  __( 'None', 'ultimate' ),
					'inherit'  =>  __( 'Inherit', 'ultimate' ),
				],
				'selectors' => [
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu' => 'float:{{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
            'menu_items_list_style',
            [
                'label'   => __( 'List Style', 'ultimate' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',                
                'options' => [
                    'none'                 =>__('None','ultimate'),
                    'disc'                 =>__('Disc','ultimate'),
                    'circle'               =>__('Circle','ultimate'),
                    'square'               =>__('Square','ultimate'),
                    'decimal'              =>__('Decimal','ultimate'),
                    'decimal-leading-zero' =>__('Decimal-leading-zero','ultimate'),
                    'lower-roman'          =>__('Lower Roman','ultimate'),
                    'upper-roman'          =>__('Upper Roman','ultimate'),
                    'lower-greek'          =>__('Lower Greek','ultimate'),
                    'lower-latin'          =>__('Lower Latin','ultimate'),
                    'upper-latin'          =>__('Upper Latin','ultimate'),
                    'armenian'             =>__('Armenian','ultimate'),
                    'georgian'             =>__('Georgian','ultimate'),
                    'lower-alpha'          =>__('Lower Alpha','ultimate'),
                    'upper-alpha'          =>__('Upper Alpha','ultimate'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .single__menu__nav ul.ultimate__menu' => 'list-style: {{VALUE}};',
                ],
            ]
        );

		$this->add_responsive_control(
			'menu_items_align',
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
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'menu_items_margin',
			[
				'label'      => __( 'Margin', 'ultimate' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .single__menu__nav ul.ultimate__menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
        /*------------------------
			MENU ITEMS STYLE
        -------------------------*/

        /*------------------------
			MENU ITEM STYLE
        -------------------------*/
        $this->start_controls_section(
            'inline_menu_item_style_section',
            [
                'label' => __( 'Single Menu Item', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'menu_typography',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a',
                ]
            );

            $this->add_responsive_control(
                'menu_display',
                [
                    'label'   => __( 'Display', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'block',                
                    'options' => [
                        'initial'      => __( 'Initial', 'ultimate' ),
                        'block'        => __( 'Block', 'ultimate' ),
                        'inline-block' => __( 'Inline Block', 'ultimate' ),
                        'flex'         => __( 'Flex', 'ultimate' ),
                        'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a' => 'display: {{VALUE}};',
                    ],
                ]
            );

            // Menu Normal Tab
            $this->start_controls_tabs( 'menu_style_tabs' );

                $this->start_controls_tab(
                    'menu_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );
                    $this->add_control(
                        'menu_normal_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'menu_normal_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'menu_normal_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a',
                        ]
                    );

                    $this->add_responsive_control(
                        'menu_normal_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator' => 'after',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'      => 'menu_normal_box_shadow',
                            'label'     => __( 'Box Shadow', 'ultimate' ),
                            'selector'  => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a',
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Text_Shadow:: get_type(),
                        [
                            'name'     => 'menu_normal_text_shadow',
                            'label'    => __( 'Text Shadow', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a',
                        ]
                    );

                    $this->add_responsive_control(
                        'menu_normal_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );
                    $this->add_responsive_control(
                        'menu_normal_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                 // Menu Hover Tab
                $this->start_controls_tab(
                    'menu_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );
                    
                    $this->add_control(
                        'menu_hover_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu > li:hover > a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'menu_hover_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu > li:hover > a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'menu_hover_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu > li:hover > a',
                        ]
                    );

                    $this->add_responsive_control(
                        'menu_hover_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu > li:hover > a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator' => 'after',
                        ]
                    );

                $this->end_controls_tab();

                // Menu Active Tab
                $this->start_controls_tab(
                    'menu_style_active_tab',
                    [
                        'label' => __( 'Active', 'ultimate' ),
                    ]
                );
                    
                    $this->add_control(
                        'menu_active_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li.current-menu-item a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'menu_active_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li.current-menu-item a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'menu_active_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li.current-menu-item a',
                        ]
                    );

                    $this->add_responsive_control(
                        'menu_active_border_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__menu__nav ul.ultimate__menu li.current-menu-item a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator' => 'after',
                        ]
                    );

                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        /*-------------------------
			MENU ITEM STYLE END
        --------------------------*/

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $id       = $this->get_id();

        $this->add_render_attribute( 'ultimate_menu_attr', 'class', 'ultimate__menu__area ultimate__menu__style__'.$settings['inline_menu_style'] );

        $menuargs = [
			'echo'        => false,
			'menu'        => $settings['inline_menu_id'],
			'menu_class'  => 'ultimate__menu',
			'menu_id'     => 'menu-'. $id,
			'fallback_cb' => '__return_empty_string',
			'container'   => '',
        ];

        // General Menu.
        $menu_html = wp_nav_menu( $menuargs );

        ?>
            <div <?php echo $this->get_render_attribute_string('ultimate_menu_attr'); ?> >
                <nav class="single__menu__nav">
                    <?php
                        if( !empty( $menu_html ) ){
                            echo $menu_html;
                        }
                    ?>
                </nav>
            </div>
        <?php
    }
}