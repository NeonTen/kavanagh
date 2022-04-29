<?php
/**
 * The template part for displaying Content in single page.
 *
 * @package Kavanagh
 */

?>

<article <?php post_class(); ?>>

	<?php
	while ( have_posts() ) :
		the_post();

		echo '<div class="container my-12 md:my-20">';

			echo '<p class="text-xs text-field-color mb-5">' . get_the_date() . '</p>';

			the_title( '<h1 class="text-3xl md:text-5xl font-light capitalize">', '</h1>' );

		echo '</div>';

		the_post_thumbnail( 'full', [ 'class' => 'w-full h-[500px] object-cover' ] );

		echo '<div class="container my-12 md:my-20">';

			echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-11">';
				echo '<div class="wysiwyg-editor">';
				the_content();
				echo '</div>';
				echo '<div class="wysiwyg-editor">';
				the_field( 'more_content' );
				echo '</div>';
			echo '</div>';

		echo '</div>';

	endwhile; // End of the loop.
	?>

</article>

<?php
/**
 * Loop Templates
 */
$acfp = new acf_flexible_content_to_partials( get_the_ID(), 'templates' );
$acfp->render();
