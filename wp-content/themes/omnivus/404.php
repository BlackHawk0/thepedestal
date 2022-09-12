<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @Package Omnivus
 */

get_header();

if ( is_active_sidebar( 'main-sidebar' ) ) {
    $omnivus_layout = 'col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1';
}else{
    $omnivus_layout = 'col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1';
}
?>
<?php 
	if ( function_exists('omnivus_title') ) {
		omnivus_title();
	}
?>
<div class="content-area section-padding">
    <div class="container">
        <div class="row">
			<div class="<?php echo esc_attr( $omnivus_layout ); ?>">
				<div class="error-404 not-found center">

					<?php if( !empty(omnivus_any_data( 'error_page_img')) ) : ?>
						<?php
							$error_img  = omnivus_any_data( 'error_page_img','' );
							$error_img  = wp_get_attachment_image_url( $error_img, 'full');
						?>
						<div class="error__page__img">
							<img src="<?php echo esc_url( $error_img ); ?>" alt="<?php echo bloginfo( 'name' ); ?>">
						</div>
					<?php endif; ?>
					<div class="content-header">
						<?php  if( !empty( omnivus_any_data('error_text') ) ) : ?>
							<h3><?php echo esc_html( omnivus_any_data('error_text') ); ?></h3>
						<?php else : ?>
							<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'omnivus' ); ?></h3>
						<?php endif; ?>
					</div>

					<div class="error-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'omnivus' ); ?></p>
						<div class="page-search">
							<?php
								$button_switch = omnivus_any_switch('enable_404_search_button');
								omnivus_search_form(true,$button_switch);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();