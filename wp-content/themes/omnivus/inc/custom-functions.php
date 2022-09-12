<?php

/*------------------------------
    CODESTER FRAMEWORK OPTIONS DATA
------------------------------*/
if ( !defined('CS_OPTIONS') ) {
    defined( 'OMNIVUS_OPTIONS' )     or  define( 'OMNIVUS_OPTIONS',     '_cs_options' );
    if ( ! function_exists( 'cs_get_option' ) ) {
        function cs_get_option( $option_name = '', $default = '' ) {

            $options = apply_filters( 'cs_get_option', get_option( OMNIVUS_OPTIONS ), $option_name, $default );

            if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
                return $options[$option_name];
            } else {
                return ( ! empty( $default ) ) ? $default : null;
            }

        }
    }
}

/*-------------------------------
    BACKGROUND & OVERLAY
--------------------------------*/
if ( !function_exists('omnivus_any_background') ) {
    /**
     * [omnivus_any_background receved background data form option panel and return background data]
     * @param  [type] $background_data received background data form codester option ID.
     * @return $background string
     */
    function omnivus_any_background($background_data,$default='rgba(0,0,0,0)'){

        $background = cs_get_option($background_data);
        if ( !empty($background) ) {
            $background = $background;
        }else{
            $background = array();
        }
        if (array_key_exists('color', $background)) {
            $color = $background['color'];
        }else{
            $color = $default;
        }
        if (array_key_exists('image', $background)) {
            $image = $background['image'];
        }else{
            $image = get_template_directory_uri() .'/assets/img/pattarn.png';
        }
        if (array_key_exists('repeat', $background)) {
            $repeat = $background['repeat'];
        }else{
            $repeat = 'repeat';
        }
        if (array_key_exists('attachment', $background)) {
            $attachment = $background['attachment'];
        }else{
            $attachment = 'scroll';
        }
        if (array_key_exists('position', $background)) {
            $position = $background['position'];
        }else{
            $position = 'center center';
        }
        if (array_key_exists('size', $background)) {
            $size = $background['size'];
        }else{
            $size = 'auto';
        }
        if ( $size == 'initial' || $size == 'inherit' || $size == '' ) {
           $size = '';
        }else{
            $size = '/'.$size.'';
        }
        if (!empty($image)) {
            $background_image = " url($image) $repeat $attachment $position ".( isset($size) ? $size : " ")."";
        }else{
            $background_image = '';
        }
        
        $background = $color.$background_image;
        return $background;
    }
}

/*-------------------------------
    META BACKGROUND & OVERLAY
--------------------------------*/
if ( !function_exists('omnivus_meta_background') ) {
    /**
     * [omnivus_meta_background receved background data form option panel and return background data]
     * @param  [type] $background_data received background data form codester option ID.
     * @return $background string
     */
    function omnivus_meta_background($background_data, $default='#ffffff'){

        $background = $background_data;
        if ( !empty($background) ) {
            $background = $background;
        }else{
            $background = array();
        }
        if (array_key_exists('color', $background)) {
            $color = $background['color'];
        }else{
            $color = $default;
        }
        if (array_key_exists('image', $background)) {
            $image = $background['image'];
        }else{
            $image = get_template_directory_uri() .'/assets/img/pattarn.png';
        }
        if (array_key_exists('repeat', $background)) {
            $repeat = $background['repeat'];
        }else{
            $repeat = 'repeat';
        }
        if (array_key_exists('attachment', $background)) {
            $attachment = $background['attachment'];
        }else{
            $attachment = 'scroll';
        }
        if (array_key_exists('position', $background)) {
            $position = $background['position'];
        }else{
            $position = 'center center';
        }
        if (array_key_exists('size', $background)) {
            $size = $background['size'];
        }else{
            $size = 'auto';
        }
        if ( $size == 'initial' || $size == 'inherit' || $size == '' ) {
           $size = '';
        }else{
            $size = '/'.$size.'';
        }
        if (!empty($image)) {
            $background_image = " url($image) $repeat $attachment $position ".( isset($size) ? $size : " ")."";
        }else{
            $background_image = '';
        }
        
        $background = $color.$background_image;
        return $background;
    }
}

/*---------------------------
    PARSE META DATA
----------------------------*/
if ( !function_exists('omnivus_meta_data') ) {
    function omnivus_meta_data($get_data,$default = ''){
        $data = $get_data;
        if( !empty($data) ){
            $data = $data;
        }else{
            $data = $default;
        }
        return $data;
    }
}

