<?php
	/*-------------------------------
	    MAIN MENU
	--------------------------------*/
	if ( !function_exists('omnivus_menu')) {
		function omnivus_menu(){
			// Page Meta Data
			$page_meta_array        = omnivus_metabox_value('_omnivus_page_metabox');
			$enable_header_styleing = isset( $page_meta_array['enable_header_styleing'] ) ? $page_meta_array['enable_header_styleing'] : false;

			$enable_topbar           = cs_get_option( 'enable_topbar', false );
			$phone_number            = cs_get_option( 'phone_number' );
			$email_address           = cs_get_option( 'email_address' );
			$enable_social           = cs_get_option( 'enable_social' );
			$enable_action           = cs_get_option( 'enable_action', false );
			$button_text             = cs_get_option( 'button_text' );
			$button_url              = cs_get_option( 'button_url' );
			$enable_search           = cs_get_option( 'enable_search', false );
			$enable_offcanvas        = cs_get_option( 'enable_offcanvas', false );
			$enable_cart_bubtton     = cs_get_option( 'enable_cart_bubtton', false );
			$enable_language_bubtton = cs_get_option( 'enable_language_bubtton', false );
			$show_minicart           = cs_get_option( 'show_minicart' );

	        $menu_width = omnivus_any_data('menu_width','container');
	        if ( is_page() && $enable_header_styleing == true ) {
	        	if ( !empty($page_meta_array['menu_width']) ) {
	        		$menu_width = $page_meta_array['menu_width'];
	        	}
	        }elseif ( $menu_width ) {
	        	$menu_width = $menu_width;
	        }
	    ?>
	    <div class="header-top-area">
	    	<?php
	    		$search_style = '';
	    		if ( $search_style ) {
	    			$search_style = $search_form_style;
	    		}else{
	    			$search_style = 'one';
	    		}
	    	?>
			<div class="search-form-control">
				<div id="search-form-<?php echo esc_attr( $search_style )?>" class="search-form-<?php echo esc_attr( $search_style )?>">					
	    			<?php omnivus_search_form(false,false); ?>
				</div>
                <div class="search-control-bg"></div>
    			<button class="search-mode-close"><i class="ti ti-close"></i></button>
			</div>

	        <!-- TOP BAR -->
	        <?php if( $enable_topbar == true ) : ?>
	        <div class="top-bar">
	            <div class="<?php echo esc_attr( $menu_width ); ?>">
	                <div class="row">
	                    <div class="col-md-6 col-xs-12 col-sm-8">
	                        <div class="top-left-contact">
	                            <?php if( !empty($phone_number) ): ?>
	                            <p><i class="ti ti-headphone-alt"></i> <?php echo esc_html( $phone_number ); ?></p>
	                            <?php endif; ?>
	                            <?php if( !empty($email_address) ): ?>
	                            <p><i class="ti ti-email"></i> <?php echo esc_html( $email_address ); ?></p>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                    <div class="col-md-6 col-xs-12 col-sm-4">
	                        <?php
		                        if( $enable_social == true ){
		                        	omnivus_social_links();
		                        }
	                        ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>
	        <!-- TOP BAR END -->        
	        
	        <!-- MAINMENU AREA -->
	        <div class="mainmenu-area" id="mainmenu-area">
	            <div class="mainmenu-area-bg"></div>
	            <nav class="navbar">
	                <div class="<?php echo esc_attr( $menu_width ); ?>">
	                    <div class="row">
	                        <div class="col-md-12 flex-v-center">
	                            <div class="navbar-header">
	                                <?php omnivus_logo_with_sticky(); ?>
	                            </div>
	                            <svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="60">
	                                <path class="line top" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
	                                <path class="line middle" d="m 30,50 h 40" />
	                                <path class="line bottom" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
	                            </svg>
	                            <?php
	                                wp_nav_menu( array(
										'theme_location'  => 'mainmenu',
										'menu_id'         => 'nav',
										'menu'            => 'ul',
										'menu_class'      => 'nav navbar-nav pull-right',
										'container'       => 'div',
										'container_class' => 'stellarnav',
										'container_id'    => 'main-nav',
										'fallback_cb'     => 'omnivus_menu_default_fallback',
										'walker'          => new omnivus_Nav_Menu_Walker(),
	                                ) );
	                            ?>

	                            <?php if( $enable_action == true || $enable_search == true || $enable_offcanvas == true || $enable_cart_bubtton == true ) : ?>  
	                            <div class="header-action hidden-sm hidden-xs hidden-md">

	                            	<?php if( !empty($button_text) && $enable_action == true ): ?>
	                                <a class="action-button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
	                            	<?php endif; ?>
	                            	
	                            	<?php if( $enable_search == true ) : ?>
	                                <a href="#" class="search-button"><i class="ti ti-search"></i></a>
	                            	<?php endif; ?>

									<?php if( class_exists('GTranslate') && $enable_language_bubtton == true ) : ?>
		                            	<?php $data = get_option('GTranslate'); $look = $data['widget_look']; ?>
		                            	<div class="language-button">
											<?php if( 'flags' == $look ): ?>
											<div class="language__selector">
		                            			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/flag.jpg' ));?>" alt="<?php echo bloginfo( 'name' );?>">
		                            		</div>	                           		
		                            		<div class="language__list"><?php echo do_shortcode('[gtranslate]'); ?></div>
											<?php elseif( 'popup' == $look ): ?>
		                            		<div class="language__popup_button" onclick="<?php echo esc_attr( 'openGTPopup(this)' ); ?>">
		                            			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/flag.jpg' ));?>" alt="<?php echo bloginfo( 'name' );?>">
		                            		</div>
		                            		<div class="language__popup"><?php echo do_shortcode('[gtranslate]'); ?></div>
											<?php endif; ?>
		                            	</div>
	                            	<?php endif; ?>

	                            </div>
	                        	<?php endif; ?>
	                        </div>
	                    </div>
	                </div>
	            </nav>
	        </div>
	        <!-- END MAINMENU AREA END -->
	    </div>
	    <?php
		}
	}

	/*----------------------------
	    MENU FALBACK
	-----------------------------*/
	if (!function_exists('omnivus_menu_default_fallback')) {
	    function omnivus_menu_default_fallback() {
	        ?>
	        <div id="main-nav" class="stellarnav">            
	            <ul id="nav" class="nav navbar-nav pull-right">
	                <li>
	                    <a href="<?php echo admin_url(); ?>nav-menus.php">
	                        <?php esc_html_e( 'Set Mainmenu Here...', 'omnivus' ); ?>
	                    </a>
	                </li>
	            </ul>
	        </div>
	        <?php
	    }
	}
    if (function_exists('omnivus_menu')) {
        omnivus_menu();
    }
    ?>