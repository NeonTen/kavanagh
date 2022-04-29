<?php
/**
 * The ACF template part for displaying Contact info.
 *
 * @package Kavanagh
 */

$heading          = get_sub_field( 'contact_info_heading' );
$sub_heading      = get_sub_field( 'contact_info_sub_heading' );
$is_social_enable = get_sub_field( 'contact_info_enable_social_icons' );
?>

<section id="heading-section" class="w-full py-12 md:py-20 relative">

	<div class="container">

		<div class="grid grid-cols-1 lg:flex gap-12 md:gap-20 xl:gap-40">

            <div class="flex flex-col lg:w-2/5 space-y-6">
            <?php
            if ( $heading ) {
                echo '<h2 class="text-5xl md:text-7xl font-extralight uppercase">' . wp_kses_post( $heading ) . '</h2>';
            }
            if ( $sub_heading ) {
                echo '<h4 class="text-3xl md:text-5xl font-light">' . wp_kses_post( $sub_heading ) . '</h4>';
            }
            if ( $is_social_enable ) {
                if ( have_rows( 'social_icons', 'option' ) ) :

                    echo '<div class="social-icons flex gap-4">';
            
                    while ( have_rows( 'social_icons', 'option' ) ) :
                        the_row();
            
                        $icon = get_sub_field( 'w4_icon', 'option' );
                        $url  = get_sub_field( 'w4_link', 'option' );
            
                        if ( $icon || $url ) {
                            printf(
                                '<a class="flex hover:scale-110" href="%s" target="_blank">
                                    <img src="%s">
                                </a>',
                                esc_url( $url ),
                                esc_html( $icon )
                            );
                        }
            
                    endwhile;
            
                    echo '</div>';
            
                endif;
            }
            ?>
            </div>

            <div class="lg:w-3/5 grid grid-cols-1 sm:grid-cols-2 gap-8 lg:gap-16">
            <?php
            if ( have_rows( 'more_info' ) ) :

                while ( have_rows( 'more_info' ) ) :
                    the_row();
                    
                    $icon       = get_sub_field( 'more_info_icon' );
                    $small_text = get_sub_field( 'more_info_small_text' );
                    $text       = get_sub_field( 'more_info_text' );
                    
                    echo '<div class="flex gap-10">';
        
                    if ( $icon ) {
                        echo '<img class="w-12 h-12" src="' . esc_html( $icon ) . '">';
                    }

                    if ( $small_text || $text ) {
                        printf(
                            '<div class="flex flex-col space-y-4">
                                <p class="text-xs text-field-color uppercase">%s</p>
                                <div class="text-xl font-light">%s</div>
                            </div>',
                            esc_html( $small_text ),
                            wp_kses_post( $text )
                        );
                    }
        
                    echo '</div>';
                    
                endwhile;
        
            endif;
            ?>
            </div>

		</div>

	</div>

</section>
