<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package Omnivus
 */

get_header();

$sidebar_active = cs_get_option('enable_blog_page_sidebar');
if ( is_active_sidebar( 'main-sidebar' ) && $sidebar_active ) {
    $omnivus_layout      = 'col-md-8';
    $omnivus_post_layout = 'col-md-12 col-sm-12 col-xs-12';
}else{
    $omnivus_layout      = 'col-md-12';
    $omnivus_post_layout = 'col-md-12 col-xs-12';
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
            if( $sidebar_active && cs_get_option('custom_blog_sidebar_layout') == 'left'){
                get_sidebar(); 
            }
            ?>
                <div class="<?php echo esc_attr( $omnivus_layout ); ?>">
                    <div class="blog-posts-list">
                        <div class="row blog-masonry blog__grid">

                            <?php if ( have_posts() ) : ?>  

                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="<?php echo esc_attr( $omnivus_post_layout ); ?>">
                                    <?php  get_template_part( 'template-parts/content/content', get_post_format() ); ?>
                                </div>
                            <?php endwhile; ?>

                            <?php else: ?> 

                            <div class="col-md-12">
                                <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                            </div>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="post-pagination">                        
                        <?php omnivus_pagination(); ?>
                    </div>
                </div>
                <?php
            if( $sidebar_active && cs_get_option('custom_blog_sidebar_layout') == 'right'){
                get_sidebar(); 
            }
            ?>
            </div>
        </div>
    </div>
<?php
get_footer();