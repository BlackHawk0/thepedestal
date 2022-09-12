<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package Omnivus
 */

?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    <?php omnivus_post_thumbnail();?>
    <div class="post-details">
        <?php 
            if ( 'post' === get_post_type() ) {
                omnivus_single_random_category_retrip();
            }
        ?>
        <?php 
            if ( get_the_title() ) {
                if ( ! is_single() ) {
                    the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
                }
            }
        ?>
        <?php
            if ( 'post' === get_post_type() && is_single() ) {
                omnivus_posted_on();
            }
        ?>
        <?php if ( get_the_content() ) :  ?>
        <div class="post-content fix">
            <?php
                if ( is_single() ) {
                    the_content( sprintf(
                        wp_kses(
                            esc_html__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'omnivus' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ) );
                }else{
                    the_excerpt();
                }
                if ( is_single() ) {
                    omnivus_link_pages();
                }
            ?>
        </div>
        <?php endif; ?>
        <?php
            if ( !is_single() ) {
                omnivus_posts_bottom_meta();
            }
            if( is_single() ) {            
                if(function_exists('omnivus_post_footer_meta')){
                    omnivus_post_footer_meta();
                }
            }
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->