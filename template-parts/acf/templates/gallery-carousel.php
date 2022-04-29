<?php
/**
 * The ACF template part for displaying Gallery Carousel.
 *
 * @package Kavanagh
 */

$heading = get_sub_field( 'gallery_carousel_heading' );
?>

<section id="gallery-carousel" class="gallery-slider-wrapper bg-light-color py-12 md:py-24 relative">
	<div class="container">

		<?php
		if ( $heading ) {
			echo '<h2 class="text-2xl sm:text-5xl font-light mb-12">' . wp_kses_post( $heading ) . '</h2>';
		}

		// Check lists exists.
		if ( have_rows( 'carousel_items' ) ) :

			echo '<div class="popup-gallery gallery-slider">';
	
			// Loop through rows.
			while ( have_rows( 'carousel_items' ) ) :
				the_row();
	
				// Load sub field value.
				$image = get_sub_field( 'carousel_image' );
	
				if ( $image ) {
					printf(
						'<a class="image" href="%1$s">
							<img class="w-full h-[413px] object-cover" src="%1$s">
						</a>',
						esc_url( $image )
					);
				}
	
			endwhile;
	
			echo '</div>';
	
		endif;
		?>

	</div>
</section>
