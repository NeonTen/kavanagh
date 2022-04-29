<?php
/**
 * The template for displaying all single case study page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kavanagh
 */

get_header();

	get_template_part( 'template-parts/content', get_post_type() );

get_footer();
