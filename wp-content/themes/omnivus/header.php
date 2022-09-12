<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @Package Omnivus
 */


$header_style    = omnivus_any_data('header_style',$default='header-1');
$page_meta_array = omnivus_metabox_value('_omnivus_page_metabox');
$header_style    = isset( $page_meta_array['header_style'] ) ? $page_meta_array['header_style'] : $header_style;
$profile_url     = '//gmpg.org/xfn/11';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( $profile_url ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-spy="scroll" data-target=".mainmenu-area" data-offset="90">
	<?php wp_body_open(); ?>
    <?php do_action( 'omnivus_after_body'); ?>

	<header class="header-area" id="scrolltotop">
		<?php get_template_part( 'template-parts/header/' . $header_style ); ?>
	</header>