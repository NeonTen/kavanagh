<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kavanagh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="main-content w-full max-w-full">

	<?php theme_header_html(); ?>

	<?php
	/**
	 * Add content after header.
	 *
	 * @hooked get_video_popup - 10
	 * (outputs popup)
	 */
	do_action( 'kavanagh_after_header' );
	?>
