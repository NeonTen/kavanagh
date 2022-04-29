<?php
/**
 * The template for displaying archive pages.
 *
 * @package Kavanagh
 */

get_header();
?>
	<section class="error-404 not-found text-center mt-32">
		<div class="container">

			<header class="page-header">
				<h1 class="text-7xl font-light capitalize"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kavanagh' ); ?></h1>
			</header><!-- .page-header -->
	
			<p class="mt-12"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try the links below?', 'kavanagh' ); ?></p>

			<div class="mt-12 mx-auto">
				<a class="button" href="/"><?php esc_html_e( 'Back to home', 'kavanagh' ); ?></a>
			</div>

		</div>
	</section><!-- .error-404 -->

<?php
get_footer();
