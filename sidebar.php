<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package shop-isle
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?wp_nav_menu( array( 'theme_location' => 'sidebar-menu', 'container_class' => 'sidebar_class' ) ); ?>
</aside><!-- #secondary -->
