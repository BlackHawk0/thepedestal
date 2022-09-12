<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package Omnivus
 */

?>
<article id="post-<?php the_ID();?>" <?php
    if ( is_single() ) {
           post_class( array('single-post-item') );
    }else{
        post_class( array('single-post-item mb50') );
    }
?>>

    <div class="post-details">
        <?php 
            if ( 'post' === get_post_type() ) {
                omnivus_posts_top_meta(); 
            }
        ?>
        <?php 
            if ( get_the_title() ) {
                if ( ! is_single() ) {
                    the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
                }
            }
        ?>

        <?php if ( get_the_content() ) :  ?>
	        <div class="post-content fix">
	            <?php the_excerpt(); ?>
	        </div>
        <?php endif; ?>

        <?php
            if ( !is_single() ) {
                omnivus_post_bottom_meta();
            }
        ?>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->