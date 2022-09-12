<?php

/*------------------------------
    HEADER BACKGROUND
-------------------------------*/
if(!function_exists('omnivus_header_background_image_load')){
    function omnivus_header_background_image_load(){

        if (is_page() ) {
            // Page Meta Data
            $page_meta_array         = omnivus_metabox_value('_omnivus_page_metabox');

            // Page Header Meta
            $enable_header_styleing  = isset( $page_meta_array['enable_header_styleing'] ) ? $page_meta_array['enable_header_styleing'] : false;
            $menu_align              = isset( $page_meta_array['menu_align'] ) ? $page_meta_array['menu_align'] : 'center';
            $menu_color              = isset( $page_meta_array['menu_color'] ) ? $page_meta_array['menu_color'] : '#ffffff';
            $menu_hover              = isset( $page_meta_array['menu_hover'] ) ? $page_meta_array['menu_hover'] : '#ffffff';
            $menu_sticky_color       = isset( $page_meta_array['menu_sticky_color'] ) ? $page_meta_array['menu_sticky_color'] : '#404873';
            $menu_sticky_hover_color = isset( $page_meta_array['menu_sticky_hover_color'] ) ? $page_meta_array['menu_sticky_hover_color'] : '#006de8';

            // Menu Dropdown
            $menu_dropdown_color            = isset( $page_meta_array['menu_dropdown_color'] ) ? $page_meta_array['menu_dropdown_color'] : '#404873';
            $menu_dropdown_hover_color      = isset( $page_meta_array['menu_dropdown_hover_color'] ) ? $page_meta_array['menu_dropdown_hover_color'] : '#006de8';
            $menu_dropdown_hover_background = isset( $page_meta_array['menu_dropdown_hover_background'] ) ? $page_meta_array['menu_dropdown_hover_background'] : '#f1fcff';
            $menu_border_color              = isset( $page_meta_array['menu_border_color'] ) ? $page_meta_array['menu_border_color'] : 'rgba(255,255,255,0.15)';

            // Page Barner Meta
            $enable_overlay          = isset( $page_meta_array['enable_overlay'] ) ? $page_meta_array['enable_overlay'] : false;
            $custom_overlay          = isset( $page_meta_array['custom_overlay'] ) ? $page_meta_array['custom_overlay'] : array('color' => '#000c35');
            $overlay_opacity         = isset( $page_meta_array['overlay_opacity'] ) ? $page_meta_array['overlay_opacity'] : '70';

            // Page Footer Meta
            $enable_footer_styleing = isset( $page_meta_array['enable_footer_styleing'] ) ? $page_meta_array['enable_footer_styleing'] : false;
            $footer_background      = isset( $page_meta_array['footer_background'] ) ? $page_meta_array['footer_background'] : 'rgba(0,0,0,0.01)';
            $footer_overlay         = isset( $page_meta_array['footer_overlay'] ) ? $page_meta_array['footer_overlay'] : 'rgba(0,0,0,0.01)';
            $footer_overlay_opacity = isset( $page_meta_array['footer_overlay_opacity'] ) ? $page_meta_array['footer_overlay_opacity'] : '01';
            $footer_bottom_bg       = isset( $page_meta_array['footer_bottom_bg'] ) ? $page_meta_array['footer_bottom_bg']: 'rgba(0,0,0,0.01)';
            $text_color             = isset( $page_meta_array['text_color'] ) ? $page_meta_array['text_color'] : 'rgba(0,0,0,0.01)';
            $hidding_color          = isset( $page_meta_array['hidding_color'] ) ? $page_meta_array['hidding_color'] : 'rgba(0,0,0,0.01)';
            $a_color                = isset( $page_meta_array['a_color'] ) ? $page_meta_array['a_color'] : 'rgba(0,0,0,0.01)';
            $a_hover                = isset( $page_meta_array['a_hover'] ) ? $page_meta_array['a_hover'] : 'rgba(0,0,0,0.01)';

            // Page Custom Css Meta
            $page_cs_css             = isset( $page_meta_array['page_cs_css'] ) ? $page_meta_array['page_cs_css'] : '';
        }

        $custom_css = "";
        // Page And Content Spaceing Top / Bottom
        $content_space = omnivus_any_data('content_spaceing','100');

        $custom_css .= "
            .content-area.section-padding{
                padding: $content_space"."px 0".";
            }            
        ";

        // Header Background
        $blog_barner = cs_get_option('blog_page_barner');
        $blog_barner = wp_get_attachment_image_url( $blog_barner, 'full' );
        if( is_page() && has_post_thumbnail()){
            $header_background = get_the_post_thumbnail_url(null, 'large' );
        }elseif( !empty( $blog_barner ) ){
            $header_background = $blog_barner;
        }else{
            $header_background = get_header_image();
        }
        $custom_css .= "
            .barner-area-bg {
                background-image: url($header_background);
            }
        ";

        // Header Text Color
        $header_text_color = omnivus_any_color( 'header_textcolor', $default = '#ffffff' );
        
        if( !empty( $header_text_color ) && isset( $header_text_color ) ){            
            $header_text_color = $header_text_color;
        }else{
            $header_text_color = get_header_textcolor();
            $header_text_color = '#'.$header_text_color;
        }
        $custom_css .="
            .barner-area{
                text-align:".omnivus_any_data('header_text_align',$default='center').";
            }
            .page-title h1,
            .page-title,
            .breadcumb,
            .breadcumb a,
            .breadcumb a span{
                color:".$header_text_color.";
            }
        ";

        // Text Logo Color
        $custom_css .="
            .navbar-header h3 a{
                color:".omnivus_any_color('logo_color',$default='#ffffff').";
            }
            .is-sticky .navbar-header h3 a{
                color:".omnivus_any_color('sticky_logo_color',$default='#333333').";
            }
        ";

        // Text Logo Color On Mobile
        $custom_css .="
            @media (max-width: 991px) and (min-width: 768px){
                .navbar-header h3 a {
                    color:".omnivus_any_color('mobile_logo_color',$default='#333333').";
                }
                .is-sticky .navbar-header h3 a {
                    color:".omnivus_any_color('mobile_sticky_logo_color',$default='#006de8').";
                }
            }
            @media only screen and (max-width: 767px){
                .navbar-header h3 a {
                    color:".omnivus_any_color('mobile_logo_color',$default='#333333').";
                }
                .is-sticky .navbar-header h3 a {
                    color:".omnivus_any_color('mobile_sticky_logo_color',$default='#006de8').";
                }
            }
        ";

        if ( is_page() && $enable_overlay == true ) {
            // Barner Overlay
            $custom_css .="
                .barner-area-bg::after{
                    background:".omnivus_meta_background($custom_overlay).";
                    opacity:.".omnivus_meta_data($overlay_opacity).";
                }
            ";
        }else{
            // Barner Overlay
            $custom_css .="
                .barner-area-bg::after{
                    background:".omnivus_any_background('blog_page_overlay',$default='#000c35').";
                    opacity:.".omnivus_any_opacity('blog_page_overlay_opacity',$default = '70').";
                }
            ";
        }

        // Preloader        
        $custom_css .="
            .preeloader{
                background:".omnivus_any_background('preloader_bg', $default = '#ffffff').";
                color:".omnivus_any_color( 'preloader_text_color', $default = '#202020' ).";
            }
            .preloader-spinner{
                border-color:".omnivus_any_color( 'preloader_text_color', $default = '#202020' ).";
            }
        ";

        if(omnivus_any_data('enable_action')){
            $custom_css .="
            .header-action button,
            .header-action a {
                background: ".omnivus_any_color( 'button_bg_color', $default = '#006de8' )." none repeat scroll 0 0;
                border: ".omnivus_any_color( 'button_border_height', $default = '2' )."px solid ".omnivus_any_color( 'button_border_color', $default = '#006de8' ).";
                border-radius: ".omnivus_any_color( 'button_border_radius', $default = '0' )."px;
                color: ".omnivus_any_color( 'button_text_color', $default = '#fff' ).";
            }
        ";
        }

        //Topbar
        $custom_css .="
            .top-bar {
                background: ".omnivus_any_color( 'top_bg_color', $default = 'rgba(255,255,255,0.01)' ).";
                border-bottom: ".omnivus_any_color( 'top_border_height', $default = '1' )."px solid ".omnivus_any_color( 'top_border_color', $default = '#99c2f6' ).";
            }
        ";



        if(omnivus_any_data('custom_css')){
            $custom_css .=omnivus_any_data('custom_css');            
        }
        if ( is_page() ) {
            $custom_css .=omnivus_meta_data($page_cs_css);
        }

        if ( is_page() && $enable_header_styleing == true ) {

            // Menu Align
            if ( $menu_align == 'left' ) {
                $custom_css .="
                    #main-nav{
                        margin-left:inherit;
                    }
                ";
            }
            if ( $menu_align == 'center' ) {
                $custom_css .="
                    #main-nav{
                        text-align:".$menu_align.";
                    }
                ";
            }
            if ( $menu_align == 'right' ) {
                $custom_css .="
                    #main-nav{
                        margin-right:inherit;
                    }
                ";
            }
        }else{

            // Menu Align
            if ( omnivus_any_data('menu_align') == 'left' ) {
                $custom_css .="
                    #main-nav{
                        margin-left:inherit;
                    }
                ";
            }
            if ( omnivus_any_data('menu_align') == 'center' ) {
                $custom_css .="
                    #main-nav{
                        text-align:".omnivus_any_data('menu_align').";
                    }
                ";
            }
            if ( omnivus_any_data('menu_align') == 'right' ) {
                $custom_css .="
                    #main-nav{
                        margin-right:inherit;
                    }
                ";
            }
        }

        // Menu Background Color
        $custom_css .="
            .mainmenu-area-bg {
                background: ".omnivus_any_background('menu_bg',$default='#ffffff').";
                opacity: .".omnivus_any_opacity('bg_opacity',$default='01').";
            }
        ";

        // Sticky Menu Background Color
        $custom_css .="
			.is-sticky .mainmenu-area-bg {
                background: ".omnivus_any_background('sticky_bg',$default='#ffffff').";
			 	opacity: .".omnivus_any_opacity('sticky_bg_opacity',$default='99').";
			}
        ";
        
        if ( is_page() && $enable_header_styleing == true ) {
            // Menu Color        
            $custom_css .="
                ul#nav li a {
                    color: ".omnivus_meta_data($menu_color).";
                }
            ";

            // Sticky Menu Color        
            $custom_css .="
                .is-sticky ul#nav li a,
                ul#nav li li a {
                    color: ".omnivus_meta_data($menu_sticky_color).";
                }
            ";

            // Menu Hover Color
            $custom_css .="
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-parent > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li ul li.hover > a{
                    color: ".omnivus_meta_data($menu_hover).";
                }
            ";

            // Sticky Menu Hover Color
            $custom_css .="
                .is-sticky ul#nav li > a:hover,
                .is-sticky ul#nav li ul li > a:hover,
                .is-sticky ul#nav li.active > a,
                .is-sticky ul#nav li.hover > a,
                .is-sticky ul#nav li.current-menu-parent > a,
                .is-sticky ul#nav li.current-menu-item > a {
                    color: ".omnivus_meta_data($menu_sticky_hover_color).";
                }
            ";

            // Dorpdown Color
            $custom_css.="
                ul#nav li li a{
                    color: ".omnivus_meta_data($menu_dropdown_color)." !important;
                }
            ";
            $custom_css.="
                ul#nav li ul li.hover > a{
                    color: ".omnivus_meta_data($menu_dropdown_hover_color)." !important;
                    background: ".omnivus_meta_data($menu_dropdown_hover_background)." !important;
                }
            ";
        }else{
            // Menu Color        
            $custom_css .="
    			ul#nav li a {
    				color: ".omnivus_any_color('menu_color',$default='#ffffff').";
    			}
            ";

            // Sticky Menu Color        
            $custom_css .="
                .is-sticky ul#nav li a,
                ul#nav li li a {
                    color: ".omnivus_any_color('menu_sticky_color',$default='#404873').";
                }
            ";

            // Menu Hover Color
            $custom_css .="
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-parent > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li ul li.hover > a{
                    color: ".omnivus_any_color('menu_hover',$default='#ffffff').";
                }
            ";

            // Sticky Menu Hover Color
            $custom_css .="
                .is-sticky ul#nav li > a:hover,
                .is-sticky ul#nav li ul li > a:hover,
                .is-sticky ul#nav li.active > a,
                .is-sticky ul#nav li.hover > a,
                .is-sticky ul#nav li.current-menu-parent > a,
                .is-sticky ul#nav li.current-menu-item > a {
                    color: ".omnivus_any_color('menu_sticky_hover_color',$default='#006de8').";
                }
            ";

            // Dropdown Colors
            $custom_css.="
                ul#nav li li a{
                    color: ".omnivus_any_color('menu_dropdown_color', $default='#404873')." !important;
                }
            ";
            $custom_css.="
                ul#nav li ul li.hover > a{
                    color: ".omnivus_any_color('menu_dropdown_hover_color', $default='#006de8')." !important;
                    background: ".omnivus_any_color('menu_dropdown_hover_background', $default='#f1fcff')." !important;
                }
            ";
        }
        
        // Menu Bottom Border Color
        $custom_css .="
            .mainmenu-area{
                border-color:".omnivus_any_color('menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
            }
        ";

        // Mobile Mobile Menu Background
        $custom_css .="
            @media (min-width: 768px) and (max-width: 991px) {
                .mainmenu-area{
                    border-color:".omnivus_any_color('mobile_menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
                }
                .mainmenu-area-bg {
                    background: ".omnivus_any_background('mobile_menu_bg', $default='#ffffff').";
                    opacity: .".omnivus_any_opacity('mobile_bg_opacity', $default='99').";
                }
                .is-sticky .mainmenu-area-bg {
                    background: ".omnivus_any_background('mobile_sticky_bg', $default='#ffffff').";
                    opacity: .".omnivus_any_opacity('mobile_sticky_bg_opacity', $default='99').";
                }

                .menu-toggle.full {
                    color: ".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929')." !important;
                    border-color:".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }
                .line {
                    stroke: ".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }

                .is-sticky .menu-toggle.full {
                    color: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                    border-color: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                }
                .is-sticky .line {
                    stroke: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                }
                ul#nav li a {
                    color: ".omnivus_any_color('mobile_menu_color', $default='#404873')." !important;
                }
                .is-sticky ul#nav li a{
                    color: ".omnivus_any_color('mobile_menu_hover', $default='#006de8').";
                }

                ul#nav .current-menu-parent > a,
                .current-menu-parent > a,
                ul#nav li.has-sub.open > a,
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li.open.menu-item-has-children > a {
                    background: ".omnivus_any_color('mobile_menu_hover_background', $default='#006de8')." !important;
                    color: ".omnivus_any_color('mobile_menu_hover', $default='#ffffff')." !important;
                }
            }
            @media only screen and (max-width: 767px) {
                .mainmenu-area{
                    border-color:".omnivus_any_color('mobile_menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
                }
                .mainmenu-area-bg {
                    background: ".omnivus_any_background('mobile_menu_bg', $default='#ffffff').";
                    opacity: .".omnivus_any_opacity('mobile_bg_opacity', $default='99').";
                }
                .is-sticky .mainmenu-area-bg {
                    background: ".omnivus_any_background('mobile_sticky_bg', $default='#ffffff').";
                    opacity: .".omnivus_any_opacity('mobile_sticky_bg_opacity', $default='99').";
                }

                .menu-toggle.full {
                    color: ".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929')." !important;
                    border-color:".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }
                .line {
                    stroke: ".omnivus_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }

                .is-sticky .menu-toggle.full {
                    color: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                    border-color: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                }
                .is-sticky .line {
                    stroke: ".omnivus_any_color('mobile_sticky_menu_hamberger_color', $default='#006de8').";
                }
                ul#nav li a {
                    color: ".omnivus_any_color('mobile_menu_color', $default='#404873')." !important;
                }
                .is-sticky ul#nav li a{
                    color: ".omnivus_any_color('mobile_menu_hover', $default='#006de8').";
                }

                ul#nav .current-menu-parent > a,
                .current-menu-parent > a,
                ul#nav li.has-sub.open > a,
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li.open.menu-item-has-children > a {
                    background: ".omnivus_any_color('mobile_menu_hover_background', $default='#006de8')." !important;
                    color: ".omnivus_any_color('mobile_menu_hover', $default='#ffffff')." !important;
                }
            }
        ";


        if ( is_page() && !empty( $footer_background ) && $enable_footer_styleing == true ) {
            // Footer Background & Overlay
            $custom_css.="
                .footer-area-bg{
                    background:".omnivus_meta_background($footer_background).";
                }
                .footer-area-bg:after{
                    background:".omnivus_meta_background($footer_overlay).";
                    opacity:.".omnivus_meta_data($footer_overlay_opacity).";
                }
                ";
        }else{
            // Footer Background & Overlay
            $custom_css.="
                .footer-area-bg{
                    background:".omnivus_any_background('footer_bg',$default='#00152e').";
                }
                .footer-area-bg:after{
                    background:".omnivus_any_background('footer_overlay',$default='#00152e').";
                    opacity:.".omnivus_any_opacity('footer_overlay_opacity',$default='50').";
                }
            ";
        }

        //Footer Bottom Padding        
        $custom_css .="
            .footer-bottom{
                padding: ".omnivus_any_data('footer_bottom_padding',$default='30')."px 0;
                border-top:".omnivus_any_data('footer_bottom_border_height',$default='0')."px solid ".omnivus_any_color('footer_bottom_border_color',$default='#182044').";
            }
        ";

        if ( is_page() && !empty( $footer_bottom_bg ) && $enable_footer_styleing == true  ) {
            // Footer Bottom Background
            $custom_css .="
                .footer-bottom-bg{
                    background: ".omnivus_meta_background($footer_bottom_bg).";
                }
            ";
        }else{
            // Footer Bottom Background
            $custom_css .="
                .footer-bottom-bg{
                    background: ".omnivus_any_background('footer_bottom_bg', $default='#182044').";
                }
            ";
        }

        if ( is_page() && !empty($text_color) && $enable_footer_styleing == true  ) {
            // Footer Content Color
            $custom_css .="
                .footer-area{
                    color:".omnivus_meta_data($text_color).";
                }
                .footer-area h1,
                .footer-area h2,
                .footer-area h3,
                .footer-area h4,
                .footer-area h5,
                .footer-area h6{
                    color:".omnivus_meta_data($hidding_color).";
                }
                .footer-top .single-widgets h3::after{
                    background:".omnivus_meta_data($hidding_color).";
                }
            ";
        }else{
            // Footer Content Color
            $custom_css .="
                .footer-area{
                    color:".omnivus_any_color( 'text_color' , $default = '#c2d1e2' ).";
                }
                .footer-area h1,
                .footer-area h2,
                .footer-area h3,
                .footer-area h4,
                .footer-area h5,
                .footer-area h6{
                    color:".omnivus_any_color( 'hidding_color' , $default = '#ffffff' ).";
                }
                .footer-top .single-widgets h3::after{
                    background:".omnivus_any_color( 'hidding_color' , $default = '#ffffff' ).";
                }
            ";
        }

        if ( is_page() && !empty($a_color) && $enable_footer_styleing == true ) {
            // Footer Link Color
            $custom_css .="
                .footer-area a{
                    color:".omnivus_meta_data( $a_color ).";
                }
                .footer-area a:hover{
                    color:".omnivus_meta_data($a_hover).";
                }   
            ";
        }else{
            // Footer Link Color
            $custom_css .="
                .footer-area a{
                    color:".omnivus_any_color( 'a_color', $default='#ffffff').";
                }
                .footer-area a:hover{
                    color:".omnivus_any_color('a_hover', $default='#006de8').";
                }   
            ";
        }

        // Footer Social Profile
        $custom_css.="
            .footer-social-bookmark ul li a{
                color: ".omnivus_any_color('social_color',$default='#ffffff').";
            }
            .footer-social-bookmark ul li a:hover {
                color: ".omnivus_any_color('social_hover_color',$default='#006de8').";
                background: ".omnivus_any_color('social_color',$default='#ffffff').";
                border-color: ".omnivus_any_color('social_color',$default='#ffffff').";
            }
        ";

        // Single Blog Page 
        if ( omnivus_any_switch('show_dropcaps',false) == true ) {

            $custom_css.="
                .single .format-standard .post-content > p:first-of-type {
                    overflow: hidden;
                }

                .single .format-standard .post-content > p:first-of-type::first-letter {
                    color: #006de8;
                    float: left;
                    font-size: 90px;
                    font-weight: 600;
                    margin-right: 10px;
                    line-height: 1;
                    overflow: hidden;
                    clear: both;
                }
            ";
        }

        if ( !empty( omnivus_any_background('error_page_bg') ) ) {

            $custom_css.="
                .error404 {
                    background: ".omnivus_any_background('error_page_bg').";
                }
            ";
        }

        wp_add_inline_style( 'omnivus-main-style', $custom_css );

    }
}
add_action( 'wp_enqueue_scripts', 'omnivus_header_background_image_load' );