<?php
/**
 * [omnivus_import_files Demo Content Importer]
 * @return [type] text demo content.
 */
function omnivus_import_files() {
    return array(
        array(
            'import_file_name'           => 'Home V1',
            'import_file_url'            => OMNIVUS_ROOT_URI . '/dummy-data/content/home_1.xml',
            'import_widget_file_url'     => OMNIVUS_ROOT_URI . '/dummy-data/content/home_1.wie',
            'import_customizer_file_url' => OMNIVUS_ROOT_URI . '/dummy-data/content/home_1.dat',
            'import_preview_image_url'   => 'https://techbird.org/omnivus/wp-content/uploads/2021/08/home_v1.jpg',
            'import_notice'              => esc_html__( 'Make sure all the required plugins are activated.', 'omnivus' ),
            'preview_url'                => 'https://techbird.org/omnivus/home_1',
        ),
        array(
            'import_file_name'           => 'Home V2',
            'import_file_url'            => OMNIVUS_ROOT_URI . '/dummy-data/content/home_2.xml',
            'import_widget_file_url'     => OMNIVUS_ROOT_URI . '/dummy-data/content/home_2.wie',
            'import_customizer_file_url' => OMNIVUS_ROOT_URI . '/dummy-data/content/home_2.dat',
            'import_preview_image_url'   => 'https://techbird.org/omnivus/wp-content/uploads/2021/08/home_v2.jpg',
            'import_notice'              => esc_html__( 'Make sure all the required plugins are activated.', 'omnivus' ),
            'preview_url'                => 'https://techbird.org/omnivus/home_2',
        ),
        array(
            'import_file_name'           => 'Home V3',
            'import_file_url'            => OMNIVUS_ROOT_URI . '/dummy-data/content/home_3.xml',
            'import_widget_file_url'     => OMNIVUS_ROOT_URI . '/dummy-data/content/home_3.wie',
            'import_customizer_file_url' => OMNIVUS_ROOT_URI . '/dummy-data/content/home_3.dat',
            'import_preview_image_url'   => 'https://techbird.org/omnivus/wp-content/uploads/2021/08/home_v3.jpg',
            'import_notice'              => esc_html__( 'Make sure all the required plugins are activated.', 'omnivus' ),
            'preview_url'                => 'https://techbird.org/omnivus/home_3',
        ),
        array(
            'import_file_name'           => 'Home V4',
            'import_file_url'            => OMNIVUS_ROOT_URI . '/dummy-data/content/home_4.xml',
            'import_widget_file_url'     => OMNIVUS_ROOT_URI . '/dummy-data/content/home_4.wie',
            'import_customizer_file_url' => OMNIVUS_ROOT_URI . '/dummy-data/content/home_4.dat',
            'import_preview_image_url'   => 'https://techbird.org/omnivus/wp-content/uploads/2021/08/home_v4.jpg',
            'import_notice'              => esc_html__( 'Make sure all the required plugins are activated.', 'omnivus' ),
            'preview_url'                => 'https://techbird.org/omnivus/home_4',
        ),
    );
}
add_filter( 'ocdi/import_files', 'omnivus_import_files' );


function omnivus_after_import( $selected_import ) {

    if ( 'Home V1' === $selected_import['import_file_name'] ) {

        esc_html_e( 'Thank You! for installing demo ( Home V1 ).', 'omnivus' );

        $front_page_id = get_page_by_title( 'Home V1' );
        $blog_page_id  = get_page_by_title( 'Blog' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'mainmenu' => $main_menu->term_id,
			)
		);
    }elseif( 'Home V2' === $selected_import['import_file_name'] ) {

        esc_html_e( 'Thank You! for installing demo ( Home V2 ).', 'omnivus' );

        $front_page_id = get_page_by_title( 'Home V2' );
        $blog_page_id  = get_page_by_title( 'Blog' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'mainmenu' => $main_menu->term_id,
			)
		);

    }elseif( 'Home V3' === $selected_import['import_file_name'] ) {

        esc_html_e( 'Thank You! for installing demo ( Home V3 ).', 'omnivus' );

        $front_page_id = get_page_by_title( 'Home V3' );
        $blog_page_id  = get_page_by_title( 'Blog' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'mainmenu' => $main_menu->term_id,
            )
        );
    }elseif( 'Home V4' === $selected_import['import_file_name'] ) {

        esc_html_e( 'Thank You! for installing demo ( Home V4 ).', 'omnivus' );

        $front_page_id = get_page_by_title( 'Home V4' );
        $blog_page_id  = get_page_by_title( 'Blog' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'mainmenu' => $main_menu->term_id,
			)
		);
    }

}
add_action( 'ocdi/after_import', 'omnivus_after_import' );