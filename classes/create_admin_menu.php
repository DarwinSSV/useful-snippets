<?php

class SNIP_create_admin_menu {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
	}

	public function add_admin_menu() {
		add_menu_page( 
			__('Useful Snippets', 'wp-snippets' ), //label
			__('Useful Snippets', 'wp-snippets' ), //label
			'manage_options', //capability
			'useful-snippet-settings', //slug
			[ $this, 'menu_page_template' ], //view
			'dashicons-buddicons-replies'
		);
	}

	public function menu_page_template() {
	?>

	<div class="useful-snippet-wrapper">
		<div class="useful-snippet-container">
			<?php include 'display_data.php' ?>
		</div>
	</div>

	<?
	}
}

new SNIP_create_admin_menu();