<?php
/**
 * The ACF template part for displaying Custom button.
 *
 * @package Kavanagh
 */

$btn = get_sub_field( 'add_button' );

if ( $btn ) {
	printf(
		'<div class="container">
			<a href="%s" class="button button-border" target="%s">%s</a>
		</div>',
		esc_url( $btn['url'] ),
		esc_html( $btn['target'] ),
		esc_html( $btn['title'] )
	);
}
