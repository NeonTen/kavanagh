<?php
/**
 * ACF Options Panel
 *
 * @package Kavanagh
 */

defined( 'WPINC' ) || exit;

/**
 * Main Class.
 */
class ACF_Options_Panel {

	/**
	 * The Constructor
	 */
	public function __construct() {
		add_action( 'acf/init', [ $this, 'acf_op_init' ] );
	}

	/**
	 * ACF Options panel init.
	 */
	public function acf_op_init() {

		// Check function exists.
		if ( function_exists( 'acf_add_options_page' ) ) {

			// Add parent.
			$parent = acf_add_options_page(
				[
					'page_title' => __( 'Theme Settings', 'kavanagh' ),
					'menu_title' => __( 'Theme Settings', 'kavanagh' ),
					'icon_url'   => 'dashicons-admin-settings',
					'position'   => '5.3',
				]
			);

			// Add sub page.
			$child = acf_add_options_page(
				[
					'page_title'  => __( 'General Settings', 'kavanagh' ),
					'menu_title'  => __( 'General', 'kavanagh' ),
					'parent_slug' => $parent['menu_slug'],
				]
			);

			// Add sub page.
			$child = acf_add_options_page(
				[
					'page_title'  => __( 'Footer Settings', 'kavanagh' ),
					'menu_title'  => __( 'Footer', 'kavanagh' ),
					'parent_slug' => $parent['menu_slug'],
				]
			);

			// Add sub page.
			$child = acf_add_options_page(
				[
					'page_title'  => __( 'Archive Settings', 'kavanagh' ),
					'menu_title'  => __( 'Archive Pages', 'kavanagh' ),
					'parent_slug' => $parent['menu_slug'],
				]
			);

		}
	}

}

new ACF_Options_Panel();
