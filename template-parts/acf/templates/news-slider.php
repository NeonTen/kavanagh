<?php
/**
 * The ACF template part for displaying Slider.
 *
 * @package Kavanagh
 */

$post_num = get_sub_field( 'number_of_slides' );

if ( ! $post_num ) {
    return;
}
?>

<section id="news-slider" class="w-full relative">

    <?php
    $query = new WP_Query( // phpcs:ignore
        [ 'posts_per_page' => $post_num ]
    );

    if ( ! $query->have_posts() ) {
        echo '<p>No posts found.</p>';
    }

    echo '<div class="slider-container">';

    while ( $query->have_posts() ) :
        $query->the_post();

        $image = '';
        $date  = get_the_date();

        echo '<div class="item relative">';

            the_post_thumbnail( 'full', [ 'class' => 'w-full h-[500px] object-cover' ] );
            ?>

            <div class="caption w-full lg:w-[58%] text-white capitalize px-20 lg:pl-32 text-center md:text-left absolute left-0 bottom-1/2 lg:bottom-11 translate-y-1/2 lg:translate-y-0 z-10">
                <div class="container">
                    <?php
                    if ( $date ) {
                        echo '<p class="text-xs text-yellow-color mb-6">' . esc_html( $date ) . '</p>';
                    }
                    the_title( '<h3 class="text-4xl md:text-5xl font-light mb-6">', '</h3>' );
                    echo '<div class="wysiwyg-editor white space-y-6">';
                    the_content();
                    echo '</div>';
                    ?>
                </div>
            </div>

            <?php

        echo '</div>';

    endwhile;

    echo '</div>';

    wp_reset_postdata();
    ?>

</section>

