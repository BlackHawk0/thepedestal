<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ultimate_Pricing_Table extends Widget_Base {

    public function get_name() {
        return 'Ultimate_Pricing_Table';
    }
    
    public function get_title() {
        return __( 'Price Table', 'ultimate' );
    }

    public function get_icon() {
        return 'eicon-price-table uladdon-omnivus';
    }
    
    public function get_categories() {
        return [ 'ultimate-addons' ];
    }

    public function element_style_type() {
        $price_style = [
                        '4' => __( 'Style One', 'ultimate' ),
                    ];
        return $price_style;
    }

    protected function register_controls() {

         // Layout Fields tab start
        $this->start_controls_section(
            'ultimate_pricing_layout',
            [
                'label' => __( 'Layout', 'ultimate' ),
            ]
        );
            $this->add_control(
                'ultimate_pricing_style',
                [
                    'label'   => __( 'Style', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => $this->element_style_type(),
                ]
            );

            $this->add_control(
                'ultimate_show_features_icon',
                [
                    'label'        => esc_html__( 'Show Features Icon', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

        $this->end_controls_section();
        /*----------------------------
            LAYOUT FIELDS TAB END
        ------------------------------*/

        /*----------------------------
            HEADER FIELDS TAB START
        ------------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_header',
            [
                'label' => __( 'Header', 'ultimate' ),
            ]
        );
        
            $this->add_control(
                'pricing_title',
                [
                    'label'       => __( 'Title', 'ultimate' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( 'Standard', 'ultimate' ),
                    'default'     => __( 'Standard', 'ultimate' ),
                    'title'       => __( 'Enter your service title', 'ultimate' ),
                ]
            );

            $this->add_control(
                'ultimate_ribon_pricing_table',
                [
                    'label'        => esc_html__( 'Ribon', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'      => 'pricing_table_ribon_background',
                    'label'     => __( 'Ribon Background', 'ultimate' ),
                    'types'     => [ 'classic', 'gradient' ],
                    'selector'  => '{{WRAPPER}} .single__price',
                    'condition' => [
                        'ultimate_ribon_pricing_table' => 'yes'
                    ]
                ]
            );

            $this->add_control(
                'pricing_table_ribon_image',
                [
                    'label'   => __('Ribon image','ultimate'),
                    'type'    => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => '',
                    ],
                    'condition' => [
                        'ultimate_ribon_pricing_table' => 'yes'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .price__ribon::before' => 'content: url( {{URL}} )',
                    ]
                ]
            );

            $this->add_control(
                'ultimate_header_icon_type',
                [
                    'label'   => __('Image or Icon','ultimate'),
                    'type'    => Controls_Manager::CHOOSE,
                    'options' => [
                        'img' =>[
                            'title' => __('Image','ultimate'),
                            'icon'  => 'fa fa-picture-o',
                        ],
                        'icon' =>[
                            'title' => __('Icon','ultimate'),
                            'icon'  => 'fa fa-info',
                        ]
                    ],
                    'default'   => 'img',
                    'condition' => [
                        'ultimate_pricing_style' => '2'
                    ]
                ]
            );

            $this->add_control(
                'headerimage',
                [
                    'label'   => __('Image','ultimate'),
                    'type'    => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    
                    'condition' => [
                        'ultimate_pricing_style'    => '2',
                        'ultimate_header_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size:: get_type(),
                [
                    'name'      => 'headerimagesize',
                    'default'   => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'ultimate_pricing_style'    => '2',
                        'ultimate_header_icon_type' => 'img',
                    ]
                ]
            );

            $this->add_control(
                'headericon',
                [
                    'label'     => esc_html__('Icon','ultimate'),
                    'type'      => Controls_Manager::ICON,
                    'default'   => 'fa fa-pencil',
                    'condition' => [
                        'ultimate_pricing_style'    => '2',
                        'ultimate_header_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            HEADER FIELDS TAB END
        ------------------------------*/

        /*----------------------------
           PRICING FIELDS TAB START
        ------------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_price',
            [
                'label' => __( 'Pricing', 'ultimate' ),
            ]
        );

            $this->add_control(
                'ultimate_price',
                [
                    'label'   => esc_html__( 'Price', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '35.50',
                ]
            );

            $this->add_control(
                'ultimate_offer_price',
                [
                    'label'        => esc_html__( 'Offer', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );

            $this->add_control(
                'ultimate_original_price',
                [
                    'label'     => esc_html__( 'Original Price', 'ultimate' ),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => '49',
                    'condition' => [
                        'ultimate_offer_price' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_currency_symbol',
                [
                    'label'   => __( 'Currency Symbol', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        ''             => esc_html__( 'None', 'ultimate' ),
                        'dollar'       => '&#36; ' . __( 'Dollar', 'ultimate' ),
                        'euro'         => '&#128; ' . __( 'Euro', 'ultimate' ),
                        'baht'         => '&#3647; ' . __( 'Baht', 'ultimate' ),
                        'franc'        => '&#8355; ' . __( 'Franc', 'ultimate' ),
                        'guilder'      => '&fnof; ' . __( 'Guilder', 'ultimate' ),
                        'krona'        => 'kr ' . __( 'Krona', 'ultimate' ),
                        'lira'         => '&#8356; ' . __( 'Lira', 'ultimate' ),
                        'peseta'       => '&#8359 ' . __( 'Peseta', 'ultimate' ),
                        'peso'         => '&#8369; ' . __( 'Peso', 'ultimate' ),
                        'pound'        => '&#163; ' . __( 'Pound Sterling', 'ultimate' ),
                        'real'         => 'R$ ' . __( 'Real', 'ultimate' ),
                        'ruble'        => '&#8381; ' . __( 'Ruble', 'ultimate' ),
                        'rupee'        => '&#8360; ' . __( 'Rupee', 'ultimate' ),
                        'indian_rupee' => '&#8377; ' . __( 'Rupee (Indian)', 'ultimate' ),
                        'shekel'       => '&#8362; ' . __( 'Shekel', 'ultimate' ),
                        'yen'          => '&#165; ' . __( 'Yen/Yuan', 'ultimate' ),
                        'won'          => '&#8361; ' . __( 'Won', 'ultimate' ),
                        'custom'       => __( 'Custom', 'ultimate' ),
                    ],
                    'default' => 'dollar',
                ]
            );

            $this->add_control(
                'ultimate_currency_position',
                [
                    'label'   => __( 'Currency Position', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'left'  => __( 'Left', 'ultimate' ),
                        'right' => __( 'Right', 'ultimate' ),
                    ],
                    'default' => 'left',
                ]
            );

            $this->add_control(
                'ultimate_currency_symbol_custom',
                [
                    'label'     => __( 'Custom Symbol', 'ultimate' ),
                    'type'      => Controls_Manager::TEXT,
                    'condition' => [
                        'ultimate_currency_symbol' => 'custom',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_period',
                [
                    'label'   => esc_html__( 'Period', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( '/Monthly', 'ultimate' ),
                ]
            );

        $this->end_controls_section();
        /*----------------------------
           PRICING FIELDS TAB END
        ------------------------------*/
        
        /*----------------------------
           FEATURES TAB START
        ------------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_features',
            [
                'label' => __( 'Features', 'ultimate' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'ultimate_price_title',
                [
                    'label'   => esc_html__( 'Title', 'ultimate' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Features Tilte', 'ultimate' ),
                ]
            );

            $repeater->add_control(
                'ultimate_old_features',
                [
                    'label'        => esc_html__( 'Old Features', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );

            $repeater->add_control(
                'ultimate_features_icon',
                [
                    'label'   => esc_html__( 'Icon', 'ultimate' ),
                    'type'    => Controls_Manager::ICON,
                    'default' => 'fa fa-check-circle-o',
                ]
            );

            $repeater->add_control(
                'ultimate_features_icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'ultimate_features_icon!' => '',
                    ]
                ]
            );

            $this->add_control(
                'ultimate_features_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'ultimate_price_title'   => esc_html__( 'Features Title One', 'ultimate' ),
                            'ultimate_features_icon' => 'fa fa-angle-double-right',
                        ],

                        [
                            'ultimate_price_title'   => esc_html__( 'Features Title Two', 'ultimate' ),
                            'ultimate_features_icon' => 'fa fa-angle-double-right',
                        ],

                        [
                            'ultimate_price_title'   => esc_html__( 'Features Title Three', 'ultimate' ),
                            'ultimate_features_icon' => 'fa fa-angle-double-right',
                        ],
                    ],
                    'title_field' => '{{{ ultimate_price_title }}}',
                ]
            );

        $this->end_controls_section();
        /*----------------------------
           FEATURES FIELDS TAB END
        ------------------------------*/

        /*----------------------------
            FOOTER TAB START
        ------------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_footer',
            [
                'label' => __( 'Footer', 'ultimate' ),
            ]
        );

            $this->add_control(
                'ultimate_price_button',
                [
                    'label'        => esc_html__( 'Show Price Button', 'ultimate' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'default'      => 'yes',
                    'return_value' => 'yes',
                ]
            );
            
            $this->add_control(
                'ultimate_button_text',
                [
                    'label'     => esc_html__( 'Button Text', 'ultimate' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__( 'Purchase Now', 'ultimate' ),
                    'condition' => [
                        'ultimate_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_button_link',
                [
                    'label'       => __( 'Link', 'ultimate' ),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => 'http://your-link.com',
                    'default'     => [
                        'url' => '#',
                    ],
                    'condition'=> [
                        'ultimate_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_button_icon',
                [
                    'label'     => esc_html__( 'Button Icon', 'ultimate' ),
                    'type'      => Controls_Manager::ICON,
                    'condition' => [
                        'ultimate_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_button_icon_alignment',
                [
                    'label'   => esc_html__( 'Icon Position', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left'  => esc_html__( 'Before', 'ultimate' ),
                        'right' => esc_html__( 'After', 'ultimate' ),
                    ],
                    'condition' => [
                        'ultimate_button_icon!' => '',
                        'ultimate_price_button' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'ultimate_button_icon_indent',
                [
                    'label' => esc_html__( 'Icon Spacing', 'ultimate' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'max' => 60,
                        ],
                    ],
                    'condition' => [
                        'ultimate_button_icon!' => '',
                        'ultimate_price_button' => 'yes',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .price_btn i.price_btn_icon_left'  => 'margin-right: {{SIZE}}px;',
                        '{{WRAPPER}} .price_btn i.price_btn_icon_right' => 'margin-left: {{SIZE}}px;',
                    ],
                ]
            );

        $this->end_controls_section();
        /*------------------------------
            FOOTER FIELDS TAB END
        -------------------------------*/

        /*-------------------------------
            HEADER STYLE TAB START
        --------------------------------*/
        $this->start_controls_section(
            'ultimate_header_style',
            [
                'label' => __( 'Header', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'pricing_header_area_style',
                [
                    'label'     => __( 'Header Area', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'pricing_header_padding',
                [
                    'label'      => __( 'Padding', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_margin',
                [
                    'label'      => __( 'Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header',
                ]
            );

            $this->add_control(
                'pricing_header_hover_heading_title',
                [
                    'label'     => __( 'Header Area Hover Background', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_hover_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector' => '{{WRAPPER}} .single__price:hover .single__price__header',
                ]
            );

            $this->add_control(
                'pricing_header_heading_title',
                [
                    'label'     => __( 'Title', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_title_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__title h3' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_header_title_hover_color',
                [
                    'label'     => __( 'Hover Title Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .price__title h3' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .price__title h3',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                ]
            );

            $this->add_responsive_control(
                'pricing_header_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__title h3' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_header_heading_price',
                [
                    'label'     => __( 'Price', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_price_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .new__price' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_control(
                'pricing_header_price_hover_color',
                [
                    'label'     => __( 'Price Hover Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .new__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_price_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .new__price',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_price_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header .new__price',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_price_border',
                    'label'    => __( 'Border', 'ultimate' ),
                    'selector' => '{{WRAPPER}} .single__price__header .new__price',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_price_radius',
                [
                    'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .new__price' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*-------------------------
                OFFER PRICE
            --------------------------*/
            $this->add_control(
                'pricing_offer_heading_price',
                [
                    'label'     => __( 'Offer Price', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_offer_price_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .old__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_header_offer_price_hover_color',
                [
                    'label'     => __( 'Hover Offer Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .old__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .old__price',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__header .old__price',
                ]
            );

            $this->add_group_control(
                Group_Control_Border:: get_type(),
                [
                    'name'     => 'pricing_header_offer_price_border',
                    'label'    => __( 'Border', 'ultimate' ),
                    'selector' => '{{WRAPPER}} .single__price__header .old__price',
                ]
            );

            $this->add_responsive_control(
                'pricing_header_offer_price_margin',
                [
                    'label'     => esc_html__( 'Margin', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .old__price' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*---------------------------
                PRICE CURRENCY
            ----------------------------*/
            $this->add_control(
                'pricing_currency_heading_title',
                [
                    'label'     => __( 'Currency', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_currency_title_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__currency' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_currency_title_hover_color',
                [
                    'label'     => __( 'Hover Currency Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .price__currency' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_currency_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .price__currency',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                ]
            );

            $this->add_responsive_control(
                'pricing_currency_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .price__currency' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            /*---------------------------
                PERIOD STYLE
            ----------------------------*/
            $this->add_control(
                'pricing_period_heading_title',
                [
                    'label'     => __( 'Period', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_period_title_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_control(
                'pricing_period_title_hover_color',
                [
                    'label'     => __( 'Hover Preiord Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price:hover .period__price' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_period_title_typography',
                    'selector' => '{{WRAPPER}} .single__price__header .period__price',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                ]
            );

            $this->add_responsive_control(
                'pricing_period__display',
                [
                    'label'   => __( 'Display', 'ultimate' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'initial',
                    'options' => [
                        'initial'      => __( 'Initial', 'ultimate' ),
                        'block'        => __( 'Block', 'ultimate' ),
                        'inline-block' => __( 'Inline Block', 'ultimate' ),
                        'flex'         => __( 'Flex', 'ultimate' ),
                        'inline-flex'  => __( 'Inline Flex', 'ultimate' ),
                        'none'         => __( 'none', 'ultimate' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price' => 'display: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_period_title_margin',
                [
                    'label'     => esc_html__( 'Margin', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__header .period__price' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            HEADER STYLE TAB END
        -----------------------------*/

        /*---------------------------
            FEATURES STYLE TAB START
        -----------------------------*/
        $this->start_controls_section(
            'ultimate_features_style',
            [
                'label' => __( 'Features', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'pricing_features_area_heading_title',
                [
                    'label'     => __( 'Features Area', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_features_area_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__body',
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'pricing_features_area_margin',
                [
                    'label'      => __( 'Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_area_padding',
                [
                    'label'      => __( 'Padding', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'pricing_features_area_hover_heading_title',
                [
                    'label'     => __( 'Features Area Hover Background', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_features_hover_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector' => '{{WRAPPER}} .single__price:hover .single__price__body',
                ]
            );

            $this->add_control(
                'pricing_features_heading_title',
                [
                    'label'     => __( 'Features Items', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
            'features_hr',
                [
                    'type' => Controls_Manager::DIVIDER,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography:: get_type(),
                [
                    'name'     => 'pricing_features_item_typography',
                    'selector' => '{{WRAPPER}} .single__price__body ul li',
                    'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_features_item_color',
                [
                    'label'     => __( 'Color', 'ultimate' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__body ul li' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_margin',
                [
                    'label'      => __( 'Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_padding',
                [
                    'label'      => __( 'Padding', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_icon_margin',
                [
                    'label'      => __( 'Icon Margin', 'ultimate' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .single__price__body ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

        $this->end_controls_section();
        /*---------------------------
            FEATURES STYLE TAB END
        ----------------------------*/
        
        /*---------------------------
            FOOTER STYLE TAB START
        -----------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_footer_style',
            [
                'label' => __( 'Footer', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'pricing_footer_heading_title',
                [
                    'label'     => __( 'Footer Area', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_footer_wrap_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single__price__footer',
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'pricing_footer_wrap_margin',
                [
                    'label'     => esc_html__( 'Margin', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__footer' => 'margin: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'pricing_footer_wrap_padding',
                [
                    'label'     => esc_html__( 'Padding', 'ultimate' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .single__price__footer' => 'padding: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_control(
                'pricing_footer_hover_heading_title',
                [
                    'label'     => __( 'Footer Area Hover Background', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Background:: get_type(),
                [
                    'name'     => 'pricing_footer_wrap_hover_background',
                    'label'    => __( 'Background', 'ultimate' ),
                    'types'    => [ 'classic', 'gradient' ],
                    'separator' => 'before',
                    'selector' => '{{WRAPPER}} .single__price:hover .single__price__footer',
                ]
            );

            $this->add_control(
                'pricing_footer_button_heading_title',
                [
                    'label'     => __( 'Button', 'ultimate' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

                $this->start_controls_tabs( 
                    'pricing_footer_style_tabs',
                    [
                        'separator' => 'before',
                    ]
                );

                // Pricing Normal tab start
                $this->start_controls_tab(
                    'style_pricing_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                        'separator' => 'after',
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Typography:: get_type(),
                        [
                            'name'     => 'pricing_footer_typography',
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                            'scheme'   => Core\Schemes\Typography::TYPOGRAPHY_1,
                        ]
                    );

                    $this->add_control(
                        'pricing_footer_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_footer_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_footer_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price__footer a.price_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );

                $this->end_controls_tab();
                /*------------------------
                    PRICING NORMAL TAB END
                --------------------------*/

                /*-------------------------
                    PRICING HOVER TAB START
                ---------------------------*/
                $this->start_controls_tab(
                    'style_pricing_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );

                    $this->add_control(
                        'pricing_footer_hover_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'     => 'pricing_footer_hover_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_footer_hover_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price__footer a.price_btn:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_hover_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price__footer a.price_btn:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();
                /*-----------------------
                    PRICING HOVER TAB END
                -------------------------*/

            $this->end_controls_tabs();

        $this->end_controls_section();
        /*---------------------------
            FOOTER STYLE TAB END
        ----------------------------*/

        /*---------------------------
            STYLE TAB SECTION START
        ----------------------------*/
        $this->start_controls_section(
            'ultimate_pricing_style_section',
            [
                'label' => __( 'Box', 'ultimate' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'box_style_tabs'
            );
                $this->start_controls_tab(
                    'box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ultimate' ),
                    ]
                );

                    $this->add_control(
                        'ultimate_heighlight_pricing_table',
                        [
                            'label'        => esc_html__( 'Active Pricing Table', 'ultimate' ),
                            'type'         => Controls_Manager::SWITCHER,
                            'return_value' => 'yes',
                        ]
                    );

                    $this->add_control(
                        'pricing_table_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_responsive_control(
                        'ultimate_price_text_align',
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
                                    'title' => __( 'Justified', 'ultimate' ),
                                    'icon'  => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_table_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'pricing_table_box_shadow',
                            'label'    => __( 'Box Shadow', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_table_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_margin',
                        [
                            'label'      => __( 'Margin', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_padding',
                        [
                            'label'      => __( 'Padding', 'ultimate' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .single__price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                $this->end_controls_tab();
                $this->start_controls_tab(
                    'box_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ultimate' ),
                    ]
                );
                    $this->add_control(
                        'pricing_table_hover_color',
                        [
                            'label'     => __( 'Color', 'ultimate' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background:: get_type(),
                        [
                            'name'     => 'pricing_table_hover_background',
                            'label'    => __( 'Background', 'ultimate' ),
                            'types'    => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .single__price:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Box_Shadow:: get_type(),
                        [
                            'name'     => 'pricing_table_hover_box_shadow',
                            'label'    => __( 'Box Shadow', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border:: get_type(),
                        [
                            'name'     => 'pricing_table_hover_border',
                            'label'    => __( 'Border', 'ultimate' ),
                            'selector' => '{{WRAPPER}} .single__price:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_table_hover_radius',
                        [
                            'label'     => esc_html__( 'Border Radius', 'ultimate' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .single__price:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            $this->end_controls_tabs();

        $this->end_controls_section();
        /*-----------------------------
            STYLE TAB SECTION END 
        ------------------------------*/

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
                'selector' => '{{WRAPPER}} .single__price:before',
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
                    '{{WRAPPER}} .single__price:before' => 'display: {{VALUE}};',
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
                    '{{WRAPPER}} .single__price:before' => 'position: {{VALUE}};',
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
                    '{{WRAPPER}} .single__price:before' => 'left: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'right: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'top: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'bottom: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => '{{VALUE}};',
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
                    '{{WRAPPER}} .single__price:before' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'before_border',
                'label'    => __( 'Border', 'ultimate' ),
                'selector' => '{{WRAPPER}} .single__price:before',
            ]
        );
        $this->add_control(
            'before_radius',
            [
                'label'      => __( 'Border Radius', 'ultimate' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .single__price:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'before_shadow',
                'selector' => '{{WRAPPER}} .single__price:before',
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
                    '{{WRAPPER}} .single__price:before' => 'z-index: {{SIZE}};',
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
                    '{{WRAPPER}} .single__price:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:before' => 'transition: {{SIZE}}s;',
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
                    '{{WRAPPER}} .single__price:before' => 'transform: scale({{SIZE}}{{UNIT}});',
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
                    '{{WRAPPER}} .single__price:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
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
                'selector' => '{{WRAPPER}} .single__price:hover:before',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'opacity: {{SIZE}};',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'transform: scale({{SIZE}}{{UNIT}});',
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
                    '{{WRAPPER}} .single__price:hover:before' => 'transform: rotate({{SIZE || 0}}deg) scale({{before_scale.SIZE || 1}});',
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
                'selector' => '{{WRAPPER}} .single__price:after',
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
                    '{{WRAPPER}} .single__price:after' => 'display: {{VALUE}};',
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
                    '{{WRAPPER}} .single__price:after' => 'position: {{VALUE}};',
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
                    '{{WRAPPER}} .single__price:after' => 'left: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'right: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'top: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'bottom: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => '{{VALUE}};',
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
                    '{{WRAPPER}} .single__price:after' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'after_border',
                'label'    => __( 'Border', 'ultimate' ),
                'selector' => '{{WRAPPER}} .single__price:after',
            ]
        );

        $this->add_control(
            'after_radius',
            [
                'label'      => __( 'Border Radius', 'ultimate' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .single__price:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'after_shadow',
                'selector' => '{{WRAPPER}} .single__price:after',
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
                    '{{WRAPPER}} .single__price:after' => 'z-index: {{SIZE}};',
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
                    '{{WRAPPER}} .single__price:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:after' => 'transition: {{SIZE}}s;',
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
                    '{{WRAPPER}} .single__price:after' => 'transform: scale({{SIZE}}{{UNIT}});',
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
                    '{{WRAPPER}} .single__price:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
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
                'selector' => '{{WRAPPER}} .single__price:hover:after',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'opacity: {{SIZE}};',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'transform: scale({{SIZE}}{{UNIT}});',
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
                    '{{WRAPPER}} .single__price:hover:after' => 'transform: rotate({{SIZE || 0}}deg) scale({{after_scale.SIZE || 1}});',
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

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'pricing_area_attr', 'class', 'single__price' );
        $this->add_render_attribute( 'pricing_area_attr', 'class', 'single__price__style__'.$settings['ultimate_pricing_style'] );
        if( $settings['ultimate_heighlight_pricing_table'] == 'yes' ){
            $this->add_render_attribute( 'pricing_area_attr', 'class', 'price__active' );
        }
        if( $settings['ultimate_ribon_pricing_table'] == 'yes' ){
            $this->add_render_attribute( 'pricing_area_attr', 'class', 'price__ribon' );
        }
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'pricing_area_attr' ); ?> >

                <?php if( $settings['ultimate_pricing_style'] == 2 ): ?>

                    <div class="single__price__header">
                        <?php $this->ultimate_price_icon(); ?>
                        <?php $this->ultimate_price_title(); ?>
                        <?php $this->ultimate_price_rate(); ?>
                    </div>
                    <?php $this->ultimate_price_features(); ?>
                    <?php $this->ultimate_price_footer(); ?>

                <?php else: ?>

                    <div class="single__price__header">
                        <?php $this->ultimate_price_title(); ?>
                        <?php $this->ultimate_price_rate(); ?>
                    </div>
                    <?php $this->ultimate_price_features(); ?>
                    <?php $this->ultimate_price_footer(); ?>

                <?php endif; ?>
            </div>
        <?php
    }

    public function ultimate_price_icon(){
        $settings = $this->get_settings_for_display(); ?>
        <div class="price__icon">
            <?php
                if( $settings['ultimate_header_icon_type'] == 'img' ){  
                    echo Group_Control_Image_Size:: get_attachment_image_html( $settings, 'headerimagesize', 'headerimage' );
                }else{
                    echo '<i class="'.$settings['headericon'].'"></i>';
                }
            ?>
        </div>
        <?php
    }

    public function ultimate_price_title(){
        $settings = $this->get_settings_for_display();
        if( !empty($settings['pricing_title']) ){
            echo '<div class="price__title"><h3>'.esc_attr__( $settings['pricing_title'],'ultimate' ).'</h3></div>';
        }
    }

    private function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'dollar'       => '&#36;',
            'baht'         => '&#3647;',
            'euro'         => '&#128;',
            'franc'        => '&#8355;',
            'guilder'      => '&fnof;',
            'indian_rupee' => '&#8377;',
            'krona'        => 'kr',
            'lira'         => '&#8356;',
            'peseta'       => '&#8359',
            'peso'         => '&#8369;',
            'pound'        => '&#163;',
            'real'         => 'R$',
            'ruble'        => '&#8381;',
            'rupee'        => '&#8360;',
            'shekel'       => '&#8362;',
            'won'          => '&#8361;',
            'yen'          => '&#165;',
        ];
        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ]: '';
    }

    public function ultimate_price_rate(){
        $settings = $this->get_settings_for_display();

        // Currency symbol
        $currencysymbol = '';
        if ( ! empty( $settings['ultimate_currency_symbol'] ) ) {
            if ( $settings['ultimate_currency_symbol'] != 'custom' ) {
                $currencysymbol = '<span class="price__currency">'.$this->get_currency_symbol( $settings['ultimate_currency_symbol'] ).'</span>';
            } else {
                $currencysymbol = '<span class="price__currency">'.$settings['ultimate_currency_symbol_custom'].'</span>';
            }
        } ?>
        <div class="price__rate">
            <?php
                if( $settings['ultimate_offer_price'] == 'yes' && !empty( $settings['ultimate_original_price'] ) ){

                    if ( 'left' == $settings['ultimate_currency_position'] ) {
                        echo '<h3><span class="old__price">'.$currencysymbol.'<del>'.esc_attr__( $settings['ultimate_original_price'],'ultimate' ).'</del></span><span class="new__price">'.$currencysymbol.esc_attr__( $settings['ultimate_price'],'ultimate' ).'</span> <span class="period__price">'.esc_attr__( $settings['ultimate_period'],'ultimate' ).'</span></h3>';
                    }elseif ( 'right' == $settings['ultimate_currency_position'] ) {
                        echo '<h3><span class="old__price">'.'<del>'.esc_attr__( $settings['ultimate_original_price'],'ultimate' ).$currencysymbol.'</del></span><span class="new__price">'.esc_attr__( $settings['ultimate_price'],'ultimate' ).$currencysymbol.'</span> <span class="period__price">'.esc_attr__( $settings['ultimate_period'],'ultimate' ).'</span></h3>';
                    }
                }else{
                    if( !empty($settings['ultimate_price']) ){
                        if ( 'left' == $settings['ultimate_currency_position'] ) {
                            echo '<h3><span class="new__price">'.$currencysymbol.esc_attr__( $settings['ultimate_price'],'ultimate' ).'</span> <span class="period__price">'.esc_attr__( $settings['ultimate_period'],'ultimate' ).'</span></h3>';
                        }elseif ( 'right' == $settings['ultimate_currency_position'] ) {
                            echo '<h3><span class="new__price">'.esc_attr__( $settings['ultimate_price'],'ultimate' ).$currencysymbol.'</span> <span class="period__price">'.esc_attr__( $settings['ultimate_period'],'ultimate' ).'</span></h3>';
                        }
                    }
                }
            ?>
        </div>
    <?php 
    }

    public function ultimate_price_features(){
        $settings = $this->get_settings_for_display(); ?>

        <?php if( $settings['ultimate_features_list'] ): ?>
            <div class="single__price__body">
            <ul  class="price__features">
                    <?php foreach ( $settings['ultimate_features_list'] as $features ): ?>
                        <li class="<?php if( $features['ultimate_old_features'] == 'yes' ){ echo 'off'; }?> elementor-repeater-item-<?php echo $features['_id']; ?>" >
                            <?php
                                if( !empty( $features['ultimate_features_icon'] ) && 'yes' == $settings['ultimate_show_features_icon'] ){
                                    echo '<i class=" '.$features['ultimate_features_icon'].' "></i>';
                                }
                                echo esc_html__( $features['ultimate_price_title'], 'ultimate' );
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;
    }

    public function ultimate_price_footer(){
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['ultimate_button_link']['url'] ) ) {
            
            $this->add_render_attribute( 'url', 'class', 'price_btn' );
            $this->add_render_attribute( 'url', 'href', $settings['ultimate_button_link']['url'] );

            if ( $settings['ultimate_button_link']['is_external'] ) {
                $this->add_render_attribute( 'url', 'target', '_blank' );
            }

            if ( ! empty( $settings['ultimate_button_link']['nofollow'] ) ) {
                $this->add_render_attribute( 'url', 'rel', 'nofollow' );
            }
        }

        if ( 'yes' == $settings['ultimate_price_button'] ) {
            if( !empty( $settings['ultimate_button_text'] ) || !empty( $settings['ultimate_button_icon'] ) ){

                if ( !empty( $settings['ultimate_button_icon'] ) ) {

                    if ( 'left'  == $settings['ultimate_button_icon_alignment'] ) {
                        echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s %3$s</a>', $this->get_render_attribute_string( 'url' ),'<i class="price_btn_icon_left '.esc_attr( $settings['ultimate_button_icon'] ).'"></i>',$settings['ultimate_button_text'] ).'</div>';
                    }elseif ( 'right'  == $settings['ultimate_button_icon_alignment'] ) {
                        echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s %3$s</a>', $this->get_render_attribute_string( 'url' ), $settings['ultimate_button_text'], '<i class="price_btn_icon_right '.esc_attr( $settings['ultimate_button_icon'] ).'"></i>' ).'</div>';
                    }
                }else{
                    echo '<div class="single__price__footer">'.sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $settings['ultimate_button_text'] ).'</div>';
                }
            }
        }
    }
}