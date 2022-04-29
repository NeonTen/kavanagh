<?php
/**
 * The ACF template part for displaying News.
 *
 * @package Kavanagh
 */

$heading  = get_sub_field( 'news_heading' );
$content  = get_sub_field( 'news_content' );
$btn      = get_sub_field( 'news_button' );
$post_num = $_GET['num_post'] ? $_GET['num_post'] : get_sub_field( 'number_of_news_posts' );
$exclude  = get_sub_field( 'exclude_current_post' );
?>

<section id="latest-news" class="w-full bg-white relative">

    <div class="container">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <?php
            if ( $heading || $content || $btn ) {
                echo '<div class="grid items-center px-6 py-16 shadow-custom">';
				if ( $heading ) {
					echo '<h2 class="text-2xl sm:text-5xl font-light">' . wp_kses_post( $heading ) . '</h2>';
				}
				if ( $content ) {
					echo '<p class="text-text-color mt-12">' . wp_kses_post( $content ) . '</p>';
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
			?>

            <?php
            $args = [
                'posts_per_page' => $post_num,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'ASC',
            ];

            if ( 'yes' === $exclude ) {
                $args['post__not_in'] = [ get_the_id() ];
            }
            $query = new WP_Query( $args );
    
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

