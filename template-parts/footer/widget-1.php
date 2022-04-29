<?php
/**
 * The template part for displaying Widget 2 in footer layout 2.
 *
 * @package Kavanagh
 */

$logo = get_field( 'footer_logo', 'option' );

if ( ! $logo ) {
	return;
}
?>
<div class="f-widget">
	<?php

	if ( $logo ) {
		printf(
			'<a href="%s" class="navbar-brand footer-logo">
				<img class="h-24 mx-auto sm:mx-0" src="%s">
			</a>',
			esc_url( get_home_url() ),
			esc_url( $logo )
		);
	}
	?>
</div>
