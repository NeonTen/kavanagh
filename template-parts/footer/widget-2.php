<?php
/**
 * The template part for displaying Widget 2 in footer.
 *
 * @package Kavanagh
 */

$heading = get_field( 'w2_heading', 'option' );
$address = get_field( 'w2_address', 'option' );
$phone   = get_field( 'w2_phone_number', 'option' );
$email   = get_field( 'w2_email', 'option' );

$g_phone        = get_field( 'phone_number', 'option' );
$phone_number   = kavanagh_clean( $phone );
$g_email        = get_field( 'email_address', 'option' );

if ( ! $heading && ! $address && 'yes' === ! $phone && 'yes' === ! $email ) {
	return;
}
?>

<div class="f-widget">

	<?php
	if ( $heading ) {
		echo '<h3 class="widget-title text-2xl font-normal mb-4">' . esc_html( $heading ) . '</h3>';
	}
	?>

	<ul class="space-y-4 grid justify-center sm:justify-start">
		<?php
		if ( $address ) {
			printf(
				'<li class="flex space-x-4">
					<span class="w-14">%s</span>
					<span>%s</span>
				</li>',
				esc_html__( 'Address:', 'kavanagh' ),
				wp_kses_post( $address )
			);
		}
		if ( 'yes' === $phone && $g_phone ) {
			printf(
				'<li class="flex space-x-4">
					<span class="w-14">%s</span>
					<a href="tel:%s">%s</a>
				</li>',
				esc_html__( 'Phone:', 'kavanagh' ),
				$phone_number, // phpcs:ignore
				$g_phone // phpcs:ignore
			);
		}
		if ( 'yes' === $email && $g_email ) {
			printf(
				'<li class="flex space-x-4">
					<span class="w-14">%1$s</span>
					<a href="mailto:%2$s">%2$s</a>
				</li>',
				esc_html__( 'Email:', 'kavanagh' ),
				$g_email // phpcs:ignore
			);
		}
		?>
	</ul>

</div>
