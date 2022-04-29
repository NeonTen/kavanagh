<?php
/**
 * The ACF template part for displaying Team.
 *
 * @package Kavanagh
 */

$heading  = get_sub_field( 'team_heading' );
$content  = get_sub_field( 'team_description' );
$btn      = get_sub_field( 'team_button' );
?>

<section id="team-members" class="w-full bg-white py-12 md:py-24 relative">

    <div class="container">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Heading and description section start -->
            <?php
            if ( $heading || $content || $btn ) {
                echo '<div class="grid items-center px-6 py-8 lg:py-12 shadow-custom">';
				if ( $heading ) {
					echo '<h2 class="text-3xl lg:text-5xl font-light">' . wp_kses_post( $heading ) . '</h2>';
				}
				if ( $content ) {
					echo '<p class="text-text-color mt-8 lg:mt-12">' . wp_kses_post( $content ) . '</p>';
				}
                if ( $btn ) {
                    printf(
                        '<div><a href="%s" class="button mt-12" target="%s">%s</a></div>',
                        esc_url( $btn['url'] ),
                        esc_html( $btn['target'] ),
                        esc_html( $btn['title'] )
                    );
                }
                echo '</div>';
            }
            
            // Members Grid start.

            // Check lists exists.
            if ( have_rows( 'team_members' ) ) :

                // Loop through rows.
                while ( have_rows( 'team_members' ) ) :
                    the_row();

                    $image = get_sub_field( 'member_image' );
                    $name  = get_sub_field( 'member_name' );
                    $role  = get_sub_field( 'member_role' );
                    $text  = get_sub_field( 'member_content' );

                    echo '<div class="grid text-white hover:text-theme-color relative overflow-hidden group">';

                        echo '<img class="w-full h-full xl:h-[413px] object-cover transition-all duration-500 group-hover:scale-110" src="' . esc_url( $image ) . '">';

                        echo '<div class="bg-white/90 absolute inset-0 transition-opacity duration-500 opacity-0 group-hover:opacity-100"></div>';

                        if ( $name || $role || $text ) {
                            echo '<div class="caption w-full p-6 space-y-6 absolute left-0 bottom-0 group-hover:bottom-1/2 group-hover:translate-y-1/2 transition-all duration-300">';

                            if ( $name ) {
                                echo '<h3 class="text-2xl tracking-wide">' . wp_kses_post( $name ) . '</h3>';
                            }
                            if ( $role ) {
                                echo '<p class="text-xs">' . esc_html( $role ) . '</p>';
                            }
                            if ( $text ) {
                                echo '<p class="hidden group-hover:block">' . esc_html( $text ) . '</p>';
                            }

                            echo '</div>';
                        }

                    echo '</div>';

                endwhile;

            endif;
			?>

        </div>

    </div>

</section>

