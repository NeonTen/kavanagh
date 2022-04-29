<?php
/**
 * The ACF template part for Contact form and Google map.
 *
 * @package Kavanagh
 */

$heading    = get_sub_field( 'contact_form_heading' );
$shortcode  = get_sub_field( 'contact_form_shortcode' );
$map        = get_sub_field( 'map_embed_code' );
?>

<section id="contact-form" class="w-full bg-light-color py-12 md:py-24 relative">

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
            if ( $map ) {
                echo $map; // phpcs:ignore.
            }
            ?>

        </div>

    </div>

</section>
