<?php
/**
 * The ACF template part for displaying Our Projjects.
 *
 * @package Kavanagh
 */

$heading  = get_sub_field( 'our_projects_heading' );
$content  = get_sub_field( 'our_projects_content' );
$btn1     = get_sub_field( 'our_projects_button_1' );
$btn2     = get_sub_field( 'our_projects_button_2' );
$post_num = get_sub_field( 'our_project_slider_num' );
?>

<section id="our-projects" class="w-full pb-10 md:py-14 xl:py-0 relative">

	<div class="container">

		<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 3xl:grid-cols-2 gap-10 items-center">

			<div class="flex flex-col xl:col-span-2 3xl:col-auto">
				<?php
				if ( $heading ) {
					echo '<h2 class="text-2xl sm:text-5xl font-light">' . wp_kses_post( $heading ) . '</h2>';
				}
				if ( $content ) {
					echo '<p class="text-text-color mt-10">' . wp_kses_post( $content ) . '</p>';
				}
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

			<div class="projects-slider xl:col-span-3 3xl:col-auto relative">
                <div class="slider-for w-full lg:w-[413px] hidden xl:block">
					<?php
					$query = new WP_Query( // phpcs:ignore
						[
							'post_type'      => 'project',
							'posts_per_page' => $post_num,
						]
					);
			
					if ( ! $query->have_posts() ) {
						echo '<p>No posts found.</p>';
					}
			
					while ( $query->have_posts() ) :
						$query->the_post();
			
						$img_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

						echo '<img class="w-full h-[800px] object-cover" src="' . esc_url( $img_url ) . '">';
			
					endwhile;
			
					wp_reset_postdata();
					?>
                </div>

                <div class="slider-nav w-full lg:w-[400px] lg:absolute lg:top-1/2 lg:right-0 lg:-translate-y-1/2">
					<?php
					$query = new WP_Query( // phpcs:ignore
						[
							'post_type'      => 'project',
							'posts_per_page' => $post_num,
						]
					);
			
					if ( ! $query->have_posts() ) {
						echo '<p>No posts found.</p>';
					}
			
					while ( $query->have_posts() ) :
						$query->the_post();

						$terms   = get_the_terms( get_the_id(), 'project_category' );
						$img_url = get_the_post_thumbnail_url( get_the_id(), 'full' );

						echo '<div>';
						echo '<img class="w-full h-[400px] object-cover" src="' . esc_url( $img_url ) . '">';
						if ( $terms ) {
							foreach( $terms as $term ) {
								printf(
									'<div class="cat text-4xl font-light text-text-color text-center mt-5"><a href="%s">%s</a></div>',
									esc_url( get_term_link( $term->term_id, 'project_category' ) ),
									esc_html( $term->name )
								);
							} 
						}
						echo '</div>';
			
					endwhile;
			
					wp_reset_postdata();
					?>
                </div>
            </div>

		</div>

	</div>

</section>

