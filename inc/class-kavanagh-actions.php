<?php
/**
 * All custom actions here.
 *
 * @package Kavanagh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class for Actions
 */
class Kavanagh_Actions {

	/**
	 * The Construct
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Hooks and Filters.
	 */
	public function hooks() {
		add_action( 'kavanagh_after_header', [ $this, 'get_video_popup' ], 10 );
	}

	/**
	 * Popup.
	 */
	public function get_video_popup() {
		if ( ! is_page_template( 'page-home.php' ) ) {
			return;
		}
		// Check value exists.
		if( have_rows('templates') ):
			// Loop through rows.
			while ( have_rows('templates') ) : the_row();
			if( get_row_layout() == 'about_us' ):
				$video_id = get_sub_field( 'about_us_youtube_id' );
			endif;
			endwhile;
		endif;
		?>
		<div class="modal-overlay w-full h-full fixed inset-0 z-10 bg-black bg-opacity-30 hidden"></div>
		<div class="modal-body modal-video w-[90%] lg:w-[800px] bg-white p-1 shadow transition-all duration-500 fixed left-1/2 top-40 -translate-x-1/2 -translate-y-[9999px] z-20">
			<div class="close absolute -top-4 right-4 cursor-pointer">
				<span class="w-5 h-0.5 bg-white block rotate-[40deg] absolute"></span>
				<span class="w-5 h-0.5 bg-white block -rotate-[40deg] absolute"></span>
			</div>
			<?php
				echo '<iframe class="w-full aspect-video" src="https://www.youtube.com/embed/' . esc_html( $video_id ) . '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			?>
		</div>
		<?php
	}

}

// Init.
new Kavanagh_Actions();
