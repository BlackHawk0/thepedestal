<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @Package Omnivus
 */

get_header();
?>
<?php 
    if (function_exists('omnivus_title')) {
        omnivus_title();
    }
?>
<div class="content-area">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php
    					the_content();
                    ?>
                <?php endwhile; ?>
			</div>
        </div>
    </div>
</div>
<?php
get_footer();