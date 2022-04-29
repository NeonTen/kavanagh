<?php
/**
 * The template part for displaying Widget 4 in footer.
 *
 * @package Kavanagh
 */

$is_social_enabled = get_field( 'w4_enable_social_icons', 'option' );
if ( 'no' === $is_social_enabled ) {
	return;
}
if ( ! have_rows( 'social_icons', 'option' ) ) {
	return;
}
?>
<div class="f-widget">
	<?php

	if ( have_rows( 'social_icons', 'option' ) ) :

		echo '<div class="social-icons flex justify-center sm:justify-start lg:justify-end gap-4">';

		while ( have_rows( 'social_icons', 'option' ) ) :
			the_row();

			$icon = get_sub_field( 'w4_icon', 'option' );
			$url  = get_sub_field( 'w4_link', 'option' );

			if ( $icon || $url ) {
				printf(
					'<a class="flex hover:scale-110 lg:justify-end" href="%s" target="_blank">
                        <img src="%s">
                    </a>',
					esc_url( $url ),
					esc_html( $icon )
				);
			}

		endwhile;

		echo '</div>';

	endif;
	?>
</div>
