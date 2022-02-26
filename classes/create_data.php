<?php

class SNIP_create_data_table {

	public function __construct() {
		add_action( 'init', [ $this, 'create_table'] );
	}

	public function create_table(){

		global $wpdb;

		$table_name = $wpdb->prefix . "snippet_data"; 

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
  			id mediumint(9) NOT NULL AUTO_INCREMENT,
  			name tinytext NOT NULL,
  			code text NOT NULL,
  			place text,
  			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );		
	}
}

new SNIP_create_data_table();