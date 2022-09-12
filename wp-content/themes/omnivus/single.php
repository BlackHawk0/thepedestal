<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @Package Omnivus
 */

get_header();
$sidebar_active = cs_get_option('enable_post_sidebar');
if ( is_active_sidebar( 'main-sidebar' ) && $sidebar_active ) {
	$omnivus_single_post_layout = 'col-md-8';
}else{
	$omnivus_single_post_layout = 'col-md-10 col-md-offset-1';
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
            <?php
            if( $sidebar_active && cs_get_option('custom_sidebar_layout') == 'left' ){
                get_sidebar(); 
            }
            ?>
			<div class="<?php echo esc_attr( $omnivus_single_post_layout ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php

    					get_template_part( 'template-parts/content/content', get_post_format() );
                        
                        if ( wp_count_posts('post')->publish > 1 ) {
                            omnivus_post_navigation();
                        }
                        omnivus_related_posts_query();
                        get_template_part( 'template-parts/post/author-bio' );
                        if ( comments_open() || get_comments_number() ) :
                            comments_template(); 
                        endif;
                    ?>
                <?php endwhile; ?>
			</div>

            <?php
            if( $sidebar_active && cs_get_option('custom_sidebar_layout') == 'right'){
                get_sidebar(); 
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();