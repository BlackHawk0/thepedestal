<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @Package Omnivus
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>
<div class="col-md-4">
	<div class="widget-area">
		<?php dynamic_sidebar( 'main-sidebar' ); ?>
	</div>
</div>