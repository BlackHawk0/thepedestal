<?php


add_image_size( 'ultimate_grid_big_thumb', 570, 330 );
add_image_size( 'ultimate_grid_small_thumb', 270, 180 );

class Ultimate_Custom_Functions{

    public function __construct() {
		add_action( 'elementor/controls/controls_registered', [ $this, 'add_custom_font' ] );  
	}
	
	public function add_custom_font( $controls_registry ){

	    $new_fonts = array(        
	        "Gilroy" => "googlefonts"
	    );

	    // For Elementor 1.7.10 and newer
	    $fonts = $controls_registry->get_control( 'font' )->get_settings( 'options' );
	    $fonts = array_merge($fonts,$new_fonts);

	    // Register here the custom font families
	    $controls_registry->get_control( 'font' )->set_settings( 'options', $fonts );  
	}
}
new Ultimate_Custom_Functions();