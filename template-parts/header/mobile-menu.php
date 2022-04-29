<?php
/**
 * The template part for displaying Mobile menu in header.
 *
 * @package Kavanagh
 */

$nav = new Kavanagh_Menu_Walker( 'main-menu' );
?>

<!-- Mobile menu -->
<div class="mobile-menu slide-close flex flex-col bg-theme-color text-white w-96 h-screen overflow-y-scroll px-10 py-2 fixed right-0 top-0 z-30 transition-all duration-200">

	<div class="close text-2xl mt-8">
		<svg class="w-4 h-4 mt-4 cursor-pointer" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 1.05L10.95 0L6 4.95L1.05 0L0 1.05L4.95 6L0 10.95L1.05 12L6 7.05L10.95 12L12 10.95L7.05 6L12 1.05Z" fill="#ffffff"/>
		</svg>
	</div>
	<nav>
		<?php echo $nav->build_menu( 'mobile' ); // phpcs:ignore ?>
	</nav>
	<nav class="clone xl:hidden mt-6"></nav>

</div>
<div class="overlay w-full h-full fixed inset-0 z-20 bg-black/30 hidden"></div>
