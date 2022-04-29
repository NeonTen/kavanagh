<?php
/**
 * The template part for displaying Posts.
 *
 * @package Kavanagh
 */

?>

<section id="latest-news" class="w-full bg-white py-12 md:py-24 relative">

    <div class="container">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <?php
            $query = new WP_Query( // phpcs:ignore
                [
					'post_type'      => get_post_type(),
					'posts_per_page' => '-1',
				]
            );
    
            if ( ! $query->have_posts() ) {
                echo '<p>No posts found.</p>';
            }
    
            while ( $query->have_posts() ) :
                $query->the_post();
    
                $image      = '';
                $date       = get_the_date();
                $categories = get_the_category_list( esc_html__( ', ', 'kavanagh' ) );

                echo '<div class="grid text-white relative overflow-hidden group">';

					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
					the_post_thumbnail( 'full', [ 'class' => 'w-full lg:h-[413px] object-cover transition-all duration-1000 group-hover:scale-110' ] );
					echo '</a>';
                    ?>

                    <div class="caption w-full lg:w-1/2 xl:w-2/5 p-6 space-y-6 absolute left-0 bottom-0">
                        <?php
                        echo '<p class="text-xs text-yellow-color uppercase">' . $categories . '</p>';
                        the_title( '<h3 class="text-2xl tracking-wide"><a class="animate-line" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                        echo '<p class="text-xs">' . $date . '</p>';
                        ?>
                    </div>

                    <?php

                echo '</div>';
    
            endwhile;
    
            wp_reset_postdata();
            ?>

        </div>

    </div>

</section>
