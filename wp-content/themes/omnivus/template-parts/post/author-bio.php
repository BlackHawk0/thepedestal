<?php
/**
 * The template for displaying Author info
 *
 * @Package Omnivus
 * @since 1.0.0
 */

if ( (bool) get_the_author_meta( 'description' ) ) : ?>
<div class="post-author-biography">
	<div class="posts-author">
	    <img class="alignleft" src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size'=>200)) ?>" alt="<?php echo get_the_author_meta('display_name'); ?>">
	    <p class="writen-by"><?php esc_html_e( 'Writen By', 'omnivus' ); ?></p>
	    <h3><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h3>
		<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
	</div>
</div>
<?php endif; ?>