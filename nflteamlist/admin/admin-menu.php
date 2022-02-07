<?php // NFL Team List - Admin Menu

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


/*
add sub-level administrative menu inside options-general and calling 
nflteamlist_display_settings_page function to display admin settings
**/
function nfllist_add_sublevel_menu() {
	
	add_submenu_page(
		'options-general.php',
		esc_html__('NFL Team List Settings', 'nflteamlist'),
		esc_html__('NFL Team List', 'nflteamlist'),
		'manage_options',
		'nflteamlist',
		'nflteamlist_display_settings_page'
	);
	
}
add_action( 'admin_menu', 'nfllist_add_sublevel_menu' );

