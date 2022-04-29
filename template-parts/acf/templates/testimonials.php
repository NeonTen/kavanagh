<?php
/**
 * The ACF template part for displaying Testimonials.
 *
 * @package Kavanagh
 */

$image           = get_sub_field( 'testimonials_image' );
$small_text      = get_sub_field( 'testimonial_small_heading' );
$section_heading = get_sub_field( 'testimonial_heading' );
?>

<section id="testimonials" class="w-full bg-light-color py-12 md:py-24 relative">

    <div class="container">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Left side start -->
        <div class="shadow-custom">

            <?php
            if ( $image ) {
                echo '<img class="w-full h-[500px] object-cover" src="' . esc_url( $image ) . '">';
            }

            // Check lists exists.
            if ( have_rows( 'testimonials_lists' ) ) :

                echo '<div class="testimonials-slider bg-white px-14 py-6 text-text-color">';

                // Loop through rows.
                while ( have_rows( 'testimonials_lists' ) ) :
                    the_row();

                    $testimonial = get_sub_field( 'testimonial' );
                    $author_name = get_sub_field( 'author_name' );

                    if ( $testimonial || $author_name ) {
                        printf(
                            '<div class="item">
                                <div class="text-xl font-light">%s</div>
                                <p class="flex justify-end text-xs uppercase mt-6">%s</p>
                            </div>',
                            wp_kses_post( $testimonial ),
                            esc_html( $author_name )
                        );
                    }

                endwhile;

                echo '</div>';

            endif;
            ?>

        </div>
        <!-- Left side end -->

        <!-- Right side start -->
        <div class="flex flex-col">
            <?php
            if ( $small_text ) {
                echo '<p class="text-xs text-field-color uppercase mb-5">' . wp_kses_post( $small_text ) . '</p>';
            }
            if ( $section_heading ) {
                echo '<h2 class="text-3xl sm:text-5xl font-light capitalize">' . wp_kses_post( $section_heading ) . '</h2>';
            }

            // Check lists exists.
            if ( have_rows( 'testimonial_right_lists' ) ) :

                // Loop through rows.
                while ( have_rows( 'testimonial_right_lists' ) ) :
                    the_row();

                    $heading = get_sub_field( 'testimonial_right_heading' );
                    $text    = get_sub_field( 'testimonial_right_content' );

                    if ( $heading || $text ) {
                        printf(
                            '<div class="mt-14"><h3 class="text-4xl font-light capitalize mb-4">%s</h3>
                            <p class="text-text-color">%s</p></div>',
                            esc_html( $heading ),
                            wp_kses_post( $text )
                        );
                    }

                endwhile;

            endif;
            ?>
        </div>
        <!-- Right side end -->

        </div>

    </div>

</section>
