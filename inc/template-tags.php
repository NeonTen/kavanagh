<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kavanagh
 */

/**
 * Prints HTML of logo.
 */
function theme_logo() {
	?>
	<div class="logo">
	<?php
	if ( has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		$image_url      = $image[0];

		printf(
			'<a href="%s" class="navbar-brand">
				<img class="w-48 object-scale-down" src="%s">
			</a>',
			esc_url( get_home_url() ),
			esc_url( $image_url )
		);
	} else {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php
	}
	?>
	</div>
	<?php
}

if ( ! function_exists( 'kavanagh_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function kavanagh_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'kavanagh' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'kavanagh_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function kavanagh_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'kavanagh' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'kavanagh_author_avatar' ) ) :
	/**
	 * Prints HTML with author image for the current author.
	 *
	 * @param string $size size of avatar image.
	 */
	function kavanagh_author_avatar( $size = '100' ) {
		if ( function_exists( 'get_avatar' ) ) :
			echo get_avatar( get_the_author_meta( 'email' ), $size );
		endif;
	}
endif;

if ( ! function_exists( 'kavanagh_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kavanagh_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kavanagh' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kavanagh' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'kavanagh' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kavanagh' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kavanagh' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kavanagh' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'kavanagh_post_title' ) ) {
	/**
	 * Displays an optional post title.
	 */
	function kavanagh_post_title() {

		if ( is_singular() && ! is_front_page() ) :
			the_title( '<h1 class="page-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

	}
}

if ( ! function_exists( 'kavanagh_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param string $thumb cuustom thumb size.
	 */
function kavanagh_post_thumbnail( $thumb = 'post-thumbnail', $classes = 'hello' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						$thumb,
						[
							'alt' => the_title_attribute(
								[
									'echo' => false,
								]
							),
							'class' => $classes,
						]
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Prints HTML of header.
 */
function theme_header_html() {

	if ( is_404() ) {
		return;
	}
	?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kavanagh' ); ?></a>

	<?php
	// Mobile menu.
	get_template_part( 'template-parts/header/mobile', 'menu' );
	?>

	<!-- Header start -->
	<header class="site-header w-full relative">
	<div class="container">

		<div class="header-wrap flex justify-between items-center space-x-2 text-dark-color py-8 relative z-10">

			<?php theme_logo(); ?>

			<!-- Nav bar start -->
			<div class="main-nav flex items-center">
				<?php get_template_part( 'template-parts/header/main', 'menu' ); ?>
			</div>
			<!-- Nav bar end -->
			
			<?php get_template_part( 'template-parts/header/contact', 'info' ); ?>
			
			<?php get_template_part( 'template-parts/header/main', 'icons' ); ?>

		</div>

	</div>
	<!-- Container end -->

	</header>
	<!-- Header end -->

	<?php

}

/**
 * Prints HTML of footer.
 */
function theme_footer_html() {

	if ( is_404() ) {
		return;
	}
	$nav = new Kavanagh_Menu_Walker( 'footer-menu' );
	?>

	<footer class="site-footer bg-white font-light py-12">
		<div class="container">

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-center sm:text-left">
				<?php
				/**
				 * Widgets here
				 */
				get_template_part( 'template-parts/footer/widget', '1' );
				get_template_part( 'template-parts/footer/widget', '2' );
				get_template_part( 'template-parts/footer/widget', '3' );
				get_template_part( 'template-parts/footer/widget', '4' );
				?>

			</div>

			<nav class="font-normal flex justify-center mt-10"><?php echo $nav->build_menu( 'footer' ); // phpcs:ignore ?></nav>

		</div><!-- container end -->
	</footer>

	<!-- Copyrights -->
	<?php
	theme_copyrights_html();
}

/**
 * Prints HTML of Copyrights.
 */
function theme_copyrights_html() {

	if ( is_404() ) {
		return;
	}
	$copyright_text = get_field( 'copyright_text', 'option' );
	?>

	<!-- Copyrights start -->
	<div class="copyrights bg-white text-xs py-3">
		<div class="container">

			<div class="flex flex-col md:flex-row justify-between items-center gap-2">

				<p class="copyrights-text opacity-50">
					<?php
					if ( $copyright_text ) {
						echo wp_kses_post( $copyright_text );
					}
					?>
				</p>
				<div class="flex items-center space-x-2">
					<p class="opacity-50">Expertly crafted by</p>
					<a href="https://fyrefli.ie/" target="_blank" class="flex items-center space-x-2">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/bug.png'; ?>">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-text.png'; ?>">
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Copyrights end -->

	<?php
}
