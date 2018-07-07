<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION
function add_style_css(){
  wp_enqueue_style('style.css', get_template_directory_uri().'/style.css');
  wp_enqueue_style('fontMontserrat','https://fonts.googleapis.com/css?family=Montserrat');
}
add_action('wp_enqueue_scripts', 'add_style_css');

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
    $items .= '<li class="widget widget_search">' . get_product_search_form( false ) . '</li>';
    return $items;
}

function register_sidebar_menu() {
  register_nav_menu('sidebar-menu',__( 'Sidebar Menu' ));
}
add_action( 'init', 'register_sidebar_menu' );