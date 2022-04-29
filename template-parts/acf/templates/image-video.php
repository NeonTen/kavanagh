<?php
/**
 * The ACF template part for displaying Image or Video.
 *
 * @package Kavanagh
 */

$layout = get_sub_field( 'iv_select_layout' );
$image = get_sub_field( 'iv_image' );
$video = get_sub_field( 'iv_youtube_video_id' );

if ( ! $image && ! $video ) {
    return;
}
?>

<section id="image-video" class="w-full relative">

    <?php
    if ( 'image' === $layout ) {
        echo '<img class="w-full h-[500px] object-cover" src="' . esc_url( $image ) . '">';
    }
    if ( 'video' === $layout ) {
        echo '<iframe class="w-full aspect-video" src="https://www.youtube.com/embed/' . esc_html( $video ) . '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
    ?>

</section>
