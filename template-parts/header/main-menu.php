<?php
/**
 * The template part for displaying Main menu in header.
 *
 * @package Kavanagh
 */

$nav = new Kavanagh_Menu_Walker( 'main-menu' );
?>

<nav class="hidden xl:block"><?php echo $nav->build_menu(); // phpcs:ignore ?></nav>