/*---------------------------
    COLOR
----------------------------*/
if ( !function_exists('omnivus_any_color') ) {
    function omnivus_any_color($color_data,$default = ''){
        $color = cs_get_option($color_data);
        if( !empty($color) ){
            $color = $color;
        }else{
            $color = $default;
        }
        return $color;
    }
}

/*---------------------------
    OVERLALY
----------------------------*/
if ( !function_exists('omnivus_any_opacity') ) {
    function omnivus_any_opacity($opacity_data,$default = '65'){
        $opacity = cs_get_option($opacity_data);
        if ($opacity) {
            $opacity = $opacity;
        }else{
            $opacity = $default;
        }
        return $opacity;
    }
}

/*---------------------------
    SWITCH
----------------------------*/
if ( !function_exists('omnivus_any_switch') ) {
    function omnivus_any_switch($switch_data,$default = false){
        $switch = cs_get_option($switch_data);
        if ( $switch == true ) {
            $switch = $switch;
        }else{
            $switch = $default;
        }
        return $switch;
    }
}

/*---------------------------
    PARSE DATA
----------------------------*/
if ( !function_exists('omnivus_any_data') ) {
    function omnivus_any_data($get_data,$default = ''){
        $data = cs_get_option($get_data);
        if( !empty($data) ){
            $data = $data;
        }else{
            $data = $default;
        }
        return $data;
    }
}

/*---------------------------
    METABOX
-----------------------------*/
if ( !function_exists('omnivus_metabox_value') ) {
    function omnivus_metabox_value($meta_key){
        if (get_post_meta( get_the_ID(), $meta_key , true )) {
            $meta_value = get_post_meta( get_the_ID(), $meta_key , true );
        }else{
            $meta_value = array();
        }
        return $meta_value;
    }
}

/*---------------------------
    BODY OPEN FUNCTION
----------------------------*/
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/*----------------------------
    LOGO WITH STICKY
------------------------------*/
if ( !function_exists( 'omnivus_logo_with_sticky' ) ){
    function omnivus_logo_with_sticky(){
        $default_logo = get_theme_mod( 'custom_logo' );
        $default_logo = wp_get_attachment_image_url( $default_logo, 'full');

        $logo        = omnivus_any_data( 'logo','' );
        $logo        = wp_get_attachment_image_url( $logo, 'full');

        $sticky_logo = omnivus_any_data( 'sticky_logo','' );
        $sticky_logo = wp_get_attachment_image_url( $sticky_logo, 'full');

        if ( '' == $default_logo && isset($logo) ) {
            $default_logo = $logo;
        }

        if ( '' == $sticky_logo && omnivus_any_switch('sticky_menu') == true ) {
            $sticky_logo = $default_logo;
        }

        ?>
        <?php if ( !empty( $default_logo ) &&  !empty( $sticky_logo ) ) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link default-logo">
                <img src="<?php echo esc_url( $default_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link sticky-logo">
                <img src="<?php echo esc_url( $sticky_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
        <?php elseif( !empty( $default_logo ) && empty( $sticky_logo ) && omnivus_any_switch('sticky_menu') == false ): ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                <img src="<?php echo esc_url( $default_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
        <?php else: ?>
        <h3>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html( get_bloginfo('name') ); ?>
            </a>
        </h3>
    <?php  endif;
    }
}

/*---------------------------
    DEFAULT LOGO
----------------------------*/
if ( !function_exists('omnivus_default_logo') ) {
    function omnivus_default_logo(){
        if (has_custom_logo()) :
            the_custom_logo('navbar-brand'); 
        else: ?>
        <h3>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html( get_bloginfo('name') ); ?>
            </a>
        </h3>
        <?php
        endif;
    }
}

/*--------------------------
    FAVICON OR SITE ICON
---------------------------*/
if ( !function_exists('omnivus_favicon_setup') ) {
    function omnivus_favicon_setup() {
        if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
            $favicon_source = omnivus_any_data('favicon_icon') ? omnivus_any_data('favicon_icon') : '';
            $favicon        = wp_get_attachment_url( $favicon_source );

            if ( $favicon_source ) {
                echo '<link rel="shortcut icon" href="'. esc_url($favicon) .'" />';
            }else{
                echo '<link rel="shortcut icon" href="'.esc_url(OMNIVUS_ROOT_IMAGE .'/favicon.png').'"/>';
            }
        }
    }
}
add_action( 'wp_head', 'omnivus_favicon_setup',1 );

