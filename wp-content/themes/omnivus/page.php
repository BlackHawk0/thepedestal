<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package Omnivus
 */

get_header();

$page_meta_array = omnivus_metabox_value('_omnivus_page_metabox');
$enable_barner   = isset( $page_meta_array['enable_barner'] ) ? $page_meta_array['enable_barner'] : true;

?>
	<?php 
		if ( $enable_barner == true ) {
			if (function_exists('omnivus_title')) {
			    omnivus_title();
			}
		}
	?>
    <div class="content-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();