<?php
/**
 * The ACF template part for displaying Consultation form.
 *
 * @package Kavanagh
 */

$heading    = get_sub_field( 'consultation_form_heading' );
$shortcode  = get_sub_field( 'consultation_form_shortcode' );
$image      = get_sub_field( 'consultation_form_image' );
?>

<section id="consultation-form" class="w-full bg-light-color py-12 md:py-24 relative">

    <div class="container">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <div class="form">
                <?php
                if ( $heading ) {
					echo '<h2 class="text-2xl sm:text-5xl font-light capitalize">' . wp_kses_post( $heading ) . '</h2>';
				}
                if ( $shortcode ) {
					echo do_shortcode( $shortcode );
				}
                ?>
            </div>

            <?php
            if ( $image ) {
                echo '<img class="w-full h-[448px]" src="' . esc_url( $image ) . '">';
            }
            ?>

        </div>

    </div>

</section>