/*---------------------------
    PRELOADER
----------------------------*/
if ( !function_exists('omnivus_preloader') ) {
    function omnivus_preloader(){

        $preloader       = cs_get_option('enable_preloader',false);
        $preloader_style = cs_get_option('prloader_style',$default = 'style_9');

        if ( $preloader == true ) {
            $preloader_switch = $preloader;
        }else{
            $preloader_switch = false;
        }
        ?>
        <?php
        if ( $preloader_switch == true ) {
            ?>
            <?php if( 'style_3' == $preloader_style ) : ?>
                <div class="preeloader">
                    <div class="preloader-spinner"></div>
                </div>
            <?php elseif( 'style_4' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loader_horizontal.gif'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_5' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loader_spinner.gif'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_6' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loader_spinner.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_7' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loader_square_circle.gif'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_8' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loader_wave.gif'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_9' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/loeader_square.gif'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_10' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/wave_preloader.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_11' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/ajax_loader.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_12' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/audio.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_13' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/ball_triangle.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_14' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/bars.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_15' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/circle_pulse_rings.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_16' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/circle_tail_spin.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_17' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/circles.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_18' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/flip_circle.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_19' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/grid.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_20' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/heart.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_21' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/hearts_group.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_22' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/horizontal_loader_2.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_23' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/road_cross.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_24' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/round_circle.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_25' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/round_pulse.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_26' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/simple_spainer.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_27' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/spinner.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_28' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/spinning_circles.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php elseif( 'style_29' == $preloader_style ) : ?>
                <div class="preeloader">
                    <img src="<?php echo esc_url( OMNIVUS_ROOT_IMAGE . '/loader/three_dots.svg'); ?>" alt="<?php echo esc_attr__( 'preloader', 'omnivus' ); ?>">
                </div>
            <?php endif; ?>
        <?php
        }
    }
}

/*--------------------------
    SCROLL TO TOP
----------------------------*/
if ( !function_exists('omnivus_scrolltop') ) {
    function omnivus_scrolltop(){

        $scroll_top_switch = cs_get_option('enable_scroll_top');
        if ($scroll_top_switch) {
            $scroll_top = $scroll_top_switch;
        }else{
            $scroll_top = false;
        }

        ?>
        <?php if( $scroll_top == true ) : ?>
            <!--SCROLL TO TOP-->
            <a href="#scrolltotop" class="scrolltotop"><i class="ti ti-angle-up"></i></a>
        <?php endif; 
    }
}

if ( !function_exists('omnivus_scroll_top_script') ) {
    function omnivus_scroll_top_script(){

        $scroll_top_switch  = cs_get_option('enable_scroll_top');
        $scroll_top_eassing = cs_get_option('scroll_top_eassing');
        if ($scroll_top_eassing) {
            $scroll_top_eassing = $scroll_top_eassing;
        }else{
            $scroll_top_eassing = 'easeOutExpo';
        }

        if ( $scroll_top_switch == true ) {
            $scroll_top_scripts = '
                jQuery(document).ready(function(){
                    jQuery("a.scrolltotop").on("click", function (event) {
                        var id = jQuery(this).attr("href");
                        var offset = 60;
                        var target = jQuery(id).offset().top - offset;
                        jQuery("html, body").animate({
                            scrollTop: target
                        }, 1500, "'.$scroll_top_eassing.'");
                        event.preventDefault();
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'omnivus-active', $scroll_top_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'omnivus_scroll_top_script' );

/*---------------------------
    AFTER BODY
---------------------------*/
if ( !function_exists('omnivus_after_body_content') ) {
    function omnivus_after_body_content (){
        if (function_exists('omnivus_preloader')) {
            omnivus_preloader();
        }; 
        if (function_exists('omnivus_scrolltop')) {
            omnivus_scrolltop();
        }
    }
}
add_action( 'omnivus_after_body', 'omnivus_after_body_content' );

/*---------------------------
    MENU STICKY
-----------------------------*/
if ( !function_exists('omnivus_menu_sticky') ) {
    function omnivus_menu_sticky(){
        if ( omnivus_any_switch('sticky_menu') == true ) {
            $menu_scripts = '
                jQuery(document).ready(function(){
                    jQuery("#mainmenu-area").sticky({
                        topSpacing: 0
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'omnivus-active', $menu_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'omnivus_menu_sticky' );

/*---------------------------
    SIDEBAR STICKY
-----------------------------*/
if ( !function_exists('omnivus_sidebar_sticky') ) {
    function omnivus_sidebar_sticky(){
        if ( omnivus_any_switch('sticky_sidebar') == true ) {
            $sidebar_scripts = '
                jQuery(document).ready(function(){
                    jQuery(".content-area .col-md-8,.content-area .col-md-4").theiaStickySidebar({
                        additionalMarginTop: 30
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'omnivus-active', $sidebar_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'omnivus_sidebar_sticky' );


/*------------------------------
    SOCIAL PROFILE LINK
-------------------------------*/
if ( !function_exists('omnivus_social_links') ) {
    function omnivus_social_links(){
        $social_links = cs_get_option('social_bookmark');
        if ($social_links) {
            if (count($social_links)) {
            ?>
            <div class="social-profile">
                <ul>
                    <?php foreach ($social_links as $single_link) : ?>
                    <li><a href="<?php echo esc_url( $single_link['bookmark_url'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $single_link['bookmark_icon'] ); ?>"></i></a></li>  
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
            }
        }
    }
}

/*------------------------------
    FOOTER COPYRIGHT
-------------------------------*/
if ( !function_exists('omnivus_copyright') ) {
    function omnivus_copyright(){
        $link = 'themeforest.net/user/mhsunny6692';
        if (cs_get_option('copyright_text')) {
            $copyright_text = cs_get_option('copyright_text');
        }else{
           $copyright_text = sprintf( __( 'Copyright 2020 %s All Right Reserved', 'omnivus' ),'<a href="'. $link .'">OmniVus</a>' );
        } 
        echo wp_kses( $copyright_text, wp_kses_allowed_html( 'post' ) );
    }
}

/*----------------------------
    PAGE TITLE
-----------------------------*/
if ( !function_exists('omnivus_title') ) {
    function omnivus_title(){

        if ( is_page() ) {
            $page_meta_array = omnivus_metabox_value('_omnivus_page_metabox');
            $enable_title    = isset( $page_meta_array['enable_title'] ) ? $page_meta_array['enable_title'] : false;
            $custom_title    = isset( $page_meta_array['custom_title'] ) ? $page_meta_array['custom_title'] : '';
        }

        $omnivus_blog_title = omnivus_any_data( 'blog_page_title' ); ?>
        <div class="barner-area white">
            <div class="barner-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        
                        <?php if ( (is_home() && is_front_page()) || is_page_template( 'blog-classic.php' ) ) : ?>

                            <div class="page-title">
                                <?php if( $omnivus_blog_title == !'' ): ?>
                                    <h1><?php echo esc_html( $omnivus_blog_title ); ?></h1>
                                <?php else: ?>
                                <h1>
                                    <?php esc_html_e('Blog Page','omnivus'); ?>
                                </h1>
                                <?php endif; ?>
                                <?php if (get_bloginfo( 'description')) :?>
                                <p>
                                    <?php bloginfo( 'description' ); ?>
                                </p>
                                <?php endif; ?>
                            </div>

                        <?php elseif(is_page()): ?>
                        
                            <div class="page-title">
                                <h1>
                                    <?php
                                        if ( $enable_title == true && !empty($custom_title) ) {
                                            echo esc_html( $custom_title );
                                        }else{
                                           wp_title( $sep = ' ');
                                        }
                                     ?>
                                </h1>
                            </div>
                            <div class="breadcumb">
                                <?php if (function_exists('bcn_display')) {
                                    bcn_display();
                                } ?>
                            </div>

                        <?php elseif(is_single()): ?>

                            <div class="page-title">
                                <h1>
                                    <?php

                                        if ( 'portfolio' == get_post_type() ) {
                                            $title_text = omnivus_any_data('custom_portfolio_barner_title') ? omnivus_any_data('custom_portfolio_barner_title') : 'Work Details';
                                            if ( omnivus_any_switch('enable_portfolio_barner_title' ) == true && !empty( $title_text ) ) {
                                                echo esc_html( $title_text ); 
                                            }else{
                                                wp_title( $sep = ' ');                                    
                                            }
                                        }else{
                                            $title_text = omnivus_any_data('custom_post_barner_title') ? omnivus_any_data('custom_post_barner_title') : 'News Details';
                                            if ( omnivus_any_switch('enable_post_barner_title' ) == true && !empty( $title_text ) ) {
                                                echo esc_html( $title_text ); 
                                            }else{
                                                wp_title( $sep = ' ');                                    
                                            } 
                                        }
                                    ?>
                                </h1>
                            </div>

                        <?php elseif(is_archive()): ?>

                            <div class="page-title">
                                <h1>
                                    <?php the_archive_title(); ?>
                                </h1>
                            </div>
                            <div class="breadcumb">
                                <p>
                                    <?php the_archive_description(); ?>
                                </p>
                            </div>

                        <?php else: ?>

                            <div class="page-title">
                                <h1>
                                    <?php wp_title( $sep = ' '); ?>
                                </h1>
                            </div>
                            <div class="breadcumb">
                                <p>
                                    <?php bloginfo( 'description' ); ?>
                                </p>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}


/*------------------------------
    COMMENT FORM FIELD
-------------------------------*/
if( ! function_exists('omnivus_comment_form_default_fields') ){

    function omnivus_comment_form_default_fields($fields){
        global $aria_req;
        $commenter     = wp_get_current_commenter();
        $req           = get_option( 'require_name_email' );
        $aria_req      = ($req ? " aria-required='true' " : '');
        $required_text = ' ';    
        $fields        =  array(
            'author'   => '<div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="author" value="'.esc_attr( $commenter['comment_author'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Name *', 'omnivus' ).'">
                            </div>',
            'email'    => '<div class="col-sm-6">
                                <input type="email" name="email" value="'.esc_attr( $commenter['comment_author_email'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Email *', 'omnivus' ).'">
                            </div>
                        </div>
                    </div>',
            'url'      => '<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="url" name="url" value="'.esc_url( $commenter['comment_author_url'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Website', 'omnivus' ).'">
                                    </div>
                                </div>
                            </div>'
        );
        return $fields;
    }
}
add_filter('comment_form_default_fields', 'omnivus_comment_form_default_fields');


/*-----------------------------------------
    OVERWRITE COMMENT FORM DEFAULT
-------------------------------------------*/
if( ! function_exists('omnivus_comment_form_defaults') ){

    function omnivus_comment_form_defaults( $defaults ) {
        global $aria_req;
        $defaults = array(
            'class_form'    => 'comment-form',
            'title_reply'   => esc_html__( 'Leave A Comment', 'omnivus' ),
            'comment_field' => '<div class="form-group mb0">
                                    <textarea name="comment" placeholder="'.esc_attr__( 'Your Comment', 'omnivus' ).'" '.$aria_req.' rows="10"></textarea>    
                                </div>',
            'comment_notes_before'  => '',
            'label_submit'  => esc_html__( 'Post Comment', 'omnivus' ),
        );
        return $defaults;
    }    
}
add_filter( 'comment_form_defaults', 'omnivus_comment_form_defaults' );


/*------------------------------
    CUSTOM COMMENT
--------------------------------*/
if ( !function_exists('omnivus_comment') ) {
    function omnivus_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>

            <?php if( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ): ?>
        <li id="comment-<?php comment_ID() ?>" class="single-comment pingback-comment">

            <div class="comment-details">
                <div class="comment-meta">
                    <h4><?php comment_author_link(); ?></h4>
                    <a class="comment-date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                        <?php printf( esc_html__('%1s','omnivus'), get_comment_date() ); ?>
                    </a>
                </div>
                <div class="comment-content">
                    <?php wpautop( comment_text() ); ?>
                </div>
                <div class="comment-edit">
                    <?php  edit_comment_link( esc_html__( 'Edit Comment', 'omnivus' ) ); ?>
                </div>
            </div>

            <?php endif; ?>

            <?php if( get_comment_type() == 'comment' ) : ?>
        <li id="comment-<?php comment_ID() ?>" class="single-comment">
            <div class="comment-details">
                <div class="comment-author">
                    <?php
                        $avatar_size = 100;
                        if ( $comment->comment_parent != '0' ) {
                            $avatar_size = 80; 
                        } 
                        echo get_avatar( $comment->comment_author_email,$avatar_size );
                    ?>
                </div>
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"><?php comment_author_link(); ?></h4>
                        <a class="comment-date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php printf( esc_html__('%1s','omnivus'), get_comment_date() ); ?>
                        </a>
                    </div>
                </div>
                <div class="comment-content">
                    <?php wpautop( comment_text() ); ?>
                </div>
                <div class="comment-reply">
                    <?php
                        comment_reply_link( 
                            array_merge(
                                $args,
                                array(
                                    'depth'      => $depth, 
                                    'max_depth'  => $args['max_depth'],
                                    'reply_text' => '<i class="fa fa-reply"></i>'.esc_html__( 'Reply', 'omnivus' ), 
                                )
                            )
                        );
                    ?>
                </div>
                <?php  if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','omnivus' ); ?></em><br/>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php
    }
}

/*--------------------------
    POSTS PAGINATION
---------------------------*/
if ( !function_exists('omnivus_pagination') ) {
    function omnivus_pagination(){
        the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}

/*------------------------
    POSTS PAGINATION CUSTOM
-------------------------*/
if ( !function_exists('omnivus_custom_pagination') ) {
    function omnivus_custom_pagination($query_name ){
        echo '<nav class="navigation pagination"><div class="nav-links">';
        echo paginate_links(array(
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'screen_reader_text' => ' ',
            'mid_size'           => 1,
            'base'               => get_pagenum_link(1) . '%_%',
            'format'             => 'page/%#%',
            'current'            => max( 1, get_query_var('paged') ),
            'total'              => $query_name->max_num_pages,
            'prev_next'          => true,
            'type'               => 'list',
        ));
        echo '</div></nav>';
    }
}

/*------------------------
    POSTS NAVIGATION
--------------------------*/
if ( !function_exists('omnivus_navigation') ) {
    function omnivus_navigation(){
        the_posts_navigation(array(
            'screen_reader_text' => ' ',        
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Older posts', 'omnivus' ),
            'next_text'          => esc_html__( 'Newer posts', 'omnivus' ).' <i class="ti ti-angle-double-right"></i>',
        )); 
    }
}

/*------------------------
    SINGLE POST NAVIGATION
--------------------------*/
if ( !function_exists('omnivus_single_navigation') ) {
    function omnivus_single_navigation(){
        the_post_navigation( array(
            'screen_reader_text' => ' ',  
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Prev Post', 'omnivus' ),
            'next_text'          => esc_html__( 'Next Post', 'omnivus' ).' <i class="ti ti-angle-double-right"></i>',
        ));
    }
}

/*----------------------
    SINGLE POST NAVIGATION
------------------------*/
if ( !function_exists('omnivus_post_navigation') ) {
    function omnivus_post_navigation(){
        global $post;
        $next_post = get_adjacent_post(false, '', false);
        $prev_post = get_adjacent_post(false, '', true);
        ?>
        <div class="single-post-navigation">

            <?php if( !empty($prev_post) ): ?>
            <div class="prev-post">
                <a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>">
                    <div class="arrow-link">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <div class="title-with-link">
                        <span><?php esc_html_e( 'Prev Post', 'omnivus' ) ?></span>
                        <h3><?php echo esc_html( wp_trim_words( $prev_post->post_title, 4, '.' ) ); ?></h3>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <div class="single-post-navigation-center-grid">
                <a href="<?php echo esc_url( home_url('/') ) ?>"><i class="fa fa-th-large"></i></a>
            </div>

            <?php if( !empty($next_post) ): ?>
            <div class="next-post">
                <a href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>">
                    <div class="title-with-link">
                        <span><?php esc_html_e( 'Next Post', 'omnivus' ) ?></span>
                        <h3><?php echo esc_html( wp_trim_words( $next_post->post_title, 4, '.' ) ); ?></h3>
                    </div>
                    <div class="arrow-link">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            <?php endif; ?>

        </div>
    <?php
    }
}

/*------------------------
    COMMENTS PAGINATION
-------------------------*/
if ( !function_exists('omnivus_comments_pagination') ) {
    function omnivus_comments_pagination(){
        the_comments_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}

/*------------------------
    COMMENTS NAVIGATION
-------------------------*/
if ( !function_exists('omnivus_comments_navigation') ) {
    function omnivus_comments_navigation(){
        the_comments_navigation(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Older Comments', 'omnivus' ),
            'next_text'          => esc_html__( 'Newer Comments', 'omnivus' ).' <i class="ti ti-angle-double-right"></i>',
        ));
    }
}

if ( !function_exists('omnivus_related_posts_query') ) {
    /**
     * [omnivus_related_posts_query for use in the loop, list 5 post titles related to first tag on current post]
     * @return [type] string
     */
    function omnivus_related_posts_query(){

        global $post;
        $tags = wp_get_post_tags($post->ID);
        if ( $tags ) {
            $first_tag = $tags[0]->term_id;
            $args = array(
                        'tag__in'             => array($first_tag),
                        'post__not_in'        => array($post->ID),
                        'posts_per_page'      =>2,
                        'ignore_sticky_posts' =>1
                    );
            $related_query = new WP_Query($args); 
            if( $related_query->have_posts() ) { ?>
                <div class="related-post-warapper">
                    <h3><?php esc_html_e( 'Related Posts', 'omnivus' ); ?></h3>
                    <div class="related-post">
                        <div class="row">
                            <?php                                    
                                while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-post-item xs-mb50">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="post-details">
                                                <?php omnivus_post_date(); ?>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php 
                                                    echo esc_html( wp_trim_words( get_the_content(), 10 ) );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
}

/*----------------------------------
    SINGLE POST / PAGES LINK PAGES
------------------------------------*/
if ( !function_exists('omnivus_link_pages') ) {
    function omnivus_link_pages(){
        wp_link_pages( array(
            'before'           => '<div class="page-links post-pagination"><p>' . esc_html__( 'Pages:', 'omnivus' ).'</p><ul><li>',
            'separator'        => '</li><li>',
            'after'            => '</li></ul></div>',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__( 'Next Page', 'omnivus'),
            'previouspagelink' => esc_html__( 'Prev Page', 'omnivus' ),
        ));
    }
}

/*----------------------------
    SEARCH FORM
------------------------------*/
if ( !function_exists('omnivus_search_form') ) {
    function omnivus_search_form(  $search_buttton=true, $is_button=true ) {
        ?>
        <div class="search-form">
            <form id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" id="search" placeholder="<?php esc_attr_e('Search ...', 'omnivus'); ?>" name="s">
                <?php if( $search_buttton == true ) : ?>
                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                <?php endif; ?>
            </form>
            <?php if( $is_button==true ) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="home_btn"> <?php esc_html_e('Back to home Page', 'omnivus'); ?> </a>
            <?php endif; ?>
        </div>
        <?php
    }
}

/*-------------------------------------
    SEARCH PAGE SEARCH FORM
-------------------------------------*/
if ( !function_exists('omnivus_search_page_search_form') ) {
    function omnivus_search_page_search_form() {
        ?>
        <div class="search-form">            
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" _lpchecked="1">
                <input type="text" name="s" class="form-control search-field" id="search" placeholder="<?php esc_attr_e('Enter here your search query', 'omnivus'); ?>" value="<?php echo get_search_query(); ?>">
                <button type="submit" class="search-submit search_btn"> <?php esc_html_e('Search', 'omnivus') ?> </button>
            </form>
        </div>
        <?php
    }
}

/*------------------------------
    POST PASSWORD FORM
-------------------------------*/
if ( !function_exists('omnivus_password_form') ) {
    function omnivus_password_form($form) {
    global $post;
    $label  =   'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form =   '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
                    <span>'.esc_html__( "To view this protected post, enter the password below:", 'omnivus' ).'</span>
                    <input name="post_password" id="' . $label . '" type="password"  placeholder="'.esc_attr__( "Enter Password", 'omnivus' ).'">
                    <input type="submit" name="Submit" value="'.esc_attr__( "Submit",'omnivus' ).'">
                </form>';
    return $form;
    }
}
add_filter( 'the_password_form', 'omnivus_password_form' );

/*-------------------------------
    ADD CATEGORY NICENAMES IN BODY AND POST CLASS
--------------------------------*/
if ( !function_exists('omnivus_post_class') ) {
   function omnivus_post_class( $classes ) {
    
        global $post;
        if ( 'page' === get_post_type() ) {
            if(!has_post_thumbnail()) {
                $classes[] = 'no-post-thumbnail';
            }
        }

        if ( 'post' === get_post_type() ) {
            if ( !function_exists('post_like_count_and_social') ) {
                $classes[] = 'no-social-count';
            }

            if ( is_page_template( 'blog-classic.php' ) ) {
                $classes[] = 'blog-classic';
            }

            if ( is_single() ) {
                $classes[] = 'single-post-item';
            }else{
                $classes[] = 'single-post-item mb40';
            }
        }
        return $classes;
    }
}
add_filter( 'post_class', 'omnivus_post_class' );

/*-------------------------------
    DAY LINK TO ARCHIVE PAGE
---------------------------------*/
if ( !function_exists('omnivus_day_link') ) {
    function omnivus_day_link() {
        $archive_year   = get_the_time('Y');
        $archive_month  = get_the_time('m');
        $archive_day    = get_the_time('d');
        echo get_day_link( $archive_year, $archive_month, $archive_day);
    }
}

/*--------------------------------
    GET COMMENT COUNT TEXT
----------------------------------*/
if ( !function_exists('omnivus_comment_count_text') ) {
    function omnivus_comment_count_text($post_id) {
        $comments_number = get_comments_number($post_id);
        if($comments_number==0) {
            $comment_text = esc_html__('No comment', 'omnivus');
        }elseif($comments_number == 1) {
            $comment_text = esc_html__('One comment', 'omnivus');
        }elseif($comments_number > 1) {
            $comment_text = $comments_number.esc_html__(' Comments', 'omnivus');
        }
        echo esc_html($comment_text);
    }
}

/*-------------------------------------
    EXCERPT CUSTOM LENGTH
---------------------------------------*/
function omnivus_excerpt_custom_lenth($value){
    if (omnivus_any_data( 'blog_excerpt_word' )) {
        $value = omnivus_any_data( 'blog_excerpt_word' );
    }else{
        $value = 50;
    }
    return $value;
}
add_filter( 'excerpt_length', 'omnivus_excerpt_custom_lenth' );

/**
 * Remove schema attributes from custom logo html
 *
 * @param string $html
 * @return string
 */
function omnivus_remove_custom_logo_schema_attr( $html ) {
    return str_replace( array( 'itemprop="url"', 'itemprop="logo"' ), '', $html );
}
add_filter( 'get_custom_logo', 'omnivus_remove_custom_logo_schema_attr' );


/**
 * Remove schema attributes from oembed iframe html
 *
 * @param string $html
 * @return string
 */
function omnivus_remove_oembed_schema_attr($return, $data, $url){
    if( is_object( $data ) ){
        $return = str_ireplace(
            array( 
                'frameborder="0"',
                'scrolling="no"',
                'frameborder="no"',
            ),
            '',
            $return
        );
    }
    return $return;
}
add_filter( 'oembed_dataparse', 'omnivus_remove_oembed_schema_attr', 10, 3 );


/**
 * omnivus_move_comment_field_to_bottom () Remove cookie field and move comment field bottom.
 * @param  $fields array()
 * @return return comment form fields
 */
function omnivus_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    unset( $fields['cookies'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'omnivus_move_comment_field_to_bottom' );


/**
 * omnivus_archive_count_span() This code filters the Archive widget to include the post count inside the link
 * @param  [type] $links
 * @return [type] $string 
 */
function omnivus_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', ' <span>', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}
add_filter('get_archives_link', 'omnivus_archive_count_span');

function omnivus_archive_dropdown_count_span($links) {
    $links = str_replace('&nbsp;(', ' (', $links);
    $links = str_replace('</span></a></option>', ')</option>', $links);
    return $links;
}
add_filter('get_archives_link', 'omnivus_archive_dropdown_count_span');


/**
 * omnivus_category_count_span() category count show in a span.
 * @param  [type] $links
 * @return [type] $string
 */
function omnivus_category_count_span($links) {
    $links = str_replace('</a> (', ' <span>', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}
add_filter('wp_list_categories', 'omnivus_category_count_span');

function omnivus_category_dropdown_count_span($links) {
    $links = str_replace('&nbsp;(', ' <span>', $links);
    $links = str_replace(')</option>', '</span></option>', $links);
    return $links;
}
add_filter('wp_list_categories', 'omnivus_category_dropdown_count_span');


/**
 * [omnivus_custom_form_class_attr Add a custom class in contact form 7 $class .= ' class-name';]
 * @param  [type] $class
 * @return [type] string
 */
function omnivus_custom_form_class_attr( $class ) {
    return $class;
}
add_filter( 'wpcf7_form_class_attr', 'omnivus_custom_form_class_attr' );


/**
* Remove Contact Form 7 Unwanted P Tag.
**/
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

/**
 * excerpt more
 */
function omnivus_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'omnivus_excerpt_more' );