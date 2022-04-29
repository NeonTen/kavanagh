<?php
/**
 * The ACF template part for displaying Subscribe Box.
 *
 * @package Kavanagh
 */

$heading   = get_sub_field( 'subscribe_box_heading' );
$desc      = get_sub_field( 'subscribe_box_description' );
$shortcode = get_sub_field( 'subscribe_box_form_shortcode' );
?>

<section id="subscribe-box" class="w-full relative">

	<div class="container">

        <?php
        if ( $heading ) {
            echo '<h2 class="text-3xl sm:text-5xl font-light capitalize">' . wp_kses_post( $heading ) . '</h2>';
        }
        ?>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-end mt-12">

            <div class="wysiwyg-editor text-text-color space-y-6">
            <?php
            if ( $desc ) {
                echo wp_kses_post( $desc );
            }
            ?>
            </div>

            <div class="subscribe-form relative">
                <div class="absolute top-3.5 hidden sm:block">
                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.484 8.03349L22.635 2.6895V13.3165L16.484 8.03349ZM8.558 8.93849L10.718 10.8135C11.057 11.1015 11.499 11.2755 11.982 11.2755H11.999H11.998H12.012C12.496 11.2755 12.938 11.1005 13.281 10.8105L13.278 10.8125L15.438 8.9375L22.004 14.5765H1.995L8.558 8.93849ZM1.986 1.42249H22.016L12.395 9.77849C12.2868 9.86406 12.1529 9.91057 12.015 9.91049H12.001H12.002H11.988C11.8496 9.91067 11.7152 9.86377 11.607 9.7775L11.608 9.77849L1.986 1.42249ZM1.365 2.6885L7.515 8.0325L1.365 13.3125V2.6885ZM22.965 0.247495C22.725 0.127495 22.443 0.0574951 22.144 0.0574951H1.859C1.56916 0.0575644 1.28331 0.125006 1.024 0.254495L1.035 0.249495C0.724573 0.402606 0.463148 0.639474 0.280254 0.933341C0.0973606 1.22721 0.000287348 1.56636 0 1.9125L0 14.0845C0.000529404 14.5771 0.196452 15.0494 0.54478 15.3977C0.893108 15.746 1.36539 15.942 1.858 15.9425H22.141C22.6336 15.942 23.1059 15.746 23.4542 15.3977C23.8025 15.0494 23.9985 14.5771 23.999 14.0845V1.9125C23.999 1.1855 23.58 0.555495 22.97 0.252495L22.959 0.247495H22.965Z" fill="#55565B"/>
                    </svg>
                </div>
                <?php echo do_shortcode( $shortcode ); ?>
            </div>

		</div>

	</div>

</section>

