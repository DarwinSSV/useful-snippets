<?php

/*
Plugin Name: Useful Snippets
Description: Useful WP snippet codes at one place to help developers
Author: Darwin S
Author URI: http://darwins.unaux.com/
Requires PHP: 5.6.39
Version: 1.0.0
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if( !defined( 'ABSPATH' ) ) {
	die();
}

/* define plugin constants */

define ( 'SNIP_DIR', plugins_url( __DIR__ ) );

function custom_enqueue_style() {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
	wp_register_script( 'snippet', plugins_url( 'assets/snippet.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'snippet' );
}
add_action( 'admin_enqueue_scripts', 'custom_enqueue_style' );


	
require_once( 'classes/create_admin_menu.php' );
require_once( 'classes/create_data.php' );