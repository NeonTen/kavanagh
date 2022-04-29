<?php
/**
 * The ACF template part for displaying Hero Banner.
 *
 * @package Kavanagh
 */

$layout  = get_sub_field( 'hero_banner_layout' );
$heading = get_sub_field( 'hero_banner_heading' );
$content = get_sub_field( 'hero_banner_content' );
$btn     = get_sub_field( 'hero_banner_button' );
$img     = get_sub_field( 'hero_banner_image' );

$img_classes = 'w-full sm:w-auto h-[673px] object-cover ml-auto';
$grid_classes = 'grid grid-cols-1 md:grid-cols-2 gap-10 items-center';
if ( '2' === $layout ) {
	$img_classes = 'w-full sm:w-auto h-[536px] object-cover md:ml-auto';
	$grid_classes = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 items-center';
}
?>

<section id="hero-banner" class="w-full mb-10 md:mb-20 relative">

	<div class="container">

		<div class="<?php echo esc_html( $grid_classes ); ?>">

			<div class="flex flex-col<?php echo '2' === $layout ? ' lg:col-span-3' : ''; ?>">
				<?php
				if ( $heading ) {
					echo '<h1 class="text-5xl lg:text-7xl font-extralight uppercase">' . wp_kses_post( $heading ) . '</h1>';
				}
				if ( $content ) {
					echo '<p class="text-text-color mt-10 xl:w-[450px]">' . wp_kses_post( $content ) . '</p>';
				}
				if ( $btn ) {
					printf(
						'<div><a href="%s" class="button mt-12" target="%s">%s</a></div>',
						esc_url( $btn['url'] ),
						esc_html( $btn['target'] ),
						esc_html( $btn['title'] )
					);
				}
				?>
			</div>

			<div class="relative<?php echo '2' === $layout ? ' lg:col-span-2' : ''; ?>">
				<?php
				if ( $img ) {
					echo '<img class="' . esc_html( $img_classes ) . '" src="' . esc_url( $img ) . '">';
				}
				?>
				<div class="w-80 h-96 absolute -bottom-20 -right-20 -z-10 hidden lg:block<?php echo '1' === $layout ? ' bg-theme-color' : ' bg-yellow-color'; ?>"></div>
			</div>

		</div>

	</div>

	<?php
	if ( '1' === $layout ) {
		?>
		<div class="w-1/2 bg-light-color absolute -top-32 left-0 bottom-24 -z-10 after:content-[''] after:w-5 after:h-full after:bg-light-color after:absolute after:top-0 after:-right-5 hidden lg:block"></div>
		<?php
	}
	?>

</section>

