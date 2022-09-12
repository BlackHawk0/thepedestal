<?php 
function themecore_posts_metabox() {

	$prefix = '_themecore_';

	/*---------------------------
		GALLERY IMAGES
	-----------------------------*/
	$post_formt_gallery = new_cmb2_box( array(
		'id'           => $prefix . 'gallery_images',
		'title'        => esc_html__( 'Gallery Images', 'themecore' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	));

	$post_formt_gallery->add_field( array(
		'name'    => esc_html__( 'Upload Images', 'themecore' ),
		'id'      => $prefix . 'upload_images',
		'type'    => 'file_list',
		'desc'    => esc_html__( 'Please Upload OR Select Images From Media Library ( Note: Select Multiple Image For Gallery ).', 'themecore' ),
		'preview' => array(200,200),
		'text'    => array(
			'add_upload_files_text' => esc_html__( 'Add Or Upload Images', 'themecore' ),
			'remove_image_text'     => esc_html__( 'Remove Image', 'themecore' ),
		),
	));

	/*----------------------------
		AUDIO URL
	-----------------------------*/
	$post_format_audio = new_cmb2_box( array(
		'id'           => $prefix . 'audio',
		'title'        => esc_html__( 'Audio Url', 'themecore' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	));

	$post_format_audio->add_field( array(
		'name'    => esc_html__( 'Paste Audio Url', 'themecore' ),
		'id'      => $prefix . 'audio_url',
		'type'    => 'oembed',
		'desc'    => esc_html__( 'Please paste your audio url here.', 'themecore' ),
		'preview' => array(200,200),
	));

	/*-----------------------------
		VIEO URL
	------------------------------*/
	$post_format_video = new_cmb2_box( array(
		'id'           => $prefix . 'video',
		'title'        => esc_html__( 'Video Url', 'themecore' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	));

	$post_format_video->add_field( array(
		'name'    => esc_html__( 'Paste Video Url', 'themecore' ),
		'id'      => $prefix . 'video_url',
		'type'    => 'oembed',
		'desc'    => esc_html__( 'Please paste your video url here.', 'themecore' ),
		'preview' => array(200,200),
	));
}
add_action( 'cmb2_init', 'themecore_posts_metabox' );

if( !function_exists('themecore_audio_preview') ) {
	/**
	 * @return [string] audio url for audio post
	 */
	function themecore_audio_preview(){
		$url = esc_url( get_post_meta( get_the_ID(), '_themecore_audio_url', 1 ) );
		if ( !empty( $url ) ) {			
     		return '<div class="post-media">'.wp_oembed_get( $url ).'</div>';
		}
	}
}

if ( !function_exists('themecore_video_preview') ) {
	/**
	 * @return [string] video url for video post
	 */
	function themecore_video_preview(){
		$url = esc_url( get_post_meta( get_the_ID(), '_themecore_video_url', 1 ) );
		if ( !empty( $url ) ) {	
     		return '<div class="post-media">'.wp_oembed_get( $url ).'</div>';
     	}
	}
}

if ( !function_exists('themecore_gallery_preview') ) {
	/**
	 * @return [string] Images url for gallery post
	 */
	function themecore_gallery_preview(){
		$images = get_post_meta( get_the_ID(), '_themecore_upload_images', 1 );
		if ( $images && count($images) > 1 ) {
			$gallery_slide = '<div class="post-media posts-gallery relative">';
			foreach ( $images as $image => $image_link ) {

				$gallery_slide .='<div class="single-post-gallery"><a href="'.get_the_permalink().'"><img src="' .$image_link . '" alt="'.get_the_title().'"></a></div>';
			}
			$gallery_slide .= '</div>';
			return $gallery_slide;	
		}
	}
}