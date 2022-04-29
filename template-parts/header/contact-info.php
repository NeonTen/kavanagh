<?php
/**
 * The template part for displaying contact info in header.
 *
 * @package Kavanagh
 */

$phone        = get_field( 'phone_number', 'option' );
$phone_number = kavanagh_clean( $phone );
$email        = get_field( 'email_address', 'option' );

if ( ! $phone && ! $email ) {
	return;
}
?>

<div class="contact-info hidden xl:flex lg:space-x-6 tracking-wider">

	<?php
	if ( $email ) {
		printf(
			'<a href="mailto:%1$s">%1$s</a>',
			$email
		);
	}
	if ( $phone ) {
		printf(
			'<a href="tel:%s">%s</a>',
			$phone_number,
			$phone
		);
	}
	?>

</div>
