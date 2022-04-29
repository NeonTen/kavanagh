<?php
/**
 * The ACF template part for displaying Projects.
 *
 * @package Kavanagh
 */

$heading = get_sub_field( 'projects_heading' );
$count   = 1;
?>

<section id="project-posts" class="w-full bg-white relative">

    <div class="container">

        <?php
        // Heading.
        if ( $heading ) {
            echo '<h2 class="text-2xl sm:text-5xl font-light mb-12">' . wp_kses_post( $heading ) . '</h2>';
        }
        ?>

        <div class="flex space-x-20 text-2xl">
            <button class="text-field-color border-b border-transparent" data-filter="all">All</button>
            <?php
            $terms = get_sub_field( 'projects_categories' );
            foreach( $terms as $term ) {
                printf(
                    '<button class="text-field-color border-b border-transparent" data-filter=".%1$s">%2$s</button>',
                    esc_html( $term->slug ),
                    esc_html( $term->name )
                );
            }
            ?>
        </div>

        <div class="filter-posts grid grid-cols-1 lg:grid-cols-3 gap-5 mt-14">

            <!-- News Posts start -->
            <?php
            $query = new WP_Query( // phpcs:ignore
                [
                    'post_type'      => 'project',
                    'posts_per_page' => 10,
                ]
            );
    
            if ( ! $query->have_posts() ) {
                echo '<p>No posts found.</p>';
            }
    
            while ( $query->have_posts() ) :
                $query->the_post();
    
                $class          = '';
                $image          = '';
                $date           = get_the_date();
				$terms          = get_the_terms( get_the_id(), 'project_category' );
                $filter_classes = $terms[0]->slug;

                if ( 4 === $count || 10 === $count ) {
                    $class = " lg:col-span-2";
                }

                echo '<div class="grid text-white relative overflow-hidden group' . esc_html( $class ) . ' mix ' . esc_html( $filter_classes ) . '">';

                    echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                    the_post_thumbnail( 'full', [ 'class' => 'w-full lg:h-[413px] object-cover transition-all duration-500 group-hover:scale-110' ] );
                    echo '</a>';
                    ?>

                    <div class="caption w-full p-6 space-y-6 absolute left-0 bottom-0">
                        <?php
                        echo '<p class="text-xs text-yellow-color uppercase">' . $filter_classes . '</p>';
                        the_title( '<h3 class="text-2xl tracking-wide"><a class="animate-line" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                        echo '<p class="text-xs">' . $date . '</p>';
                        ?>
                    </div>

                    <?php

                echo '</div>';

                ++$count;
    
            endwhile;
    
            wp_reset_postdata();
            ?>
            <!-- News Posts end -->

        </div>

    </div>

</section>

