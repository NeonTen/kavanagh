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
			echo '<li>' . wp_kses_post( $address ) . '</li>';
		}
		if ( 'yes' === $phone && $g_phone ) {
			printf(
				'<li>
					<a href="tel:%s">%s</a>
				</li>',
				$phone_number, // phpcs:ignore
				$g_phone // phpcs:ignore
			);
		}
		if ( 'yes' === $email && $g_email ) {
			printf(
				'<li>
					<a href="mailto:%1$s">%1$s</a>
				</li>',
				$g_email // phpcs:ignore
			);
		}
		?>
	</ul>

</div>
