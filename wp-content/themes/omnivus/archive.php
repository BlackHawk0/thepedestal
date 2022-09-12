<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package Omnivus
 */

get_header();

if ( is_active_sidebar( 'main-sidebar' ) ) {
    $omnivus_layout = 'col-md-8';
}else{
    $omnivus_layout = 'col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1';
}
?>
<?php 
	if (function_exists('omnivus_title')) {
	    omnivus_title();
	}
?>
<div class="content-area section-padding">
    <div class="container">
        <div class="row">
			<div class="<?php echo esc_attr( $omnivus_layout ); ?>">

				<?php 
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content/content', get_post_format() );

						endwhile; ?>

						<div class="page-pagination">					
							<?php omnivus_navigation(); ?>
						</div>
				<?php
					else :

						get_template_part( 'template-parts/content/content', 'none' );

					endif;
				?>

			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();