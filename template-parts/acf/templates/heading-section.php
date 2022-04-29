<?php
/**
 * The ACF template part for displaying Heading section.
 *
 * @package Kavanagh
 */

$small_text = get_sub_field( 'heading_section_small_text' );
$heading    = get_sub_field( 'heading_section_heading' );
$desc       = get_sub_field( 'heading_section_description' );
?>

<section id="heading-section" class="w-full py-12 md:py-20 relative">

	<div class="container">

        <?php
        if ( $small_text ) {
            echo '<p class="text-xs text-field-color uppercase">' . wp_kses_post( $small_text ) . '</p>';
        }
        ?>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mt-5">
            <?php
            if ( $heading ) {
                echo '<h2 class="text-4xl sm:text-7xl font-light uppercase">' . wp_kses_post( $heading ) . '</h2>';
            }
            if ( $desc ) {
                echo '<p class="text-text-color">' . wp_kses_post( $desc ) . '</p>';
            }
            ?>
		</div>

	</div>

</section>

