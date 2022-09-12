<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	if ( function_exists('omnivus_title') ) {
		omnivus_title();
	}
?>
<div class="content-area section-padding">
    <div class="container">
        <div class="row">
			<div class="<?php echo esc_attr( $omnivus_layout ); ?>">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content/content','search' ); ?>
					<?php endwhile; ?>
					
					<div class="page-pagination">					
						<?php omnivus_navigation(); ?>
					</div>

				<?php else : ?>
					
					<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
get_footer();