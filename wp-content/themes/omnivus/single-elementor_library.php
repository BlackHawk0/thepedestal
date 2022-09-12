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
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
            the_content();
        ?>
    <?php endwhile; ?>
</div>
<?php
get_footer();