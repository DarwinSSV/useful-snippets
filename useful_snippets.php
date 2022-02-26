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

/* loading required scripts */

function useful_snippet_scripts() {
	wp_enqueue_script( 'useful-snippet-js', WP_PLUGIN_DIR . '/wp-snippets/assets/js/snippet.js', array( 'jquery'), wp_rand(), true );
	wp_enqueue_style( 'useful-snippet-style', WP_PLUGIN_DIR . '/wp-snippets/assets/css/snippet.css', wp_rand() );
}

add_action( 'admin_enqueue_scripts', 'useful_snippet_scripts' );

require_once( 'classes/create_admin_menu.php' );
require_once( 'classes/create_data.php' );