<?php
/**
 * The template part for displaying Widget 3 in footer.
 *
 * @package Kavanagh
 */

$heading = get_field( 'w3_heading', 'option' );

if ( ! $heading && ! have_rows( 'w3_links', 'option' ) ) {
	return;
}
?>
<div class="f-widget">
	<?php

	if ( $heading ) {
		echo '<h3 class="widget-title text-2xl font-normal mb-4">' . esc_html( $heading ) . '</h3>';
	}

	if ( have_rows( 'w3_links', 'option' ) ) :

		echo '<div class="links"><ul class="space-y-3">';

		while ( have_rows( 'w3_links', 'option' ) ) :
			the_row();

			$links = get_sub_field( 'w3_link' );

			if ( $links ) {
				printf(
					'<li>
						<a class="animate-line" href="%s" target="%s">%s</a>
					</li>',
					esc_url( $links['url'] ),
					esc_html( $links['target'] ),
					esc_html( $links['title'] )
				);
			}


		endwhile;

		echo '</ul></div>';

	endif;
	?>
</div>
