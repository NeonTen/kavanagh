<?php
/**
 * The template part for displaying Content in single page.
 *
 * @package Kavanagh
 */

?>

<article>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/project/contact', 'info' );

		the_post_thumbnail( 'full', [ 'class' => 'w-full h-[500px] object-cover' ] );

		echo '<div class="container"><div class="wysiwyg-editor my-12 md:my-20">';
		the_content();
		echo '</div></div>';

	endwhile; // End of the loop.
	?>

</article>

<?php
/**
 * Loop Templates
 */
$acfp = new acf_flexible_content_to_partials( get_the_ID(), 'templates' );
$acfp->render();
