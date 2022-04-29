<?php
/**
 * Menu Walker.
 *
 * @package Kavanagh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class
 */
class Kavanagh_Menu_Walker {

	/**
	 * Menu id
	 *
	 * @var $menu_id
	 */
	public $menu_id = '';

	/**
	 * Menu data
	 *
	 * @var $data
	 */
	public $data = [];

	/**
	 * Default constructor.
	 *
	 * @param string $menu_id menu id.
	 */
	public function __construct( $menu_id ) {
		$this->menu_id = $menu_id;
		$cache         = new get_menu_cache( $this->menu_id );
		$this->data    = $cache->data;
	}

	/**
	 * Build the mega menu with one tier drop downs
	 * Needs to be wrapped in a container/nav tag when
	 * output in template
	 *
	 * @param string $loc menu location.
	 *
	 * @return $html
	 */
	public function build_menu( $loc = '' ) {

		global $options;
		global $wp;
		$current_url = home_url( add_query_arg( [], $wp->request ) ) . '/';

		$menu_html = '<ul class="parent flex items-center lg:space-x-4 2xl:space-x-10 uppercase tracking-wider">';

		if ( 'mobile' === $loc ) {
			$menu_html = '<ul class="flex flex-col text-right space-y-2 uppercase tracking-wider">';
		}
		if ( 'footer' === $loc ) {
			$menu_html = '<ul class="grid grid-cols-2 md:flex md:items-center md:space-x-4 lg:space-x-8 2xl:space-x-20 uppercase tracking-wider">';
		}

		foreach ( $this->data as $link ) {

			$current        = ( $current_url === $link['url'] ) ? true : false;
			$mobile_submenu = 'sub-menu w-60 bg-theme-color p-5 text-white space-y-4 absolute top-10 -left-4 hidden group-hover:block shadow-md';
			$caret          = '';

			if ( $current && 'mobile' !== $loc ) {
				$classes = 'border-b border-theme-color';
			}
			if ( ! $current ) {
				$classes = 'flex items-center border-b border-transparent hover:border-theme-color';
			}
			if ( 'mobile' === $loc ) {
				$classes        = 'block mt-2';
				$mobile_submenu = $classes;
			}
			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) && 'mobile' !== $loc ) {
				$caret = '<span class="-translate-y-0.5"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg></span>';
			}

			$target = '';
			if ( '' !== $link['target'] ) {
				$target = ' target="' . $link['target'] . '" ';
			}

			$menu_html .= '<li class="group relative">';

			$menu_html .= sprintf(
				'<a href="%s" %s class="%s">%s%s</a>',
				$link['url'],
				$target,
				$classes,
				$link['title'],
				$caret
			);

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '<ul class="' . $mobile_submenu . '">';
			}

			foreach ( $link['children'] as $child ) {

				$menu_html .= '<li class="group relative">';

				if ( empty( $child['children'] ) ) {
					$menu_html .= sprintf(
						'<a href="%s" %s class="block mt-2">%s</a>',
						$child['url'],
						$target,
						$child['title']
					);
				}

				$menu_html .= '</li>';

			}

			if ( ! empty( $link['children'] ) && is_array( $link['children'] ) ) {
				$menu_html .= '</ul>';
			}

			$menu_html .= '</li>';

		}

		$menu_html .= '</ul>';

		return $menu_html;

	}

}
