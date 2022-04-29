<?php
/**
 * The ACF template part for displaying Our Partners.
 *
 * @package Kavanagh
 */

$heading = get_sub_field( 'our_partners_heading' );
?>

<section id="our-partners" class="w-full bg-light-color py-12 md:py-24 relative">

    <div class="container">

    <?php

    // Heading.
    if ( $heading ) {
        echo '<h2 class="text-2xl sm:text-5xl font-light mb-12">' . wp_kses_post( $heading ) . '</h2>';
    }

    // Check lists exists.
    if ( have_rows( 'partners_lists' ) ) :

        echo '<div class="grid grid-cols-2 md:grid-cols-3 3xl:grid-cols-4 gap-6">';

        // Loop through rows.
        while ( have_rows( 'partners_lists' ) ) :
            the_row();

            // Load sub field value.
            $image = get_sub_field( 'partner_image' );
            $url   = get_sub_field( 'partner_link' );

            echo '<div class="bg-white shadow-custom aspect-4/3 grid place-content-center hover:shadow-md transition-all duration-500 group">';
            if ( $url && $image ) {
                printf(
                    '<a href="%s"><img class="mx-auto transition-all duration-500 group-hover:scale-110" src="%s"></a>',
                    esc_url( $url ),
                    esc_url( $image )
                );
            }
            if ( ! $url && $image ) {
                printf(
                    '<img class="mx-auto transition-all duration-500 group-hover:scale-110" src="%s">',
                    esc_url( $image )
                );
            }
            echo '</div>';

        endwhile;

        echo '</div>';

    endif;

    ?>

    </div>

</section>

