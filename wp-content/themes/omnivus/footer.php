<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @Package Omnivus
 */

$page_meta_array = omnivus_metabox_value('_omnivus_page_metabox');
if ( is_page() && isset($page_meta_array['hide_footer']) && $page_meta_array['hide_footer'] == true ) {
	$hide_footer = $page_meta_array['hide_footer'];
}else{
	$hide_footer = omnivus_any_switch('hide_footer');
}
?>
	<?php if( $hide_footer == false ) : ?>
	<footer class="footer-area">
		<div class="footer-area-bg"></div>
		<?php if ( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' ) || is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
		<div class="footer-top padding-100-50">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-sidebar-1') ) : ?>
					<div class="col-md-3 col-sm-6 col-xs-12">						
						<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
					<div class="col-md-3 col-sm-6 col-xs-12">						
						<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
					<div class="col-md-3 col-sm-6 col-xs-12">						
						<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
					<div class="col-md-3 col-sm-6 col-xs-12">						
						<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if( function_exists('omnivus_copyright') ): ?>
		<div class="footer-bottom">
			<div class="footer-bottom-bg"></div>
			<div class="container">
				<div class="row flex-v-center">
					<?php 
						$footer_style         =  omnivus_any_data('footer_bottom_style', $default = 'style_1');
						$enable_footer_social = omnivus_any_switch('enable_footer_social',false);

					if ( $footer_style == 'style_1' ) : ?>
						<div class="col-md-12">
							<div class="footer-copyright center">
								<?php omnivus_copyright(); ?>
								<?php if( $enable_footer_social == true ): ?>
									<div class="footer-social-bookmark mt30">
										<?php omnivus_social_links(); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php elseif($footer_style == 'style_3'): ?>
						<div class="row width100p">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="footer-logo">
											<?php 
												omnivus_default_logo();
											?>
										</div>
									</div>
									<div class="col-md-6">
										<?php 
											wp_nav_menu( array(
												'theme_location'  => 'footer_menu',
												'menu'            => '',
												'container'       => 'div',
												'container_class' => 'footer_menu',
												'container_id'    => 'footer_menu',
											) );
										?>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="footer-copyright sm-center xs-center">
											<?php omnivus_copyright(); ?>
										</div>
									</div>
									<?php if( $enable_footer_social == true ): ?>
										<div class="col-md-6">
											<div class="footer-social-bookmark text-right xs-center sm-center">
												<?php omnivus_social_links(); ?>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php else: ?>
						<div class="col-md-6">
							<div class="footer-copyright sm-center xs-center">
								<?php omnivus_copyright(); ?>
							</div>
						</div>
						<?php if( $enable_footer_social == true ): ?>
							<div class="col-md-6">
								<div class="footer-social-bookmark text-right xs-center sm-center">
									<?php omnivus_social_links(); ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</footer>
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>