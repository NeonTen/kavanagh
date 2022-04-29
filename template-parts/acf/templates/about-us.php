<?php
/**
 * The ACF template part for displaying About Us.
 *
 * @package Kavanagh
 */

$img      = get_sub_field( 'about_us_image' );
$heading  = get_sub_field( 'about_us_heading' );
$content  = get_sub_field( 'about_us_content' );
$play_btn = get_sub_field( 'about_us_play_button_text' );
$btn1     = get_sub_field( 'about_us_button_1' );
$btn2     = get_sub_field( 'about_us_button_2' );
?>

<section id="about-us" class="w-full py-12 md:py-24 relative">

	<div class="container">

		<div class="grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-20 xl:flex items-center">

			<?php
			if ( $img ) {
				echo '<img class="w-full xl:w-[738px] h-[450px] object-cover" src="' . esc_url( $img ) . '">';
			}
			?>
			<div class="flex flex-col">
				<?php
				if ( $heading ) {
					echo '<h2 class="text-2xl sm:text-5xl font-light">' . wp_kses_post( $heading ) . '</h2>';
				}
				if ( $content ) {
					echo '<p class="text-text-color mt-10">' . wp_kses_post( $content ) . '</p>';
				}
				?>
				<a href="#" class="play-button modal-trigger flex items-center space-x-6 mt-10" data-modal="video">

					<!-- <a href="#" class="modal-trigger" data-modal="video"> -->
					<div class="icon">
						<svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_72_932)">
							<circle cx="32" cy="32.5" r="32" fill="#DACF52"/>
							<path d="M64 32.5C64 40.9869 60.6286 49.1263 54.6274 55.1274C48.6263 61.1286 40.4869 64.5 32 64.5C23.5131 64.5 15.3737 61.1286 9.37258 55.1274C3.37142 49.1263 0 40.9869 0 32.5C0 24.0131 3.37142 15.8737 9.37258 9.87258C15.3737 3.87142 23.5131 0.5 32 0.5C40.4869 0.5 48.6263 3.87142 54.6274 9.87258C60.6286 15.8737 64 24.0131 64 32.5ZM27.16 20.872C26.8609 20.6591 26.5091 20.5326 26.1429 20.5063C25.7767 20.4801 25.4104 20.5552 25.084 20.7233C24.7577 20.8914 24.4839 21.1462 24.2927 21.4595C24.1015 21.7729 24.0002 22.1329 24 22.5V42.5C24.0002 42.8671 24.1015 43.2271 24.2927 43.5405C24.4839 43.8538 24.7577 44.1086 25.084 44.2767C25.4104 44.4448 25.7767 44.5199 26.1429 44.4937C26.5091 44.4674 26.8609 44.3409 27.16 44.128L41.16 34.128C41.4193 33.943 41.6306 33.6987 41.7764 33.4156C41.9222 33.1324 41.9983 32.8185 41.9983 32.5C41.9983 32.1815 41.9222 31.8676 41.7764 31.5844C41.6306 31.3013 41.4193 31.057 41.16 30.872L27.16 20.872Z" fill="#0E2F58"/>
							</g>
							<defs>
							<clipPath id="clip0_72_932">
							<rect width="64" height="64" fill="white" transform="translate(0 0.5)"/>
							</clipPath>
							</defs>
						</svg>
					</div>
					<?php
					if ( $play_btn ) {
						echo '<span class="text-2xl text-text-color">' . wp_kses_post( $play_btn ) . '</span>';
					}
					?>
					<!-- <span class="text-2xl text-text-color">View Our Story</span> -->

				</a>
				<?php
				if ( $btn1 || $btn2 ) {
					echo '<div class="flex flex-wrap gap-3 mt-10">';

					if ( $btn1 ) {
						printf(
							'<a href="%s" class="button" target="%s">%s</a>',
							esc_url( $btn1['url'] ),
							esc_html( $btn1['target'] ),
							esc_html( $btn1['title'] )
						);
					}
					if ( $btn2 ) {
						printf(
							'<a href="%s" class="button button-border" target="%s">%s</a>',
							esc_url( $btn2['url'] ),
							esc_html( $btn2['target'] ),
							esc_html( $btn2['title'] )
						);
					}

					echo '</div>';
				}
				?>
			</div>

		</div>

	</div>

	<div class="w-3/4 h-full bg-light-color py-24 absolute top-0 right-0 -bottom-24 -z-10 hidden lg:block"></div>

</section>

